<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>お問合せフォーム（完了）</title>
    </head>
    <body>
        <div class="container-sm">
            <h1>送信完了</h1>
            <p>メールが送信されましたのでご確認ください。</p>
            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
            -->
        </div>
    </body>
</html>
<?php
require_once('db.php');
require_once('mail.php');

$type = $_POST['type'];
$name = $_POST['name'];
$mailTo = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];
$log = "";

try {
    $pdo = new PDO($dsn, $user, $password);
    $log = " DB接続成功\n";
    echo '<script>';
    echo 'console.log('. json_encode( $log ) .')';
    echo '</script>';
} catch(PDOException $e) {
    $log = "DB接続失敗: " . $e->getMessage() . "\n";
    echo '<script>';
    echo 'console.log('. json_encode( $log ) .')';
    echo '</script>';
    exit();
}
$sql = "INSERT INTO enq_list(type, name, email, number, message) VALUES(:type, :name, :email, :number, :message)";
$stmt = $pdo -> prepare($sql);
$stmt->bindValue(':type', $type);
$stmt->bindValue(':name', $name);
$stmt->bindValue(':email', $mailTo);
$stmt->bindValue(':number', $number);
$stmt->bindValue(':message', $message);

$stmt->execute();

// DB接続を閉じる
$pdo = null;
//メール送信
mb_send_mail($to, $subject, $body, $header);
?>