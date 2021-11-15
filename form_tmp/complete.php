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
        <?php
        require_once('db.php');
        require_once('mail.php');

        $enq_type = $_POST['type'];
        $enq_name = $_POST['name'];
        $enq_email = $_POST['email'];
        $enq_num = $_POST['number'];
        $enq_message = $_POST['message'];

        $enq_type = htmlspecialchars($enq_type,ENT_QUOTES,'UTF-8');
        $enq_name = htmlspecialchars($enq_name,ENT_QUOTES,'UTF-8');
        $enq_email = htmlspecialchars($enq_email,ENT_QUOTES,'UTF-8');
        $enq_num = htmlspecialchars($enq_num,ENT_QUOTES,'UTF-8');
        $enq_message = htmlspecialchars($enq_message,ENT_QUOTES,'UTF-8');

        try {
            //DB接続とクエリ
            $dsn = "mysql:host={$host};dbname={$dbName};charser=utf8";
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO enq_list(type,name,email,number,message) VALUES(?,?,?,?,?)";
            $stmt = $dbh->prepare($sql);
            $data[] = $enq_type;
            $data[] = $enq_name;
            $data[] = $enq_email;
            $data[] = $enq_num;
            $data[] = $enq_message;

            $stmt->execute($data);

            $dbh = null;

            //メール送信
            mb_send_mail($to1, $subject1, $body1, $header1);
            mb_send_mail($to2, $subject2, $body2, $header2);
        } 
        catch(PDOException $e) {
            print 'データベースエラーが発生しました';
            exit();
        }
        ?>
    </body>
</html>