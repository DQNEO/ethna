# ビュースクリプトのスケルトンを生成する
  - スケルトンファイルを変更する 

## ビュースクリプトのスケルトンを生成する [](ethna-document-dev_guide-forward-skelton.html#iec9db32 "iec9db32")

[遷移先定義を省略する](ethna-document-dev_guide-forward-omit.html "ethna-document-dev\_guide-forward-omit (1240d)")にて記述したとおり、一定のルールでビュースクリプトのファイル名やビュークラス名が決まるのでしたら、遷移先を追加するたびに毎回スクリプトを1から記述するのは面倒です\*1。

そんなときには、ethnaコマンドのadd-viewオプションを利用して、スケルトンファイルを生成すると楽です。

例えば、"some\_view\_name"というビューを追加したい場合は、

$ ethna add-view some\_view\_name

とするだけです。すると

    generating view script for [some_view_name]...
    view script(s) successfully created [/tmp/sample/app/view
    /Some/View/Name.php]

というメッセージが表示されてビュースクリプトのスケルトンが生成されます。

### スケルトンファイルを変更する [](ethna-document-dev_guide-forward-skelton.html#r33f5da5 "r33f5da5")

実際にはアプリケーション毎にある程度「スケルトンの元になるファイル」を変更したくなると思います。例えば、継承するクラスをEthna\_ViewClassではなく、(Ethna\_ViewClassを継承した)アプリケーション固有のビュークラスにしたい、といったケースです。

この場合は、プロジェクトスケルトン生成後にskelディレクトリに生成されているはずのskel.view.phpを変更することで、生成されるファイルを任意に変更することが出来ます。

<!-- ??END id:body -->
<!-- ??BEGIN id:summary --><!-- ??BEGIN id:note -->

* * *
\*1他のスクリプトからコピー&ペースト、という方法もありますがあんまりカッコよくないし  

<!-- ??END id:note -->
<!-- ??BEGIN id:trackback -->
<!-- ?? END id:trackback --><!-- ?? END id:attach -->
<!-- ?? END id:summary -->
<!-- ??END id:content -->
<!-- ?? END id:wrap_content --><!-- ??sidebar?? ========================================================== -->
<!-- ??BEGIN id:wrap_sidebar -->

<!-- ??BEGIN id:search_form -->

## 検索

<form action="http://ethna.jp/index.php?cmd=search" method="post">
            <input type="hidden" name="encode_hint" value="??">
            <input type="text" name="word" value="" size="20">
            <input type="submit" value="検索"><br>
            <input type="radio" name="type" value="AND" checked id="and_search"><label for="and_search">AND検索</label>
            <input type="radio" name="type" value="OR" id="or_search"><label for="or_search">OR検索</label>
    </form>

<!-- END id:search_form -->
<!-- ??BEGIN id:download_link -->

## ダウンロード

[![](image/minilogo.gif)Ethna-2.6.0(beta2)](ethna-download.html)

[![](image/minilogo.gif)Ethna-2.5.0(stable)](ethna-download.html)

<!-- END id:download_link -->
<!-- ??BEGIN id:download_link -->

## Quick Links

- [フォーラム(質問/要望等)](ethna-community-forum.html)
- [メーリングリスト](http://ml.ethna.jp/mailman/listinfo/users)

- [チュートリアル](ethna-document-tutorial.html)
- [開発マニュアル](ethna-document-dev_guide.html)
- [変更点一覧](ethna-document-changes.html)

- [TODO(ロードマップ)](TODO.html)
- [ロゴ](ethna-logo.html)

<!-- END id:download_link -->
<!-- ??BEGIN id:search_form -->

