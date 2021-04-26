<?php
    
    // echo $_GET['id'];
    if(!isset($_SESSION['username'])){
        header("location:".$folderPath."sign/");
    }
    $user_info = $pdo->query("SELECT * FROM users1 where username='".$_GET['id']."' ");
    $user = $user_info->fetch();
//  print_r($user);
    
    if(isset($_POST["btnn"])){
       $add = $pdo->prepare("INSERT INTO `rating`(`from`, `to`, `rate`) VALUES (:fromm, :too, :rate)");
       $add->bindValue(":fromm", $_SESSION["id"]);
       $add->bindValue(":too", $user["id"]);
       $add->bindValue(":rate", $_POST["star"]);
       $f = $add->execute();
       header("location: http://localhost/Kit-up/profile/?id=" . $user["username"]);
    }

?>

<section id="content">

<div class="content-wrap p-0 overflow-visible clearfix">

    <div class="container mw-lg">
        <div class="row gutter-50 justify-content-center py-5">
            <div class="col-md-5">
                <img src="<?php echo $folderPath . explode("\Kit-up\\",$user['profile_photo'])[1];?>">
            </div>
            <div class="col-md-5 offset-lg-1">
                <h2 class="display-4 font-weight-normal nott ls0 font-primary">Ben <span><strong><?php echo $user['name_surname'] ."," ;?></strong></span></h2>
                <p class="text-muted">Merter, İstanbul</p>

                <div class="mt-3 clearfix">
                    <a href="https://facebook.com/semicolonweb" class="social-icon si-small si-rounded si-colored si-facebook" title="Facebook" target="_blank">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>
                    <a href="https://twitter.com/__semicolon" class="social-icon ml-1 si-small si-rounded si-colored si-twitter" title="Twitter" target="_blank">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                    </a>
                </div>
                <?php 

                $control = $pdo->query("SELECT * FROM rating WHERE `from` = " . $_SESSION["id"])->rowCount();
                $rates = $pdo->query("SELECT SUM(rate) FROM rating WHERE `to` = " . $user["id"])->fetch();
                $rates_c = $pdo->query("SELECT * FROM rating WHERE `to` = " . $user["id"])->rowCount();
                if($control > 0){
                    // echo $rates ;
                    echo "<h3> Reyting:" . $rates[0] / $rates_c . "</a> &starf;";
                ?>

                <?php
                }else{

                ?>
              <form method="post">
                 <input id="input-2" name="star" type="number" class="rating" max="5" data-step="1" data-stars="5" data-size="sm">
                  <button type="submit" name="btnn" class="btn btn-primary">Submit</button>
                </form>
                 <?php } ?>
                <div class="line border-width-5 w-25 my-5"></div>

                <p class="lead">
                    <?php echo $user['bio'];?>
                </p>

                <div class="clear"></div>      
            </div>
        </div>

        <div class="line"></div>

        <div class="heading-block topmargin mb-3 border-bottom-0">
            <h2 class="font-weight-normal ls0 nott mb-0">Son Satışa Eklediklerim</h2>
        </div>
        <div class="row mb-4">
            <?php
            $books = $pdo->query("SELECT * FROM books where  code = 1 && on_sale = 1 && trader='".$_GET['id']."' ")->fetchAll();
            // print_r($books);

            foreach ($books as $book){
            ?>

            <div class="col-md-2">
                <a href="demo-articles-single.html"><img src="<?php echo $folderPath . explode("\Kit-up\\",$book['imagepath'])[1];?>" alt="Image 1"></a>
            </div>

            <?php }?>
        </div>

        <div class="heading-block topmargin mb-3 border-boFttom-0">
            <h2 class="font-weight-normal ls0 nott mb-0">Son Takasa Eklediklerim</h2>
        </div>
        <div class="row mb-4">
        <?php
            $books = $pdo->query("SELECT * FROM books where on_trade = 1 && trader='".$_GET['id']."' ")->fetchAll();
            // print_r($books);

            foreach ($books as $book){
            ?>

            <div class="col-md-2">
                <a href="demo-articles-single.html"><img src="<?php echo $folderPath . explode("\Kit-up\\",$book['imagepath'])[1];?>" alt="Image 1"></a>
            </div>

            <?php }?>
        </div>
        
    </div>
</div>
</section>

<script>
  
</script>