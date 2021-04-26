<?php
	$campaings = $pdo->query("SELECT * from campaign WHERE trash = 0 && code = 1 ORDER BY created_at DESC LIMIT 0,6");
	$campaing = $campaings->fetchAll();
	// print_r($campaing);
?>
<div class="section m-0 section-scroller" style="padding: 100px 0">
					<div class="container center">
						<div class="heading-block border-bottom-0 mx-auto" style="max-width: 820px"  id="bagis">
							<button class="btn btn-success" onclick="window.location.href='<?php echo $folderPath . 'aid-campaign/add' ?>'">Bir Kampanya Başlat <i class="fas fa-hands-helping"></i></button>
							<h2 class="nott ls0 font-weight-normal">Yardım Kampanyaları</h2>	
							<span class="before-heading font-body">En Yeni</span>
						</div>
					</div>
					<div class="swiper_wrapper customjs h-auto" style="padding: 50px 0 80px;">
						<div class="swiper-container swiper-parent swiper-scroller">
							<div class="swiper-wrapper h-auto">

							<?php foreach ($campaing as $param) { ?>
								<div class="swiper-slide">
										<div class="row m-auto align-items-center">
											<div class="col-md-6 p-0">
											<img class="centered" src="<?php echo $folderPath . explode("\Kit-up\\", $param["media"])[1]; ?>">
												<div class="sale-flash badge bg-color text-light p-2">Yeni!</div>
											</div>
											<div class="col-md-6 p-0">
												<div class="card">
													<div class="card-body py-4">
														<h4 class="mb-3"><a href="<?php echo "?detail"; ?>"><?php echo $param["title"]; ?></a></h4>
														<p class="mb-3 d-none d-sm-block"><?php echo $param["content"]; ?></p>
														<div class="article-info mb-3 d-flex align-items-center">
															
														</div>
														<a href="<?php echo $folderPath . "aid-campaign/detail/?campaign=" . $param["id"]; ?>" class="button button-small button-dark ls0 shadow-none nott ml-0 mt-4 clearfix"><i class="icon-shopping-cart1"></i>Bağış Bilgilerini Gör</a>
													</div>
												</div>
											</div>
										</div>
								</div>
							<?php } ?>	
							</div>
							<!-- Add Scroll Bar -->
							<div class="swiper-scrollbar"></div>
							<div class="slider-arrow-left slider-arrow-left-1"><i class="icon-angle-left"></i></div>
							<div class="slider-arrow-right slider-arrow-right-1"><i class="icon-angle-right"></i></div>
						</div>

					</div>
</div>