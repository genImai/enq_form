<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>お問合せフォーム（確認）</title>
    </head>
    <body>
    <h1>お問合せフォーム（確認）</h1>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
    <div class="container-sm">
        <form action="" method="POST">
            <table class="table">
                <tbody>
                    <tr>
                        <th>件名</th>
                        <td><?php echo $_POST['type'] ?></td>
                        <input type="hidden" name="type" value="<?php echo $_POST['type'] ?>">
                    </tr>
                    <tr>
                        <th>名前</th>
                        <td><?php echo $_POST['name'] ?></td>
                        <input type="hidden" name="name" value="<?php echo $_POST['name'] ?>">
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td><?php echo $_POST['email'] ?></td>
                        <input type="hidden" name="email" value="<?php echo $_POST['email'] ?>">
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>
                            <?php 
                                $numCheck = mb_convert_kana($_POST['number'], 'n', 'UTF-8'); 
                                $numCheck = str_replace('-','',$numCheck);
                                echo $numCheck;
                            ?>
                        </td>
                        <input type="hidden" name="number" value="<?php echo $_POST['number'] ?>">
                    </tr>
                    <tr>
                        <th>お問合せ内容</th>
                        <td><?php echo $_POST['message'] ?></td>
                        <input type="hidden" name="message" value="<?php echo $_POST['message'] ?>">
                    </tr>
                </tbody>
            </table>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" type="button" data-action="complete.php">送信</button>
                <button class="btn btn-secondary" type="button" data-action="index.php">修正</button>
            </div>
        </form>
    </div>
    <script>
        $('.btn').click(function() {
            $(this).parents('form').attr('action', $(this).data('action'));
            $(this).parents('form').submit();
            });
    </script>
    </body>
</html>