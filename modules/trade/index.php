<?php
	$sales = $pdo->query("SELECT * FROM books where on_sale = 0 && code = 1 ORDER BY created_at DESC LIMIT 0,6");
	$sale = $sales->fetchAll();
?>
<section id="content">
			<div class="content-wrap p-0">
				<div class="section border-0 bg-transparent mb-1">
					<div class="container">
						<div class="row justify-content-between align-items-end bottommargin">
							<div class="col-md-7">
								<div class="heading-block border-bottom-0 mb-3">
									<h2>İşte Takastaki Kitaplar!</h2>
								</div>
								<p class="text-muted mb-0">Yandaki filtreleri kullanarak, istediğiniz kategorideki kitapları görüntüleyin.</p>
							</div>
							<div class="col-md-5 d-flex flex-row justify-content-md-end mt-4 mt-md-0">
								<div class="dropdown">
									<a class="dropdown-toggle button button-border button-rounded ls0 font-weight-semibold nott btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Kategoriler
									</a>
									<div class="dropdown-menu">
									<?php
									$list = $pdo->query("SELECT * FROM category ORDER BY `repeat` DESC")->fetchAll();
									// print_r($list);
									foreach ($list as $elem){
										// print_r($elem);
									?>
										<a class="dropdown-item" href="#" onclick="get(<?php echo $elem['id'];?>)"><?php echo "+ " . $elem["name"]; ?></a>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>

						<div class="row" id="cont">
							<?php foreach ($sale as $param){ ?>
								<div class="col-lg-4 col-sm-6 mb-4">
								<div class="i-products">
									<div class="products-image">
										<a href="<?php echo $folderPath . "book-single/?book=" . $param["id"];?>">
										<img src="<?php echo $folderPath . explode("\Kit-up\\",$param['imagepath'])[1];?>">
											<span class="badge"><?php $tags = explode(",", $param["category"]);
											$names = "";
											foreach($tags as $tag){
												$param = $pdo->query("SELECT `name` FROM category WHERE id = '" . $tag . "'")->fetchAll();
												if(sizeOf($param) > 0){
													$names .= $param[0]["name"] . ",";
												}	
											}
											echo $names;
											?></span>
										</a>
									</div>
									<div class="products-desc">
										<h3><a href="demo-crowdfunding-single.html"><?php echo $param["book_name"]; ?></a></h3>
										<p><?php echo $param["info"]; ?></p>
										<div class="products-hoverlays">
										<br>
											<span class="products-location"><i class="icon-map-marker1"></i> Güngören, İstanbul</span>
											<ul class="list-group-flush my-3 mb-0">
												<li class="list-group-item"><strong><?php echo $param["price"]; ?></strong> TL</li>
												<li class="list-group-item">Kargo <strong><?php echo $if = ($param["cargo"] == 0) ? "Satıcı" : "Alıcı"; ?></strong> Ödemeli</li>
												<li class="list-group-item">Yazar:<strong><?php echo $param["author"]; ?></strong></li>
												<li class="list-group-item">Sayfa Sayısı<strong><?php echo $param["page_number"]; ?></strong> </li>
												<li class="list-group-item">Baskı Tarihi: <strong><?php echo $param["p_date"]; ?></strong></li>
												<li class="list-group-item"><strong><?php echo $param["publisher"]; ?></strong> Yayınevi</li>
											</ul>
											<div class="product-user d-flex align-items-center mt-4">
											<i class="far fa-user-circle" style="margin-right:5px"></i>
											<a href="<?php echo $folderPath . "profile/?id=" . $param["trader"]; ?>">  Satan: <strong><?php echo $param["trader"]; ?></strong> </a>
											</div>
										</div>
									</div>
								</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>


		<script>

			
			function domma(input){ 
				return input.toString().replace(",", "");
			}

			function get(value){
				var cont = document.getElementById("cont");
				var params = "getCategory2=" + value
				var all = ""
				var image = ""
				var xhr = new XMLHttpRequest()
				xhr.open("POST", "http://localhost/Kit-up/lib/transaction.php", true)
				xhr.responseType = 'json'
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhr.onload = (response) => {
					if(xhr.response["status"] == "ok"){
						xhr.response["posts"].forEach(element =>

							all += `
							<div class="col-lg-4 col-sm-6 mb-4">
									<div class="i-products">
										<div class="products-image">
											<a href="http://localhost/Kit-up/book-single/?book=${element["id"]}">
												<img src="http://localhost/Kit-up/${domma(element["imagepath"].split("C:\\xampp\\htdocs\\Kit-up\\"))}">
											</a>
										</div>
										<div class="products-desc">
											<h3><a href="demo-crowdfunding-single.html">${element["book_name"]}</a></h3>
											<p>${element["info"]}</p>
											<div class="products-hoverlays">
											<br>
												<span class="products-location"><i class="icon-map-marker1"></i> Güngören, İstanbul</span>
												<ul class="list-group-flush my-3 mb-0">
													<li class="list-group-item"><strong>${element["price"]}</strong> TL</li>
													<li class="list-group-item">Yazar:<strong>${element["author"]}</strong></li>
													<li class="list-group-item">Sayfa Sayısı<strong>${element["page_number"]}</strong> </li>
													<li class="list-group-item">Baskı Tarihi: <strong>${element["p_date"]}</strong></li>
													<li class="list-group-item"><strong>${element["publisher"]}</strong> Yayınevi</li>
												</ul>
												<div class="product-user d-flex align-items-center mt-4">
												<i class="far fa-user-circle" style="margin-right:5px"></i>
												<a href="http://localhost/Kit-up/profile/?id=${element["trader"]}">  Satan: <strong>${element["trader"]}</strong> </a>
												</div>
											</div>
										</div>
									</div>
									</div>
									`
						);

						cont.classList.add('justify-content-center')
						cont.innerHTML = `
						<div class="spinner-border text-success" role="status">
							<span class="sr-only">Loading...</span>
						</div>`

						setTimeout(() => {
							cont.classList.remove('justify-content-center')
							cont.innerHTML = all
						}, 1500);
					
					}
				}
				xhr.send(params)
			}

		</script>