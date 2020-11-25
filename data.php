<?php
    $connection = new PDO('mysql:host=localhost;port=3306;dbname=eden', 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // if (@$_POST) {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = md5($_POST['password']);
        $sql = "INSERT INTO data (`email`,`name`,`password`) VALUES('$email','$name','$password')";
        $query = $connection->query($sql);
        echo 'success';
    // }
?>