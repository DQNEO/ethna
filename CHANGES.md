# 変更点一覧

## Ethna 2.6.0beta4からEthnam 2.7への変更点

* Ethnaコア
 * PHP5.4に対応しました。(主な変更はhtmlspecialcharsの第三引数です。)
 * インストール方法が変わりました。(pear installはできなくなりました。)
 * 主なプロパティ・メソッドでprivate,protected だったものをpublicにしました。これはEthna2.5との後方互換を確保するためです。
 * ActionFormの配列バリデーション, {form ..}, {form_input ..},などの仕様を古い(2.3.5あたり?)状態に戻しました。 [[cc6d63e](https://github.com/DQNEO/ethnam/commit/cc6d63eae1a615b3868e309ff53fd77414bbd4c7)]
 * bin/ethna.batを廃止しました。今後、Windowsは推奨環境から外れます。
 * PHP4の名残であった参照の&を除去しました。
 * EthnaManagerを廃止しました。
 * __ethna_info__, __ethna_unittest__を廃止しました。
 * 設定ファイル(etc/{appid}_ini.php)が存在しないときに自動で作成する機能を廃止しました。
 * 雑多なコンテンツファイルを補完するためのresourcesディレクトリを追加
 * Ethna本体がinclude_pathに置いてなくても(なるべく)大丈夫なように改善しました。
* プラグインまわり
 * Puginの命名規則を2.5に近い状態に戻しました。プラグインのクラス名で2.5と同じようにAppIDが使えます。(例：Project_Plugin_Cachemanager_Memcache)
 * extlibを廃止しました。
 * Ethna_Plugin_Abstractを廃止しました。これによりプラグインの基底クラスはなくなりました。
 * CacheManager_LocalFileでsafeモードを無視するようにしました。
* ログ関連
 * Ethna_ActionError#AddError()した際のログ出力をLOG_NOTICE -> LOG_INFO に変更しました。
 * ADODBのログ出力処理をオーバーライドできるようにしました。(`ethna_adodb_logger`というグローバル関数内で処理がべた書きされていたのを改善)
 * ログファイルにメモリ使用量を記録するようにしました。
 * ログファイルに現在時刻をミリ秒単位まで記録するようにしました。
 * Validationのログをもう少し詳細に出すようにしました。
* テンプレート関連
 * Smartyがテンプレートを出力する際に、メモリ使用量をHTTPヘッダ(`X-MemoryUsage`)で出力するようにしました。
 * HTML5の<input type="email">に対応しました。(あくまで当座しのぎ的)
* セッション関連
 * check_remote_addrをデフォルトで無効にしました。
* その他
 * `adodb/adodb.inc.php`をEthna側でrequireしなくなりました。(アプリケーション側でrequire_onceする必要があります。)
* テスト関連
 * UnitTestManagerを廃止しました。
* バグ修正
 * メールアドレスのバリデーションで、@の左側の?を許可するようにしました。
 * Ethna_ActionFormで、nullを''空文字列に変換してしまうバグを修正しました。[[de1442bd](https://github.com/DQNEO/ethnam/commit/de1442bd55397834a7b6228c3c0ae694849237db)]
 * Controllerの終了直前にaction_formのプロパティをunsetすることで、PHP5.1でのメモリリークを改善しました。c.f. http://qiita.com/DQNEO/items/f2cbe7f15f92f5f4f05d

## 2.7から2.8への変更点

* AppObject, AppSQL, AppSearchObjectを廃止しました。[[e871a1a](https://github.com/DQNEO/ethnam/commit/e871a1addafae0314bd62dfc8a3e209359ac4a2f)]
* Windowsサポートを廃止しました。[[4ec5802](https://github.com/DQNEO/ethnam/commit/4ec580224232122b29a2a9ccf5824bf8d985f424)]

## 2.8から2.9への変更点

* Backend#performを Controller#performへ引っ越ししました。
* ActionClassからViewClassにパラメータを渡す機能を廃止しました。
* E_DEPRECATED エラーを拾えるうにしました。(E_USER_DEPRECATEDについては未対応)
* Smarty のi18n modifierで引数を渡してsprintf的に使えるようになりました。(see class/Plugin/Smarty/modifier.i18n.php)
