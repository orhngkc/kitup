<?php
	include 'lib/sozler.php';
	$random = Rand(1,22);
	// print_r($sozler[$random]);
	$campaings = $pdo->query("SELECT * from campaign WHERE trash = 0 && code = 1 ORDER BY created_at DESC LIMIT 0,6");
	$campaing = $campaings->fetchAll();

	$bestSeller = $pdo->query("SELECT * FROM users1 order by added DESC LIMIT 0,1")->fetchObject();

	$sell = [];
	$i = 0;
	$lastbooks = $pdo->query("SELECT imagepath, id FROM books WHERE trash = 0 && code = 1 && on_sale=1 LIMIT 0,5")->fetchAll(PDO::FETCH_OBJ);
	foreach($lastbooks as $books){
		$sell[$i] = $books;
		$i = $i+1;
	}

	$trade = [];
	$ii = 0;
	$lastbooks2 = $pdo->query("SELECT imagepath, id FROM books  WHERE trash = 0 && code = 1 && on_trade=1 LIMIT 0,5")->fetchAll(PDO::FETCH_OBJ);
	foreach($lastbooks2 as $books2){
		$trade[$ii] = $books2;
		$ii = $ii+1;
	}

	// print_r($sell[0]->imagepath);
	
?>
	
		<section id="slider" class="slider-element swiper_wrapper min-vh-0">
			<div class="slider-inner">
				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">

						<div class="swiper-slide">
							<div class="container">
								<div class="row align-items-center mt-5">
									<div class="col-xl-6 pr-0 pr-xl-5 col-md-5 col-sm-11 col-12 mb-5 mb-lg-0">
										<div class="heading-block border-bottom-0 mb-4">
											<div class="before-heading mb-2">13.11.2020 <span class="badge badge-secondary ml-1">Güncel</span></div>
											<h2 class="font-weight-bold ls0 nott">En Son <span>Satışa</span> Eklenenler</h2>
										</div>
										<p>Sizler için en son satışa çıkan kitapları listeledik. Hemen istediğinizi seçerek, satıcıyla iletişime geçebiliriniz .</p>
										<div class="article-info bottommargin-sm d-flex align-items-center justify-content-between">
										
											<h5 class="mb-0"> <a href="#"></a></h5>
											<!-- <span class="article-price font-weight-bold ml-1"><del>$50.00</del> $42.00</span> -->
										</div>
										<a href="sales/" class="button button-large nott ml-0"><i class="icon-book-reader"></i>Tümünü Gör</a>
									</div>
									<div class="col-xl-2 col-md-3 col-4 parallax" data-0="transform: translateY(0px);" data-600="transform: translateY(-30px);">
									<a href="<?php echo $folderPath . "book-single/?book=" . $sell[0]->id; ?>">
										<img src="<?php echo $folderPath . explode("\Kit-up\\",$sell[0]->imagepath)[1];?>" alt="Image" class="rounded faster" data-animate="fadeInLeft">
									</a>
									</div>
									<div class="col-xl-2 col-md-2 col-4 p-0 parallax" data-0="transform: translateY(0);" data-600="transform: translateY(20px);">
									<a href="<?php echo $folderPath . "book-single/?book=" . $sell[1]->id; ?>">
										<img src="<?php echo $folderPath . explode("\Kit-up\\",$sell[1]->imagepath)[1];?>" alt="Image" class="faster rounded" data-animate="fadeInLeft" data-delay="200">
									</a>
									<a href="<?php echo $folderPath . "book-single/?book=" . $sell[2]->id; ?>">
										<img src="<?php echo $folderPath . explode("\Kit-up\\",$sell[2]->imagepath)[1];?>" alt="Image" class="faster rounded mt-3" data-animate="fadeInLeft" data-delay="300">
									</a>
									</div>
									<div class="col-xl-2 col-md-2 col-4 parallax" data-0="transform: translateY(0px);" data-600="transform: translateY(-20px);">
									<a href="<?php echo $folderPath . "book-single/?book=" . $sell[3]->id; ?>">
										<img src="<?php echo $folderPath . explode("\Kit-up\\",$sell[3]->imagepath)[1];?>" alt="Image" class="faster rounded" data-animate="fadeInLeft" data-delay="400">
									</a>
									<a href="<?php echo $folderPath . "book-single/?book=" . $sell[4]->id; ?>">
										<img src="<?php echo $folderPath . explode("\Kit-up\\",$sell[4]->imagepath)[1];?>" alt="Image" class="faster rounded mt-3" data-animate="fadeInLeft" data-delay="500">
									</a>
									</div>
								</div>
							</div>
						</div>

						<div class="swiper-slide">
							<div class="container">
								<div class="row align-items-center mt-5">
									<div class="col-xl-6 pr-0 pr-xl-5 col-md-5 col-sm-11 col-12 mb-5 mb-lg-0">
										<div class="heading-block border-bottom-0 mb-4">
											<div class="before-heading mb-2">13.11.2020 <span class="badge badge-secondary ml-1">Güncel</span></div>
											<h2 class="font-weight-bold ls0 nott">En Son <span>Takasa</span> Eklenenler</h2>
										</div>
										<p>Sizler için en son satışa çıkan kitapları listeledik. Hemen istediğinizi seçerek, satıcıyla iletişime geçebiliriniz .</p>
										<div class="article-info bottommargin-sm d-flex align-items-center justify-content-between">
										
											<h5 class="mb-0"> <a href="#"></a></h5>
											<!-- <span class="article-price font-weight-bold ml-1"><del>$50.00</del> $42.00</span> -->
										</div>
										<a href="trade/" class="button button-large nott ml-0"><i class="icon-line-reload"></i>Tümünü Gör</a>
									</div>
									<div class="col-xl-2 col-md-3 col-4 parallax" data-0="transform: translateY(0px);" data-600="transform: translateY(-30px);">
									<a href="<?php echo $folderPath . "book-single/?book=" . $trade[0]->id; ?>">
										<img src="<?php echo $folderPath . explode("\Kit-up\\",$trade[0]->imagepath)[1];?>" alt="Image" class="rounded faster" data-animate="fadeInLeft">
									</a>
									</div>
									<div class="col-xl-2 col-md-2 col-4 p-0 parallax" data-0="transform: translateY(0);" data-600="transform: translateY(20px);">
									<a href="<?php echo $folderPath . "book-single/?book=" . $trade[1]->id; ?>">
										<img src="<?php echo $folderPath . explode("\Kit-up\\",$trade[1]->imagepath)[1];?>" alt="Image" class="faster rounded" data-animate="fadeInLeft" data-delay="200">
									</a>
									<a href="<?php echo $folderPath . "book-single/?book=" . $trade[2]->id; ?>">
										<img src="<?php echo $folderPath . explode("\Kit-up\\",$trade[2]->imagepath)[1];?>" alt="Image" class="faster rounded mt-3" data-animate="fadeInLeft" data-delay="300">
									</a>
									</div>
									<div class="col-xl-2 col-md-2 col-4 parallax" data-0="transform: translateY(0px);" data-600="transform: translateY(-20px);">
									<a href="<?php echo $folderPath . "book-single/?book=" . $trade[3]->id; ?>">
										<img src="<?php echo $folderPath . explode("\Kit-up\\",$trade[3]->imagepath)[1];?>" alt="Image" class="faster rounded" data-animate="fadeInLeft" data-delay="400">
									</a>
									<a href="<?php echo $folderPath . "book-single/?book=" . $trade[4]->id; ?>">
										<img src="<?php echo $folderPath . explode("\Kit-up\\",$trade[4]->imagepath)[1];?>" alt="Image" class="faster rounded mt-3" data-animate="fadeInLeft" data-delay="500">
									</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
					<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
				</div>
			</div>
		</section>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap pb-0 clearfix">

			<div class="section m-0">

