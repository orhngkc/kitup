<?php
//move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)
    function imageHandler($parametre){
        $type = end(explode(".", $parametre['name']));
        $name = explode(".", $parametre['name'])[0];
        $path = $parametre['tmp_name'];
        $newPath = "C:\\xampp\htdocs\Kit-up\assets\books\sales";
        // echo $newPath;
        $allow = ['jpg', 'jpeg', 'png'];
        $newName = "";
        if(in_array($type,$allow)){
            $newName = md5(uniqid(mt_rand(), true)) . "." . $type;
            move_uploaded_file($path, $newPath.'\\'.$newName);
            return $newPath.'\\'.$newName ;
        }else{
            echo "Sorry. Not supported type.";
        }
    }

    echo $imagePath = imageHandler($_FILES["media"]);

    $add = $pdo->prepare("INSERT INTO `campaign` (`subject`, `title`, `who_can`, `adress`, `content`, `media`, `created_at`, `finished_at`, `code`) VALUES (:sub, :title, :who_can, :adress, :content, :media, NOW(), NOW(), :code)");
    $add->bindValue(':sub', $_POST['subject']);
    $add->bindValue(':title', $_POST['title']);
    $add->bindValue(':who_can', $_POST['who_can']);
    $add->bindValue(':adress', $_POST['adress']);
    $add->bindValue(':code', 0);
    $add->bindValue(':content', $_POST['content']);
    $add->bindValue(':media', $imagePath);
    $finito = $add->execute();
    header("location: http://localhost/Kit-up/aid-campaign/");
    print_r($_FILES["file"]);
     print_r($_POST['exampleRadios']);
