<?php

	$campaign_details = $pdo->query("SELECT * FROM campaign where id=" . $_REQUEST["campaign"]);
    $detail = $campaign_details->fetchObject();
    // print_r($detail);    
?>

<section id="content">

			<div class="content-wrap pb-0 clearfix">

				<div class="container">
					<div class="row justify-content-between">
						<div class="col-md-5">
						<img class="centered" src="<?php echo $folderPath . explode("\Kit-up\\",$detail->media)[1];?>">
                            <ul class="list-group-flush my-3 mb-0">
												<li class="list-group-item">Kargo<strong><?php echo $if = ($detail->cargo == 0) ? "Satıcı" : "Alıcı"; ?></strong> Ödemeli</li>
												<li class="list-group-item">Yazar:<strong><?php echo $detail->author; ?></strong></li>
												<li class="list-group-item">Sayfa Sayısı<strong> <?php echo $detail->p_number; ?></strong> </li>
												<li class="list-group-item">Baskı Tarihi: <strong><?php echo $detail->p_date; ?></strong></li>
												<li class="list-group-item"><strong><?php echo $detail->publisher; ?></strong> Yayınevi</li>
											</ul>
						</div>
						<div class="col-md-6">
                    
                            <h2 class="h1 mb-5 font-weight-bold"><?php echo $detail->title; ?></h2>
                                
                            
							<div class="d-flex align-items-center justify-content-between">

							    <!-- <del class="op-03">$39.99</del> -->
                                <div class="h2"> <strong class="color"><?php echo $detail->subject; ?></strong></div>
                                
                                <div>
                                    <a href="#" class="social-icon si-small si-borderless si-facebook">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a href="#" class="social-icon si-small si-borderless si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a href="#" class="social-icon si-small si-borderless si-linkedin">
                                        <i class="icon-telegram"></i>
                                        <i class="icon-telegram"></i>
                                    </a>
                                    <a href="#" class="social-icon si-small si-borderless si-whatsapp">
                                        <i class="icon-whatsapp"></i>
                                        <i class="icon-whatsapp"></i>
                                    </a>
                                    <button class="btn btn-success" onclick="window.location.href='<?php echo $folderPath . 'profile/?id=' . $detail->trader; ?>'"><i class="far fa-envelope"></i> Satıcıya Ulaş</button>
                                </div>
                                
                            </div>
                            

							<div class="line line-sm"></div>


							<p><?php echo $detail->content; ?> </p>
							

						</div>
					</div>
				</div>
            </div>
            
            <div class="container">
					<div class="heading-block topmargin text-center border-bottom-0">
						<h2 class="font-weight-normal ls0 nott">Diğer Kampanyalar</h2>
					</div>
					<div class="row justify-content-center mb-4">
						<div class="col-md-2">
							<a href="#"><img src="<?php echo $folderPath; ?>assets/demos/articles/images/articles/1/1.jpg" alt="Image 1"></a>
						</div>
						<div class="col-md-2">
							<a href="#"><img src="<?php echo $folderPath; ?>assets/demos/articles/images/articles/1/2.jpg" alt="Image 2"></a>
						</div>
						<div class="col-md-2">
							<a href="#"><img src="<?php echo $folderPath; ?>assets/demos/articles/images/articles/1/3.jpg" alt="Image 3"></a>
						</div>
						<div class="col-md-2">
							<a href="#"><img src="<?php echo $folderPath; ?>assets/demos/articles/images/articles/1/4.jpg" alt="Image 4"></a>
						</div>
						<div class="col-md-2">
							<a href="#"><img src="<?php echo $folderPath; ?>assets/demos/articles/images/articles/1/5.jpg" alt="Image 4"></a>
						</div>
						<div class="col-md-2">
							<a href="#"><img src="<?php echo $folderPath; ?>assets/demos/articles/images/articles/2/6.jpg" alt="Image 4"></a>
						</div>
					</div>
				</div>
</section>