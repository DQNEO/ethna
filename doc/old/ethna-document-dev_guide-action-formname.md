# アクション名の決定方法を変更する

## アクション名の決定方法を変更する [](ethna-document-dev_guide-action-formname.html#eaffceac "eaffceac")

デフォルトでは、アクション名はフォーム値を利用して以下のように決定されます。

1. フォーム名のうち、名前が"action\_"で始まり、且つフォーム値が空ではないものを探します
2. 1.に該当するフォーム名が見つかった場合、そこから先頭の"action\_"を除いた部分をアクション名とします

アクション名の決定方法は、アプリケーションによっては"index.php?act=foo"等さまざまな方法があると思いますので、Ethnaではこの方法をアプリケーションで自由に決定することが出来るようになっています\*1。

具体的には、Ethna\_Controller::\_getActionName\_Form()を適当にオーバーライドすればOKです。例えばアクション名をindex.php?act=fooというようなリクエストで"foo"の部分をアクション名としたい場合は次のように記述します。

Sample\_Controller.php:

    /**
     * フォームにより要求されたアクション名を返す
     *
     * @access protected
     * @return string フォームにより要求されたアクション名
     */
    function _getActionName_Form()
    {
        if (array_key_exists('act', $_REQUEST) == false) {
            return null;
        }
        return $_REQUEST['act'];
    }

ちなみに、デフォルトでの処理は [こちら](doc/ __filesource/fsource_Ethna__ classEthna_Controller.php.html#a1137)を御覧下さい。

<!-- ??END id:body -->
<!-- ??BEGIN id:summary --><!-- ??BEGIN id:note -->

* * *
\*1なお、なぜわざわざ(フォーム値ではなく)わざわざフォーム名を利用しているかと言うと、複数のsubmitボタンでアクションを振り分けることが出来るようにするためなのです(場合によっては必要かな、と  

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

