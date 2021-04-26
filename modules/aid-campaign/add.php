<?php
if(isset($_SESSION['username'])){
    
?>


<section id="content">
	<div class="content-wrap p-0 overflow-visible clearfix">
    <form action="<?php echo $folderPath;?>aid-campaign/added" method="post" enctype="multipart/form-data">
		<div class="container mw-lg">
        <h1 class="font-weight-normal nott ls0 font-primary">Bir<span> Yardım Kampanyası</span> başlatmak üzeresin :</h1>
			<div class="row justify-content-center py-5">
				<div class="col-md-5 offset-lg-1">
                        
                <div class="form-group">
                        <label for="exampleFormControlInput1">Kampanyan hangi konuda?<sup>*</sup></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="subject" placeholder="Test kitabı yardımı" ">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kampanyanın baṣlığını yaz<sup>*</sup></label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="title" placeholder="Of Köy Okulu">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Harika! İstediğin değişimi kim gerçekleştirebilir?<sup>*</sup></label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="who_can" value="" placeholder="Tüm İnsanlık">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Varsa adres :<sup>*</sup></label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="adress" value="" placeholder="Tüm İnsanlık">
                    </div>
					<div class="clear"></div>
				</div>
				<div class="col-md-5 offset-lg-1">  
                    <div class="form-group">
                         <label for="exampleFormControlInput1">Çözmek istediğin problemi anlat<sup>*</sup></label>
                        <label for="exampleFormControlInput1"><sub>Bu konuya neden önem verdiğini anlatırsan insanlar kampanyanı daha çok destekleyecektir. Bunun değişmesinin sana, ailene ve çevrene nasıl etki edeceğini anlat.</sub></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bir Fotoğraf ya da Video <sup>*</sup></label>
                        <label for="exampleFormControlInput1"><sub>Görseli veya videoyu olan bir kampanya yok olan diğerlerinden 6 kat daha fazla imza alır. Anlatmak istediğin hikayenin duygusunu yakalayan bir görsel ekle.</sub></label>
                        <input type="file" name="media" class="form-control-file" id="exampleFormControlFile1">
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
