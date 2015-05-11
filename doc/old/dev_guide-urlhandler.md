# PATH_INFOを使ったRequest-URIからのパラメータの取得
- PATH\_INFOを使ったRequest-URIからのパラメータの取得 
  - 概要 
  - 使用例 
    - $action\_map の設定 
    - \_getPath\_Index() 関数の定義 
    - URL\_HANDLER 変数の設定 
    - $config['url'] の設定 
    - echo\_msg アクションを追加 
  - 細かい使いかた 
    - PATH\_INFOから複数のパラメータを取得する 
    - path\_extのパラメータ 
    - PATH\_INFOの正規化 
    - \_getPath\_\*() の返り値 

書いた人: いちい

### 概要

Request-URIからパラメータを取得したいときは、Ethna\_UrlHandlerクラスを使うと便利です。

Ethna\_UrlHandlerは次の2つの機能を持っています。

- PATH\_INFOからaction, リクエストパラメータへの変換
  - エントリポイントとPATH\_INFOからactionを決定する
  - PATH\_INFOから$\_REQUESTなどにパラメータをインポートする
  - コントローラに組込み済み

- action, パラメータからPATH\_INFO(に相当するパス文字列)への変換
  - actionからエントリポイントを決定
  - その他のパラメータからPATH\_INFOを生成
  - Ethnaで定義済みのSmartyプラグイン {url} で利用可能

また、Ethna-2.3.2からEthna\_UrlHandlerがプラグインを使っても利用できるようになりました。

**[Net\_URL\_Mapperを使ったUrlhandlerプラグイン](dev_guide-urlhandler-plugin-neturlmapper.md)**

UrlHandlerとエントリポイント、mod\_rewriteとの関係などについては、以下を参照してください。

**[URLHandlerの設定例](dev_guide-urlhandler-example.md)**

### 使用例

新規にプロジェクトを作ると、app/Appid\_UrlHandler.phpファイルが作られ、アプリケーションのUrlHandlerクラスが用意されます。この中の$action\_mapを設定することでUrlHandlerが利用できます。デフォルトではなにもしません。

