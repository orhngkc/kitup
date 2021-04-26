<?php
	$book_details = $pdo->query("SELECT * FROM books where id=".$_REQUEST["book"]);
	$book_detail = $book_details->fetchObject();
	// print_r($book_detail->trader);


	if(isset($_POST["button"])){
		$a = $pdo->prepare("INSERT INTO `comment`(`comment`, `user_id`, `post_id`, created_at) VALUES (:comment, :user_id, $book_detail->id, NOW())");
		$a->bindValue(":comment", $_POST["comment"]);
		$a->bindValue(":user_id", $_SESSION["id"]);
		$final = $a->execute();
		header("location: http://localhost/Kit-up/book-single/?book=". $_REQUEST["book"] );
	}

	if(isset($_POST["messageBtn"])){
		print_r($_POST);
		$addMessage = $pdo->prepare("INSERT INTO message_box (`from`, `to`, `message`, `created_at`, `message_id`, `title`) VALUE (:f, :t, :msg, NOW(), :book, :title)");
		$addMessage->bindValue(":f", $_SESSION["username"]);
		$addMessage->bindValue(":title", $_POST["title"]);
		$addMessage->bindValue(":t", $_POST["author"]);
		$addMessage->bindValue(":msg", $_POST["message"]);
		$addMessage->bindValue(":book", $_POST["book_id"]);
		$added = $addMessage->execute();
		header("location: http://localhost/Kit-up/book-single/?book=" . $_POST["book_id"]);
	}


?>

<section id="content">

			<div class="content-wrap pb-0 clearfix">

				<div class="container">
					<div class="row justify-content-between">
						<div class="col-md-5">
						<img class="centered" src="<?php echo $folderPath . explode("\Kit-up\\",$book_detail->imagepath)[1];?>">
                            <ul class="list-group-flush my-3 mb-0">
								<li class="list-group-item">Kargo<strong><?php echo $if = ($book_detail->cargo == 0) ? "Satıcı" : "Alıcı"; ?></strong> Ödemeli</li>
								<li class="list-group-item">Yazar:<strong><?php echo $book_detail->author; ?></strong></li>
								<li class="list-group-item">Sayfa Sayısı<strong> <?php echo $book_detail->p_number; ?></strong> </li>
								<li class="list-group-item">Baskı Tarihi: <strong><?php echo $book_detail->p_date; ?></strong></li>
								<li class="list-group-item"><strong><?php echo $book_detail->publisher; ?></strong> Yayınevi</li>
							</ul>
						</div>
						<div class="col-md-6">
                    
                            <h2 class="h1 mb-5 font-weight-bold"><?php echo $book_detail->book_name; ?></h2>
                                
                            
							<div class="d-flex align-items-center justify-content-between">

							    <!-- <del class="op-03">$39.99</del> -->
                                <div class="h2"> <strong class="color"><?php echo $book_detail->price; ?> TL</strong></div>
                                
                                <div>
								<a href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=". $folderPath . "book-single/?book=" . $book_detail->id;?>"  target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0')"class="social-icon si-small si-borderless si-facebook">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a href="<?php echo "http://twitter.com/share?text=". $book_detail->book_name ." kitabı" ."&url=". $folderPath . "book-single/?book=" . $book_detail->id . "&hashtags=kitaphane aracılığıyla satışta";?>"  target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0')" class="social-icon si-small si-borderless si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a href="whatsapp://send?text=book-single/?book=<?php echo $book_detail->id ;?>" data-action="share/whatsapp/share"  target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0')" class="social-icon si-small si-borderless si-whatsapp">
                                        <i class="icon-whatsapp"></i>
                                        <i class="icon-whatsapp"></i>
                                    </a>
                                    <button class="btn btn-success" onclick="window.location.href='<?php echo $folderPath . 'profile/?id=' . $book_detail->trader; ?>'"><i class="far fa-envelope"></i> Satıcıya Ulaş</button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Mesaj At</button>


									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Yeni Mesaj</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form method="post">
												<div class="form-group">
													<label for="recipient-name" class="col-form-label">Konu:</label>
													<input type="text" class="form-control" id="recipient-name" name="title" value="<?php echo $book_detail->book_name . " kitabı hakkında"; ?>" >
													<input type="hidden" class="form-control" id="recipient-name" name="book_id" value="<?php echo $book_detail->id; ?>" >
													<input type="hidden" class="form-control" id="recipient-name" name="author" value="<?php echo $book_detail->trader; ?>" >
												
													<label for="message-text" class="col-form-label">Mesaj:</label>
													<textarea class="form-control" id="message-text" name="message" placeholder="Mesajınızı giriniz."></textarea>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Çıkış</button>
													<button type="submit" class="btn btn-primary" name="messageBtn">Gönder</button>
												</div>
											</form>
										</div>
										</div>
									</div>
									</div>
                                </div>
                                
                            </div>
                            

							<div class="line line-sm"></div>


							<p><?php echo $book_detail->info; ?> </p>
							

						</div>
					</div>
				</div>
            </div>
            
          		  <div class="container">
					<div class="heading-block topmargin text-center border-bottom-0">
						<h2 class="font-weight-normal ls0 nott">Sitemizdeki Benzer Kitaplar</h2>
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

					<form method="post" id="commentForm">


						<h3 id="comments-title"><span><?php echo $pdo->query("SELECT * FROM comment WHERE post_id= " . $book_detail->id)->rowCount();?></span> Yorum var</h3>
							<ol class="commentlist" id="comment">
							<?php 
								$comments = $pdo->query("SELECT * FROM comment WHERE post_id = " . $book_detail->id)->fetchAll(PDO::FETCH_OBJ);
								// print_r($comments);	
								foreach($comments as $comment){
							?>

							<li class="comment even thread-even depth-1" id="li-comment-1">
								<div id="comment-1" class="comment-wrap clearfix">
									<div class="comment-meta">
										<div class="comment-author vcard">
											<span class="comment-avatar clearfix">
											<img alt="Image" src="https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60" class="avatar avatar-60 photo avatar-default" height="60" width="60"></span>
										</div>
									</div>
									<div class="comment-content clearfix">
										<div class="comment-author"><?php $name = $pdo->query("SELECT name_surname FROM users1 where id =" . $comment->user_id)->fetchAll(PDO::FETCH_OBJ);
										
										echo $name[0]->name_surname; ?><span><a href="#" title="Permalink to this comment"><?php echo $comment->created_at; ?></a></span></div>
										<p><?php echo $comment->comment; ?></p>
										<a class="comment-reply-link" href="#"><i class="icon-reply"></i></a>
									</div>
									<div class="clear"></div>
								</div>
							</li>

							<?php
								}
							?>
							</ol>
						<h3>Bir <span>Yorum</span> Yaz</h3>	
						<div class="form-group col-12">
							<label for="comment">Yorumunuz</label>
							<textarea name="comment" id="parentComment" cols="58" rows="7" tabindex="4" class="form-control"></textarea>
						</div>

						<div class="form-group col-12 mt-4 mb-0">
							<button name="button" type="submit" tabindex="5" class="button button-large button-black button-dark nott font-weight-medium ls0 button-rounded m-0">Gönder</button>
						</div>

					</form>

				</div>

			





				
</section>

