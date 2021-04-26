
<?php 

$search = $pdo->query("SELECT * FROM books WHERE code = 1 && book_name LIKE '%" . $_GET["q"] . "%'");
$searchedWord = $search->fetchAll(PDO::FETCH_ASSOC);

// print_r($searchedWord);

?>

<section id="page-title">

<div class="container clearfix">
    <h1><?php echo $requestedQueries['q'] . "<span>arama sonuçları</span>"; ?></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo $folderPath ; ?>">Ana Sayfa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Arama</li>
    </ol>
</div>

</section>
<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					<div id="posts" class="post-grid row grid-container gutter-30" data-layout="fitRows">
                        <?php  $i = 0 ;
                             foreach ($searchedWord as $result){ 
                        ?>
                        <div class="entry col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="grid-inner">
                                <div class="entry-image entry-image-search">
                                    
                                    <a href="<?php echo $folderPath . "book-single/?book=" . $result['id']; ?>" ><img src="<?php echo $folderPath . explode("\Kit-up\\",$result['imagepath'])[1];?>" ></a>
                                </div>
                                <div class="entry-title entry-h">
                                    <h2><a href="<?php echo $folderPath . "book-single/?book=" . $result['id']; ?>"><?php echo $result['book_name']; ?></a></h2>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="icon-calendar3"></i> <?php echo $result['created_at'];?></li>
                                        <!-- <li><a href="#"><i class="icon-camera-retro"></i></a></li> -->
                                    </ul>
                                </div>
                                <div class="entry-content">
                                    <p><?php echo $result['info']; ?></p>
                                </div>
                            </div>
                        </div>
                           
                        <?php }
                        ?>
					</div>
				</div>
			</div>
</section>