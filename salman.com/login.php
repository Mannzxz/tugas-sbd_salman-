<?php
    include "service/database.php";
    session_start();

    $login_message = ""

    if(isset($_SESSION["is login"])){
        header("location: dashboard.php");
    }

    if(isset($_POST['Login'])) {
        $username = $_POST['username'];
        $password = $_POST ['password'];

        $sql = "SELECT * FROM user WHERE username='$username' AND
         password='$password'
         ";

         $result = $db->query($sql);

         if($result->num_rows > 0) {
            $data = $result ->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_login"] = true;

            header("location: dashboard.php");
          

         }else {
            $login_message"akun tidak ditemukan";
         }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "layout/header.html" ?>
    
    <h3> Masuk Akun</h3>
    <i><?= $login_message ?></i>

    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="text" placeholder="password" name="password"/>
        <button type="submit" name="login">Masuk sekarang</button>
</form>
    <?php include "layout/footer.html" ?>
</body>
</html>