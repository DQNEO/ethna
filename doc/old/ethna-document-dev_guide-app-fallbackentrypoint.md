# 未定義のアクションが指定された場合に特定のアクションを実行する

## 未定義のアクションが指定された場合に特定のアクションを実行する [](ethna-document-dev_guide-app-fallbackentrypoint.html#p41b229b "p41b229b")

想定外、あるいは許可されていないアクションがリクエストされた場合\*1、通常はアクションが未定義としてエラーになります。しかしながら、未定義のアクションが指定された場合にも特定のアクションを実行したくなることもあるかと思います(エラー用アクションや、問答無用でトップページを表示、等)。

こういった場合には、Ethna\_Controller::main()メソッドの第3引数($fallback\_action\_name)に、アクション未定義の場合に実行したいアクション名を指定することで処理を実現することができます。具体的には、

    Sample_Controller::main('Sample_Controller', array(
     'index',
     'login_*',
    ), 'undef');

のように記述します。この場合は、第2引数に指定したアクション以外が指定されると'undef'アクションが実行されます(undefアクションが定義されていない場合はエラーとなります)。

<!-- ??END id:body -->
<!-- ??BEGIN id:summary --><!-- ??BEGIN id:note -->

* * *
\*1 [エントリポイント毎に実行可能なアクションを制限する](ethna-document-dev_guide-app-limitentrypoint.html "ethna-document-dev\_guide-app-limitentrypoint (706d)")参照  

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