以下では、 [http://localhost/sample/index.php/echo/hello](http://localhost/sample/index.php/echo/hello) のアクセスで、エントリポイント index.php にパラメータ echo='hello' を指定するための例を説明します。

#### $action\_map の設定

- app/Appid\_UrlHandler.php

    var $action_map = array(
        'index' => array(
            'echo_msg' => array(
                'path' => 'echo',
                'path_regexp' => '|^echo/(.*)$|',
                'path_ext' => array('msg' => array()),
            ),
        ),
    );

- 'index'
  - 明確な位置づけはないですが、エントリポイントごとに設定を切替えるための見出しとして使います。詳しくは後述します。
- 'echo\_msg'
  - 以下のpathの設定に対応するEthnaでのアクション名を指定します。
- 'path'
  - PATH\_INFOの中でパラメータではなくパス部分と解釈されるprefixです。PATH\_INFO生成時にprefixとして付加されるときと、path\_regexpより低コストのマッチングをするときに使われます。
- 'path\_regexp'
  - PATH\_INFOからパラメータを切り出すための正規表現です。なお、この例では正規表現のデリミタを (よくある '/' ではなく) '|' としています。
- 'path\_ext'
  - PATH\_INFOに埋め込まれるパラメータと、Ethnaでのフォーム名との対応を記述します。正規表現の後方参照と、arrayの要素の順序が対応します。

#### \_getPath\_Index() 関数の定義

アクションとパラメータからPATH\_INFOを含むURLを生成するときに使われます。現在のところ、Ethna組込みのSmarty関数{url}を利用するときのみ必要な作業です。

上のエントリポイントで指定した 'index' に対応するものとして、 \_getPath\_Index() という関数名になります。

- app/Appid\_UrlHandler.php

    function _getPath_Index()
    {
        return array("/index.php/", array());
    }

#### URL\_HANDLER 変数の設定

$action\_map の中で 'index' の設定を使うことを指示するために、エントリポイントで $\_SERVER['URL\_HANDLER'] の値を 'index' に設定します。

- エントリポイントに記述する場合
  - www/index.php を以下のように設定

    <?php
    include_once('/path/to/appid/app/Appid_Controller.php');
    $_SERVER['URL_HANDLER'] = 'index';
    
    Appid_Controller::main('Appid_Controller', 'index');
    ?>

- Apache の .htaccess に記述する場合
  - エントリポイントのファイル名を拡張子 '.php' なしで使いたい場合には以下のように設定するとよいでしょう(詳しくはApacheのマニュアルを参照してください)。

    DirectoryIndex index
    <FilesMatch "^index$">
    ForceType application/x-httpd-php
    SetEnv URL_HANDLER index
    </FilesMatch>

$\_SERVER や SetEnv を経由するのは複雑なようですが、 $action\_map のエントリが膨大になった場合に、リクエストのたびに膨大な量の照合が発生することを避ける意図があります。

#### $config['url'] の設定

さらに、アプリケーションの(ベースとなる)URLを設定します。これは、htmlの相対パス指定がPATH\_INFOによって混乱するのを避けるためです。

- etc/app-ini.php

    $config = array(
        ...
        'url' => '/sample/',
        ...

#### echo\_msg アクションを追加

- echo\_msg アクションを追加

    $ ethna add-action echo_msg

- app/action/Echo/Msg.php を編集

    var $form = array(
        'msg' => array(),
        ...
    );

    function prepare()
    {
        $this->af->validate();
    }

- echo\_msg のテンプレートを追加 (ビューは省略)

    $ ethna add-template echo_msg

- template/ja/echo/msg.tpl を編集

    <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        </head>
        <body>
            <h1>Appid</h1>
            <p>message = {$form.msg}</p>
    	 <p>a url to echo "good morning" is <a href={url action="echo_msg" msg="good morning"}>here</a>.</p>
        </body>
    </html>

これで [http://localhost/sample/index.php/echo/hello](http://localhost/sample/index.php/echo/hello) にアクセスし、"message = hello" と表示されれば成功です。

### 細かい使いかた

#### PATH\_INFOから複数のパラメータを取得する

例:

    'printf_msg => array(
        'path' => 'printf,
        'path_regexp' => array(
            1 => '|^printf/([^/]*)$|',
            2 => '|^printf/([^/]*)/([^/]*)$|',
        ),
        'path_ext' => array(
            1 => array(
                'msg' => array(),
            ),
            2 => array(
                'format' => array(),
                'param' => array(),
            ),
        ),
    ),

1の正規表現にマッチしたときは'msg'にパラメータを、2にマッチしたときは'format'と'param'にパラメータを入れる、という使いかたができます。

#### path\_extのパラメータ

'path\_ext' => array('msg' => array()) の array() の中には、次のパラメータが指定できます。

- input\_filter
  - PATH\_INFOの各パラメータの入力フィルタです。PATH\_INFOからフォーム値に変換するときに作用します。Appid\_UrlHandlerクラスのメソッド名を指定します。
- output\_filter
  - PATH\_INFOの各パラメータの出力フィルタです。フォーム値からPATH\_INFOを作るときに作用します。
- form\_prefix, form\_suffix
  - input\_filter/output\_filterのprefix, suffixに特化したフィルタです。入出力時にprefix, suffixを付加／削除します。たとえば実際の値は複雑だが、PATH\_INFOでの表現は簡潔にしたいときに指定します。
- url\_prefix, url\_suffix
  - form\_prefixなどとは逆に、PATH\_INFOでの表現を修飾したいときに使います。

なお、PATH\_INFO生成はrawurlencode()を用いたエンコードを施します。フィルタなどの処理は上に書いた順に行われ、rawurlencode()はurl\_prefix/suffixを付加する直前に実行されます。

#### PATH\_INFOの正規化

'path\_regexp' で指定した正規表現とマッチングされるPATH\_INFOは、スラッシュ ('/') の重複と先頭、末尾のスラッシュを取り除いた状態に正規化されています。

#### \_getPath\_\*() の返り値

先ほどの例では、 array('/index.php/', array()) という2つの要素を含む配列を返していました。この意味について説明します。(この内容はPATH\_INFOを生成するときの話です。)

- 1つめの要素
  - PATH\_INFOにprefixとして付加する文字列。すなわち、エントリポイントのパスになります。
- 2つめの要素
  - リクエストパラメータのうち、PATH\_INFOに埋め込むパラメータとそうでないパラメータが存在します。UrlHandlerがパラメータをPATH\_INFOに埋め込んだ場合は、そのパラメータをリクエストパラメータ("?"以降につけるパラメータ)に付加しないようにしなければなりません。2つめの要素に array('foo', 'bar') のように指定すると、実際にPATH\_INFOに加えた'foo', 'bar' というパラメータはリクエストパラメータに入らなくなります。(?? ちょっと意図が不明)

