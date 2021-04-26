<?php

include 'conn.php';

if(isset($_POST["name_v"])){
    $add = $pdo->prepare("INSERT INTO `users1`(`username`, `name_surname`, `mail`, `p_number`, `pass`) VALUES (:username, :namesurname, :mail, :phone, :pass)");
    $add->bindValue(":username", $_POST["username_v"]);
    $add->bindValue(":namesurname", $_POST["name_v"]);
    $add->bindValue(":mail", $_POST["mail_v"]);
    $add->bindValue(":phone", $_POST["phone_v"]);
    $add->bindValue(":pass", hash('sha256', $_POST['pass']));
    $final = $add->execute();
    header("content-type: application/json");
    echo json_encode(["status" => "ok"]);
}



if(isset($_POST["username_login"])){
    $query = $pdo->query("SELECT * FROM users1 WHERE username='".$_POST["username_login"]."' and pass=SHA2('".$_POST["pass"]."',256)",PDO::FETCH_ASSOC);

    if($query->rowCount() > 0){
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        session_start();
            $_SESSION['username'] = $rows[0]['username'];
            $_SESSION['name'] = $rows[0]['name_surname'];
            $_SESSION['id'] = $rows[0]['id'];
            header("content-type: application/json");
            echo json_encode(["status" => "ok"]);
    }else{
        header("content-type: application/json");
            echo json_encode(["status" => "not"]);
    }
}

if(isset($_POST["messageId"])){
    $upd = $pdo->prepare("UPDATE `message_box` SET `seen`= 1 WHERE title = '" . $_POST["messageId"] . "'")->execute();
    $query = $pdo->query("SELECT * FROM message_box WHERE parent=0 && title = '" . $_POST["messageId"] . "' ORDER BY created_at ASC")->fetchAll(PDO::FETCH_ASSOC);
    header("content-type: application/json");
    echo json_encode(["status" => "ok", "messages" => $query]);
}

if(isset($_POST["getCategory"])){
    $query = $pdo->query("SELECT * FROM `books` WHERE on_sale && category LIKE '%" . $_POST["getCategory"] . "%' ")->fetchAll(PDO::FETCH_ASSOC);
    header("content-type: application/json");
    echo json_encode(["status" => "ok", "posts" => $query]);
}

if(isset($_POST["getCategory2"])){
    $query = $pdo->query("SELECT * FROM `books` WHERE on_trade = 1 && category LIKE '%" . $_POST["getCategory2"] . "%' ")->fetchAll(PDO::FETCH_ASSOC);
    header("content-type: application/json");
    echo json_encode(["status" => "ok", "posts" => $query]);
}