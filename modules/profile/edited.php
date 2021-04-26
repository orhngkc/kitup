<?php
//move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)
    // $user = $pdo->query("SELECT * FROM users where username='".$_SESSION['username']."' ")->fetchAll();
    if(($_FILES["photo"]["size"]!=0)){
        function imageHandler($parametre){
            $type = end(explode(".", $parametre['name']));
            $name = explode(".", $parametre['name'])[0];
            $path = $parametre['tmp_name'];
            $newPath = "C:\\xampp\htdocs\Kit-up\modules\profile\photos";
            // echo $newPath;
            $allow = ['jpg', 'jpeg', 'png'];
            $newName = "";
            if(in_array($type,$allow)){
                $newName = md5(uniqid(mt_rand(), true)) . "." . $type;
                move_uploaded_file($path, $newPath.'\\'.$newName);
                return $newPath.'\\'.$newName ;
            }else{
                echo "Sorry. Not supported type!";
            }
        }

        $imagePath = imageHandler($_FILES["photo"]);
        
    }

    $edit = $pdo->prepare("UPDATE `users1` SET `name_surname`=:name_username, `mail`=:mail, `bio`=:bio,`profile_photo`=:photo, `p_number`=:p_number WHERE username=:username");
    $edit->bindValue(':name_username', $_POST['name_username']);
    $edit->bindValue(':mail', $_POST['mail']);
    $edit->bindValue(':bio', $_POST['bio']);
    if(($_FILES["photo"]["size"]!=0)){
        $edit->bindValue(':photo', $imagePath);
    }else{
        $edit->bindValue(':photo', $_POST["old"]);
    }
    $edit->bindValue(':p_number', $_POST['p_number']);
    $edit->bindValue(':username', $_SESSION['username']);
    $a = $edit->execute();
    header("location: http://localhost/Kit-up/profile/?id=".$_SESSION['username']);
    // print_r($_FILES["file"]);
     print_r($_POST['exampleRadios']);
