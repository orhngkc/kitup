<?php
print_r($_POST);

$users = $pdo->query("SELECT * from users1");
$all = $users->fetchAll();

$add_status = 1;

foreach ($all as $param){
    if($param['username'] == $_POST['register-form-username']){
        $add_status = 0;
    }else if ($param['mail'] == $_POST['register-form-email']){
        $add_status = 0;
    }
}

if ($_POST['register-form-password']!==$_POST['register-form-repassword']){
    $add_status = 0;
}

print_r($add_status);

if($add_status === 1){
$register = $pdo->prepare("INSERT INTO `users1`(`username`, `name_surname`, `mail`, `p_number`, `pass`, `sign_date`) VALUES (:username, :name_surname, :mail, :p_number, :pass, NOW())");
$register->bindValue(':username', $_POST['register-form-username']);
$register->bindValue(':name_surname', $_POST['register-form-name']);
$register->bindValue(':mail', $_POST['register-form-email']);
$register->bindValue(':p_number', $_POST['register-form-phone']);
$register->bindValue(':pass', hash('sha256', $_POST['register-form-password']));
$final = $register->execute();
header('Location: http://localhost/Kit-up/sign/index');
}else{
    header('Location: index/register-tab');
}

