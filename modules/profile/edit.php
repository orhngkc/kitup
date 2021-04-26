<?php
if(isset($_SESSION['username'])){
    $edit = $pdo->query("SELECT * FROM users1 where username='".$_SESSION['username']."' ")->fetch();
    // print_r($edit)
?>


<section id="content">
	<div class="content-wrap p-0 overflow-visible clearfix">
        <form action="<?php echo $folderPath;?>profile/edited" method="post" enctype="multipart/form-data">
		<div class="container mw-lg">
        <h1 class="font-weight-normal nott ls0 font-primary"><span><?php echo $edit['name_surname']; ?></span>, profilini düzenle :</h1>
			<div class="row justify-content-center py-5">
				<div class="col-md-5 offset-lg-1">
                        
                <div class="form-group">
                        <label for="exampleFormControlInput1">Kullanıcı Adı<sup>*</sup></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="Kaşağı" value="<?php echo $edit['username']; ?>" disabled>
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" name="usernamer" placeholder="Kaşağı" value="<?php echo $edit['username']; ?>">
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" name="old" placeholder="Kaşağı" value="<?php echo $edit['profile_photo']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ad Soyad<sup>*</sup></label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="name_username" placeholder="Ömer Seyfettin" value="<?php echo $edit['name_surname']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">E-posta<sup>*</sup></label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="mail" value="<?php echo $edit['mail']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Telefon Numarası<sup>*</sup></label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="p_number" value="<?php echo $edit['p_number']; ?>">
                    </div>
					<div class="clear"></div>
				</div>
				<div class="col-md-5 offset-lg-1">  

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputName">Facebook</label>
                            <input type="text" class="form-control" id="inputName" placeholder="facebook.com/kitap" name="name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputSurname">Twitter</label>
                            <input type="text" class="form-control" id="inputSurname" placeholder="twitter.com/kitap" name="surname">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputSurname">İnstagram</label>
                            <input type="text" class="form-control" id="inputSurname" placeholder="instagram.com/kitap" name="surname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">İsterseniz kendinizden bahsedebilirsiniz...</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="bio" rows="3" placeholder="Anlatıcı küçük kardeşi Hasan atların ve ahırın bulunduğu bir derenin kenarındaki küçük bir çiftlikte ve evinde yaşamaktadır.  Babaları zaman zaman evden ayrılmakta atların bakımı ile çiftliğin seyi bla bla"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Profil Fotoğrafı Ekle Gül Yüzünü Görelim</label>
                        <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button type="submit" class="btn btn-warning btn-block" id="add-btn">Düzenle</button>
                </form>
		
					<div class="clear"></div>
				</div>
			</div>
			<div class="line"></div>	
		</div>
	</div>
</section>

<?php
}else{
    header("location: http://localhost/Kit-up/sign/");
}
