<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>お問合せフォーム（入力）</title>
    </head>
    <body>
    <h1>お問合せフォーム</h1>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
        <div class="container-sm">
            <form action="confirm.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">件名</label>
                    <select name="type" class="form-select" aria-label="Default select example" required>
                        <option value="" selected>未選択</option>
                        <option value="ご意見" <?php if($_POST['type']=='ご意見'){echo 'selected';} ?>>ご意見</option>
                        <option value="ご感想" <?php if($_POST['type']=='ご感想'){echo 'selected';} ?>>ご感想</option>
                        <option value="その他" <?php if($_POST['type']=='その他'){echo 'selected';} ?>>その他</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">名前</label>
                    <input placeholder="問合太郎" name="name" type="text" class="form-control" id="name" value="<?php if($_POST['name']){echo $_POST['name'];} ?>">
                </div>
                <div class="mb-3">
                    <label for="emaile" class="form-label">メールアドレス</label>
                    <input placeholder="example@exlample.com" name="email" type="email" class="form-control" value="<?php if($_POST['email']){echo $_POST['email'];} ?>">
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">電話番号（ハイフンなし）</label>
                    <input placeholder="0000000000" name="number" type="text" class="form-control" id="number" value="<?php if($_POST['number']){echo $_POST['number'];} ?>">
                <div class="mb-3">
                    <label for="msg" class="form-label">お問合せ内容</label>
                    <textarea name="message" class="form-control" id="msg" rows="4"><?php if($_POST['message']){echo $_POST['message'];} ?></textarea>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="submit">確認</button>
                </div>
            </form>
        </div>
    </body>
</html>