<div class="container ">

<h3 class="center mb-5">"<?php echo $sozler[$random]['soz'];?>"</h3>
<h3 class="center mb-5"><?php echo $sozler[$random]['yazar'];?></h3>

</div>

</div>

				<div class="section m-0 section-scroller" style="padding: 100px 0">
					<div class="container center">
						<span class="before-heading font-body">Yardım Kampanyaları</span>
						<div class="heading-block border-bottom-0 mx-auto" style="max-width: 820px"  id="bagis">
							<h2 class="nott ls0 font-weight-normal">Üyelerimiz tarafından oluşturulan <span> onaylı </span> yardım kampanyaları..</h2>
							<a href="<?php echo $folderPath ; ?>aid-campaign/" class="button button-large nott px-5 ml-0 mt-4 clearfix">Tümünü Gör</a>
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
			
				
				<div class="section section-about m-0" style="padding: 120px 0; background: url('<?php echo $folderPath ; ?>assets/demos/articles/images/dots-1.png') 100% 0 no-repeat / 40%;">
					<div class="container">
						<div class="row">
							<div class="col-md-5">
								<h4 class="mb-0"><span class="badge badge-secondary font-body">İşleyiş</span></h4>
								<div class="heading-block">
									<h2 class="font-weight-normal ls0 nott mb-3 font-primary">Sitemizde olan kullanıcı, kitap, takas ve satış sayısının anlık durumu . </h2>
								</div>
							</div>
							<div class="col-md-6 offset-0 offset-md-1 mt-5 mt-md-0">
								<div class="circle-border">
									<div class="feature-content">
										<div class="row align-items-center justify-content-between h-100">
											<div>
												<div class="circle-inner">
													<div>
														<div class="counter mb-0 font-weight-normal font-body text-primary"><span class="font-body" data-from="1" data-to="<?php echo $user = $pdo->query("SELECT * from books where on_sale=1 && code = 1")->rowCount(); ?>" data-refresh-interval="50" data-speed="2000"></span></div>
														<h5 class="mt-1 text-muted mb-0 font-body ls0">SATIŞ</h5>
													</div>
												</div>
											</div>

											<div class="d-flex h-100 flex-column justify-content-between">
												<div class="circle-inner">
													<div>
														<div class="counter mb-0 font-weight-normal font-body text-info"><span class="font-body" data-from="1" data-to="<?php echo $user = $pdo->query("SELECT * from users1")->rowCount(); ?>" data-refresh-interval="50" data-speed="2100"></span></div>
														<h5 class="mt-1 text-muted mb-0 font-body ls0">Üye</h5>
													</div>
												</div>
												<div class="circle-inner">
													<div>
														<div class="counter mb-0 font-weight-normal font-body text-danger"><span class="font-body" data-from="1" data-to="<?php echo $user = $pdo->query("SELECT * from books WHERE code = 1 ")->rowCount(); ?>" data-refresh-interval="50" data-speed="2100"></span></div>
														<h5 class="mt-1 text-muted mb-0 font-body ls0">TOPLAM KİTAP</h5>
													</div>
												</div>
												<div class="circle-inner">
													<div>
														<div class="counter mb-0 font-weight-normal font-body text-warning"><span class="font-body" data-from="1" data-to="<?php echo $user = $pdo->query("SELECT * from books where on_trade=1 && code = 1")->rowCount(); ?>" data-refresh-interval="100" data-speed="2400"></span></div>
														<h5 class="mt-1 text-muted mb-0 font-body ls0">TAKAS</h5>
													</div>
												</div>
											</div>

											<div>
												<div class="circle-inner">
													<div>
														<div class="counter mb-0 font-weight-normal font-body color"><span class="font-body" data-from="1" data-to="<?php echo $user = $pdo->query("SELECT * from campaign WHERE code = 1")->rowCount(); ?>" data-refresh-interval="50" data-speed="2400"></span></div>
														<h5 class="mt-1 text-muted mb-0 font-body ls0">Yardım Kampanyası</h5>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="section bg-transparent">
					<div class="container">
						<div class="heading-block mb-4 border-bottom-0">
							<h2 class="suarez font-weight-normal nott mb-0">Haftanın Kitap Kurdu</h2>
						</div>
						<div class="row align-items-center">

							<div class="col-lg-3 col-sm-6">
								<img src="assets/images/best.png" alt="Image">
							</div>

							<div class="col-lg-4 col-sm-6 mt-3 mt-sm-0">
								<div class="heading-block">
									<h2 class="font-weight-bold ls0 mb-0 font-body"><?php echo $bestSeller->name_surname; ?>	</h2>
									<span class="text-muted">	<i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i></span>
								</div>
								<p class="mb-0">En çok kitap satan ve takas girişiminde bulunan kullanıcılar burada listelenir.</p>
							</div>

							<div class="col-lg-5 mt-5 mt-lg-0">
								<h4 class="mb-0 font-weight-normal font-body"><a>Eklediği bazı kitaplar</a></h4>
								<div id="oc-images" class="owl-carousel image-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="true" data-items-xs="2" data-items-sm="3" data-items-md="3" data-items-lg="2" data-items-xl="2">
								<?php 
								$sellerBooks = $pdo->query("SELECT * FROM books WHERE trader = '" . $bestSeller->username . "'")->fetchAll(PDO::FETCH_ASSOC);
								foreach($sellerBooks as $books){ 
								?>
								<div class="oc-item">
									<a href="#"><img src="<?php echo $folderPath . explode("\Kit-up\\",$books["imagepath"])[1];?>" alt="Image 1"></a>
								</div>

								<?php } ?>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>

		