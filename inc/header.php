<?php
	session_start();
	$ids = [];
	$get = $pdo->query("SELECT * FROM message_box WHERE seen = 0 && `to` = '" . $_SESSION["username"] . "' ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
	foreach($get as $element){

		if(in_array($element["from"], $ids)){
			continue;
		}else{
			$ids[] = $element["from"];
		}
	}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<?php
		include 'meta.php';
		include 'styles.php';
	?>
	
	<title>Kitaphane</title>

</head>

<body class="stretched">
	<div id="wrapper" class="clearfix">
		<header id="header" class="border-bottom-0">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<div id="logo">
							<a href="<?php echo $folderPath;?>" class="standard-logo" data-dark-logo="demos/articles/images/logo.png"><span class="suarez">Kitaphane</span></a>
							<a href="<?php echo $folderPath;?>" class="retina-logo" data-dark-logo="demos/articles/images/logo@2x.png"><span class="suarez">Kitaphane</span></a>
						</div>

						<div class="header-misc">
							<div>
							<?php 
						
							if(isset($_SESSION['username'])){?>
								<nav class="primary-menu">
									<ul class="menu-container">
										<li class="menu-item"><a href="<?php echo $folderPath;?>profile/?id=<?php echo $_SESSION['username'];?>" class="text-secondary header-misc-icon"><div><i class="fas fa-user"></i></div><a>
											<ul class="sub-menu-container">
												<li class="menu-item"><a href="<?php echo $folderPath;?>profile/?id=<?php echo $_SESSION['username'];?>" class="menu-link ls0"><div>Profil</div></a></li>
												<li class="menu-item"><a href="<?php echo $folderPath;?>profile/edit" class="menu-link ls0"><div>Profili Düzenle</div></a></li>
												<li class="menu-item"><a href="<?php echo $folderPath;?>messages/" class="menu-link ls0"><div>Mesajlarım(<?php echo sizeOf($ids); ?>)</div></a></li>
												<li class="menu-item"><a href="<?php echo $folderPath;?>book/add/" class="menu-link ls0"><div>Bir Kitap Ekle</div></a></li>
												<li class="menu-item"><a href="<?php echo $folderPath;?>aid-campaign/add" class="menu-link ls0"><div>Onaylı Bir Kampanya Ekle</div></a></li>
												<li class="menu-item"><a href="<?php echo $folderPath;?>sign/logout" class="menu-link ls0"><div>Çıkış Yap</div></a></li>
											</ul>
										</li>
									</ul>
								</nav>
							<?php }else{ ?>
								<a href="<?php echo $folderPath;?>sign/" class="text-secondary header-misc-icon"><i class="fas fa-sign-in-alt"></i></i></a>
							<?php } ?>
							</div>
						</div>
						<div class="header-misc">
							<div id="top-search" class="header-misc-icon">
								<a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
							</div>
						</div>


						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>
						<nav class="primary-menu">
							<ul class="menu-container">
								<li class="menu-item"><a href="<?php echo $folderPath;?>" class="menu-link ls0"><div>Ana Sayfa</div></a></li>
								<li class="menu-item"><a href="<?php echo $folderPath;?>sales/" class="menu-link ls0"><div>Satış</div></a></li>
								<li class="menu-item"><a href="<?php echo $folderPath;?>trade/" class="menu-link ls0"><div>Takas</div></a></li>
								<li class="menu-item"><a href="<?php echo $folderPath;?>aid-campaign/" class="menu-link ls0" data-scrollto="#bagis" data-highlight="#99999" data-speed="1200"><div>Yardım Kampanyaları</div></a></li>
								<li class="menu-item"><a href="<?php echo $folderPath;?>rules/" class="menu-link ls0 text-danger" ><div>Kurallar</div></a></li>
							</ul>

						</nav>

						<form class="top-search-form" action="<?php echo $folderPath;?>search/?q=" method="get">
							<input type="text" name="q" class="form-control" value="" placeholder="Kİtap/Kİtaphane" autocomplete="off">
						</form>

					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header>