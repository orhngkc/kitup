<?php
//move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)

// print_r($_POST);
// die();
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
            echo "Sorry. Not supported type!";
        }
    }

    $taglist = "";

    $cloud =  explode(",", $_POST["category"]);

    foreach ($cloud as $elem){
        $control = $pdo->query("SELECT * FROM `category` WHERE label = '" . seflink($elem) . "'");
        $count = $control->rowCount();
        if($count > 0 ) {
            $test = $pdo->prepare("UPDATE `category` SET `repeat`= `repeat` + 1 WHERE label = '" . seflink($elem) . "'")->execute();
        }else{
            $test = $pdo->prepare("INSERT INTO `category`(`name`, `label`, `repeat`) VALUES (:namee, :label, 0)");
            $test->bindValue(":namee", $elem);
            $test->bindValue(":label", seflink($elem));
            $f = $test->execute();
        }

        $x = $pdo->query("SELECT * FROM `category` WHERE label = '" . seflink($elem) . "'")->fetchAll();
        $taglist .= $x[0]["id"] . ",";
    }


    $imagePath = imageHandler($_FILES["file"]);
    // echo $taglist;
    // echo $imagePath;
    // print_r($_POST);
    // die;
    $add = $pdo->prepare("INSERT INTO `books`(`book_name`, `cargo`, `author`, `page_number`, `p_date`, `publisher`, `category`, `price`, `info`, `imagepath`, `created_at`, `trader`, `on_sale`, `on_trade`, `code`, `trash`) VALUES (:book_name, :cargo, :author, :page_number, :p_date, :publisher, :category, :price, :info, :imagepath, now(), :trader, :on_sale, :on_trade, 0, 0)");
    $add->bindValue(':book_name', $_POST['name']);
    $add->bindValue(':cargo', $_POST['radio']);
    $add->bindValue(':author', $_POST['author']);
    $add->bindValue(':page_number', $_POST['page_number']);
    $add->bindValue(':p_date', $_POST['p_date']);
    $add->bindValue(':publisher', $_POST['publisher']);
    $add->bindValue(':category', "," . $taglist);
    $add->bindValue(':price', $_POST['price']);
    $add->bindValue(':imagepath', $imagePath);
    $add->bindValue(':info', $_POST['info']);
    $add->bindValue(':on_sale', $_POST['satis']);
    $add->bindValue(':on_trade', $_POST['takas']);
    $add->bindValue(':trader', $_SESSION['username']);
    $finito = $add->execute();
    header("location: http://localhost/Kit-up/sales/");
    // print_r($_FILES["file"]);
    //  print_r($_POST['exampleRadios']);
