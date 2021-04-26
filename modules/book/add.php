<?php

if(isset($_SESSION['username'])){
?>


<section id="content">
	<div class="content-wrap p-0 overflow-visible clearfix">
        <form action="<?php echo $folderPath;?>book/added" method="post" enctype="multipart/form-data">
		<div class="container mw-lg">
			<div class="row justify-content-center py-5">
        <h2 class="display-4 font-weight-normal nott ls0 font-primary">Kitaphane'ye bir kitap ekle</h2>
				<div class="col-md-5 offset-lg-1">
                        
                <div class="form-group">
                        <label for="exampleFormControlInput1">KİTAP ADI<sup>*</sup></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Kaşağı" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Yazar<sup>*</sup></label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="author" placeholder="Ömer Seyfettin" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Sayfa Sayısı<sup>*</sup></label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="page_number" placeholder="120" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Baskı Yılı<sup>*</sup></label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="p_date" placeholder="2005" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Yayın Evi<sup>*</sup></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="publisher" placeholder="Hasbahçe Kitaplığı" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kategori<sup>*</sup></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="category" placeholder="Çocuk, Hikaye" >
                    </div>
					<div class="clear"></div>
				</div>
				<div class="col-md-5 offset-lg-1">
                <div class="form-group">
                        <label for="exampleFormControlInput1">Fiyat<sup>*</sup> </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="price" placeholder="8,71 &#8378;" >
                    </div>
                    <hr>
                    <div class="form-group">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio" value="0" >
                                <label class="form-check-label" for="exampleRadios1">
                                    Alıcı Ödemeli
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio"  value="1" >
                                <label class="form-check-label" for="exampleRadios2">
                                    Satıcı Ödemeli
                                </label>
						    </div>
					</div>
                    <hr>
                    <div class="form-group">
                            <div class="form-check">
									<input type="checkbox" name="satis"  class="form-check-input" id="exampleCheck1" value="1">
									<label class="form-check-label" for="exampleCheck1">Satışa Ekle</label>
                            </div>
                            
                            <div class="form-check">
									<input type="checkbox" name="takas"  class="form-check-input" id="exampleCheck2" value="1">
									<label class="form-check-label" for="exampleCheck1">Takasa Ekle</label>
							</div>
					</div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">İsterseniz kitap ile alakalı bilgi verebilirsiniz.</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="info" rows="3" placeholder="Anlatıcı küçük kardeşi Hasan atların ve ahırın bulunduğu bir derenin kenarındaki küçük bir çiftlikte ve evinde yaşamaktadır.  Babaları zaman zaman evden ayrılmakta atların bakımı ile çiftliğin seyi bla bla"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Kitapa Ait Bir Fotoğraf Ekle</label>
                        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
 
                    <button type="submit" class="btn btn-success btn-block" id="add-btn">Ekle!</button>
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
