# フォーム定義
**[フォーム値にアクセスする](dev_guide-form-overview.md "ethna-document-dev\_guide-form-overview (1240d)")**  
Ethnaを利用した際に、フォーム値へアクセスする方法について説明します。

**[ファイルや配列にアクセスする](dev_guide-form-type.md "ethna-document-dev\_guide-form-type (1006d)")**  
単純な文字列以外のフォーム値(ファイルや配列)へアクセスする方法について説明します。

**[多次元配列にアクセスする](dev_guide-form-multiarray.md "ethna-document-dev\_guide-form-multiarray (737d)")**  
ファイルや配列へアクセスする要領で、多次元配列にアクセスすることもできます。

**[フォーム値の自動検証を行う(基本編)](dev_guide-form-validate.md "ethna-document-dev\_guide-form-validate (737d)")**  
フォーム値の属性を記述しておけば、チェックコードを書かなくても自動でフォーム値を検証することができます。

**[フォーム値の自動検証を行う(フィルタ編)](dev_guide-form-filter.md "ethna-document-dev\_guide-form-filter (619d)")**  
自動検証だけではなく、入力値を自動で変換する(半角→全角変換、不要な空白やNULLバイトの削除等)フィルタを設定することができます。

**[フォーム値の自動検証を行う(カスタムチェック編)](dev_guide-form-customvalidate.md "ethna-document-dev\_guide-form-customvalidate (1120d)")**  
3.でご説明した、既定の属性以外のチェックをフレームワークに組み込むことも出来ます

**[フォーム値の自動検証を行う(複合チェック編)](dev_guide-form-complexvalidate.md "ethna-document-dev\_guide-form-complexvalidate (1240d)")**  
実際のアプリケーションでは、（「デフォルトでは必須ではないが、"foo"がチェックされていたら必須」等）複雑な条件でのチェック処理が必要になることもあります。Ethnaはこういった処理にも対応することができます。

**[エラーメッセージをカスタマイズする](dev_guide-form-message.md "ethna-document-dev\_guide-form-message (619d)")**  
フォーム値の自動検証でエラーが発生した場合のエラーメッセージはデフォルトでも用意されていますが、任意のメッセージにカスタマイズすることも簡単にできます。

**[フォームテンプレート](dev_guide-form_template.md "ethna-document-dev\_guide-form\_template (737d)")**  
アクションフォームのForm定義に毎回書くのが面倒な場合、親クラスのActionFormにForm定義のテンプレートを作成できます。

