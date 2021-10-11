# [enq_form](https://enqform.sakuraweb.com)
ノンフレームワークのPHPで作成しました。  
DB登録、メール送信機能があります。

### 開発環境  
macOS BigSur   
PHP7    
Bootstrap5  
MySQL  
さくらレンタルサーバー  
  
  
### 開発期間   
約3日間  
  
  
### 問題、工夫箇所
#### 問題点  
今までmysql_connectを用いてDB接続を行なったことしかなかったためPDO接続を理解するのに少し時間がかかった。  
　　
#### 工夫した点  
・修正ボタンで入力フォームへ戻る際に入力値をsubmitして保持。  
・電話番号はハイフンなし、半角数字で統一したかったためconfirm.phpで整形。 
　　　　
    
### 改善点  
・メールの送信元がレンタルサーバーのIDになってしまったこと。  
・環境変数の利用。
　　
  
### テスト内容  
・メールの送信　　
・DBのINSERT確認　　
・フォームバリデーション
  
  
### 参考サイト  
[PHPでメール送信を行う方法：mb_send_mail()](https://uxmilk.jp/15057)  
[PHPでMySQLに接続する方法【さくらのレンタルサーバ利用】](https://note.com/koushikagawa/n/n43a478b8193f)  
