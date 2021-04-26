<?php
if(isset($_POST["login-form-submit"])){
	// $query  = $pdo->query("SELECT * FROM users WHERE username='".$_POST["name"]."' and pass='".hash('sha256',$_POST["pass"])."'",PDO::FETCH_ASSOC);

	$query  = $pdo->query("SELECT * FROM users1 WHERE username='".$_POST["login-form-username"]."' and pass=SHA2('".$_POST["login-form-password"]."',256)",PDO::FETCH_ASSOC);
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	print_r($rows);
  	if ( $accept = $query -> rowCount() ){
		if( $accept > 0 ){
			 session_start();
			 $_SESSION['username'] = $rows[0]['username'];
			 $_SESSION['id'] = $rows[0]['id'];
			 header('location: http://localhost/Kit-up/');	
		}
	}
}

?>

<section id="content" style="">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="tabs mx-auto mb-0 clearfix" id="tab-login-register" style="max-width: 500px;">
				<ul class="tab-nav tab-nav2 center clearfix">
					<li class="inline-block"><a href="#tab-login">Giriş Yap</a></li>
					<li class="inline-block"><a href="#tab-register">Kayıt Ol</a></li>
				</ul>

				<div class="tab-container">
					<div class="tab-content" id="tab-login">
						<div class="card mb-0">
							<div class="card-body" style="padding: 40px;">
								<form id="login-form" name="login-form" class="mb-0" action="" method="post">
									<h3>Kitaphane'de Oturum Aç</h3>
									<div class="row">
									<div class="style-msg errormsg" id="loginerr">
										
									</div>
										<div class="col-12 form-group">
											<label for="login-form-username">Kullanıcı Adı:</label>
											<input type="text" id="login-form-username" name="login-form-username" value="" class="form-control" placeholder="Telefon numarası da yazabilirsiniz.."/>
											<span></span>
										</div>

										<div class="col-12 form-group">
											<label for="login-form-password">Şİfre:</label>
											<input type="password" id="login-form-password" name="login-form-password" value="" class="form-control" placeholder="Şifreniz"/>
											<span></span>
										</div>

										<div class="col-12 form-group">
											<button class="button button-3d button-black m-0" id="login-form-submit" name="login-form-submit" value="login">GİRİŞ Yap</button>
											<button class="button button-3d button-blue" id="login-form-submit" name="login-form-submit" value="login"><i class="icon-facebook"></i></button>
											<button class="button button-3d button-red" id="login-form-submit" name="login-form-submit" value="login"><i class="icon-gmail"></i></button>
										
                                
											<a href="#" class="float-right">Şifreni mi unuttun?</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="tab-content" id="tab-register">
						<div class="card mb-0">
							<div class="card-body" style="padding: 40px;">
								<h3>Kitaphaneye Kayıt Ol</h3>
								<div class="style-msg successmsg" id="success">
									
								</div>
								<form id="register-form" name="register-form" class="row mb-0" action="add" method="post">

									<div class="col-12 form-group">
										<label for="register-form-name">Ad Soyad:</label>
										<input type="text" id="register-form-name" name="register-form-name" value="" class="form-control" placeholder="Clark Kent"/>
										<span></span>
									</div>

									<div class="col-12 form-group">
										<label for="register-form-email">E-posta:</label>
										<input type="text" id="register-form-email" name="register-form-email" value="" class="form-control" placeholder="kitap@kitaphane.com"/>
										<span></span>
									</div>

									<div class="col-12 form-group">
										<label for="register-form-username">Kullanıcı Adı:</label>
										<input type="text" id="register-form-username" name="register-form-username" value="" class="form-control" placeholder="Superman"/>
										<span></span>
									</div>

									<div class="col-12 form-group">
										<label for="register-form-phone">Telefon:</label>
										<input type="text" id="register-form-phone" name="register-form-phone" value="" class="form-control" placeholder="(kripton)12525 151" maxlength="11"/>
										<span></span>
									</div>

									<div class="col-12 form-group">
										<label for="register-form-password">Şifre:</label>
										<input type="password" id="register-form-password" name="register-form-password" value="" class="form-control" placeholder="Şifre"/>
										<span></span>
									</div>

									<div class="col-12 form-group">
										<label for="register-form-repassword">Şifre Tekrar:</label>
										<input type="password" id="register-form-repassword" name="register-form-repassword" value="" class="form-control" placeholder="Şifre Tekrar" />
										<span></span>
									</div>

									<div class="col-12 form-group">
										<button class="button button-3d button-black m-0" id="register-form-submit" name="register-form-submit" value="register">Kayıt Ol!</button>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="<?php echo $folderPath; ?>assets/js/form.js"></script>