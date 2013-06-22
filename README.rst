Ethna
=======
.. image:: http://stillmaintained.com/ethna/ethna.png

Ethna(えすな)は、PHPを利用したウェブアプリケーションフレームワークで、
似たようなコードを書かなくてよいことを目標としています。

Webサイトは http://ethna.jp/ です。

Requirements
--------------

* Ethna 2.5.x

  * PHP 4系、PHP 5.x

* Ethna 2.6.x

  * PHP 5.2.6 以上


インストール
--------------

PEARコマンドでインストールする
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

もっとも簡単で確実な方法です。 ``-a`` オプションをつけてインストールすることで Smarty なども同時にインストール可能です。 ::

  $ sudo pear channel-discover pear.ethna.jp
  $ sudo pear install -a ethna/ethna


その他
^^^^^^^

詳しくは Wiki を参照してください。

* http://ethna.jp/ethna-document-tutorial-install_guide.html


Ethna の情報源
--------------

ドキュメント
^^^^^^^^^^^^^^^

公式ドキュメント:
  http://ethna.jp/ethna-document.html

API ドキュメント:
  http://ethna.jp/doc/

メーリングリスト
^^^^^^^^^^^^^^^^

ユーザ向けメーリングリスト(ethna-users):
  http://ml.ethna.jp/mailman/listinfo/users

Git リポジトリ 更新状況(ethna-cvs):
  http://ml.ethna.jp/mailman/listinfo/cvs

IRC
^^^^^^^

freenode の `#Ethna` でEthnaの使い方や開発について議論しています。コミッタもいますので、バグなどについて文句を言うのはここが一番伝わりやすいかもしれません。

* サーバ: irc.freenode.com
* チャネル: #Ethna

IRCって何? という方は、IRC普及委員会 を参照して下さい。:
  http://irc.nahi.to/

バグ、要望等を報告する方法
--------------------------

Ethna を使っていて、バグや変な挙動を見つけた場合は、開発者に報告をお願いします。報告する手段は以下の通りです。

IRCチャンネル
  freenode の #Ethna。ここが一番伝わりやすいです

GitHub の Issues または Pull Request
  修正したよ、といったものは直接 Pull Requset を送っていただいて構いません。その際、ブランチの運用ルールは `開発について` を参照してください。

ユーザ向けメーリングリスト
  ethna-usersにバグについて投稿する

「Ethna」をキーワードにしてブログを書く
  コミッタは「Ethna」をキーワードにしたブログをブログ検索でウォッチしています。バグや不満や感想等、Ethnaをキーワードにしたブログを書いてみると、コミッタが見て反応する可能性があります。

開発について
-------------

開発用のツール
^^^^^^^^^^^^^^^^

* `gitFlow <https://github.com/nvie/gitflow>`_ を利用しています。また、ブランチ運用ルールも基本的にこれに沿っています。

テスト実行
^^^^^^^^^^^^^^^^

simpletest によるテストの実行は次のようにします。 ::

    $ php bin/ethna_run_test.php

詳細出力 ::

    $ php bin/ethna_run_test.php --verbose

テストを指定して実行 ::

    $ php bin/ethna_run_test.php test/Logger_Test.php

