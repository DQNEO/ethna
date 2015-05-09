# (ほぼ)スタティックなページを表示させる

## (ほぼ)スタティックなページを表示させる [](ethna-document-dev_guide-app-static.html#r71eadcf "r71eadcf")

ほぼスタティックなページを表示させるのは，簡単です． アクションに対して，アクションクラスでは何もせず，遷移先でスタティックなページを作成します．

具体的には，

    class Sample_Action_Login extends Ethna_ActionClass
    {
        function perform()
        {
            return 'login';
        }
    }

とすることで，なにもしないで，スタティックなloginビューを表示することが可能です．

<!-- ??END id:body -->
<!-- ??BEGIN id:summary --><!-- ??END id:note -->
