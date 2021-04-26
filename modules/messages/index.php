<?php 

    if(isset($_POST["btnn"])){
        print_r($_POST);
        // die;
        $addMessage = $pdo->prepare("INSERT INTO message_box (`from`, `to`, `message`, `created_at`, `message_id`, `title`, `seen`) VALUE (:f, :t, :msg, NOW(), :book, :title, 1)");
		$addMessage->bindValue(":f", $_POST["from"]);
		$addMessage->bindValue(":title", $_POST["title"]);
		$addMessage->bindValue(":t", $_POST["to"]);
		$addMessage->bindValue(":msg", $_POST["message"]);
		$addMessage->bindValue(":book", 10);
		$added = $addMessage->execute();
		header("location: http://localhost/Kit-up/messages/" . $_POST["book_id"]);
    }



?>

<section id="content">
	<div class="content-wrap p-0 overflow-visible clearfix">
        <div class="container mw-lg">
            <div class="heading-block center">
                <h2>Mesajlarım</h2>
            </div>
			<div class="row justify-content-center py-5">
                <div class="row">
                    <div class="col-12">
                        <div class="list-group" id="list-tab" role="tablist">
                    <?php 
                    function status($val){
                        if($val == 0){
                            return "<span style='color:red;float:right;'> Okunmadı </span>";
                        }else{
                            return "<span style='color:blue;float:right;'> Okundu </span>";
                        }
                    }

                    $ids = [];
                    $get = $pdo->query("SELECT * FROM message_box WHERE  `from` = '" . $_SESSION["username"] . "' || `to` = '" . $_SESSION["username"] . "' ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
                    foreach($get as $element){
                        
                        $status = status($element['seen']);
                            if(in_array($element["id"], $ids)){
                                continue;
                            }else if($_SESSION["username"] == $element["from"] || in_array($element["from"], $ids)){
                                continue;
                            }
                            else{
                                $ids[] = $element["from"];
                                $ids[] = $element["id"];
                                
                    ?>   
                            <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home" onclick="getMessage('<?php echo $element['title']; ?>', '<?php echo $_SESSION['username']; ?>', '<?php echo $element['from']; ?>')"><?php echo $element["title"] . status($element['seen']) . " -<span class=' list-group-item-action text-dark'>" . $element["from"] . "</span>";?></a>
                    <?php }} ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                <p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="list-group" id="test">
                                            
                                            </ul>

                                        </div>
                                    </div>
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
       </div>
</section>

<script>

function place(vl, vlm, vlmm, msg){
    if(vl === vlm){
        return `<li class="list-group-item d-flex justify-content-end">
                                          ${msg}
                                        <span class="badge badge-secondary float-right" style="margin-top: 3px;"> ${vlmm}</span>    
                                 </li>`
    }else{
        return `<li class="list-group-item d-flex justify-content-start">
                                        <span class="badge badge-secondary float-right" style="margin-top: 3px;"> ${vlmm}</span>    
                                          ${msg}
                                 </li>`
    }
}
function getMessage(value, username, to){
    var input = document.getElementById("test")
    var from = username
    var to = to
    var title = value
    var xxx
    var params = "messageId=" + value + "&seen=1"
        var xhr = new XMLHttpRequest()
        xhr.open("POST", "http://localhost/Kit-up/lib/transaction.php", true)
        xhr.responseType = 'json'
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = (response) => {

            if(xhr.response["status"] == "ok"){
                xhr.response["messages"].forEach(element => 
                  xxx += place(username, element["from"], element["created_at"], element["message"])
                );

                input.innerHTML = xxx + `<form id="reply" method="post">
                    <input class="mt-4 form-control form-control-sm" name="message" type="text" placeholder="Cevabınız">
                    <input type="hidden" name="from" value="${from}">
                    <input type="hidden" name="to" value="${to}">
                    <input type="hidden" name="title" value="${value}">
                    <button type="submit" name="btnn" class="mt-3 btn btn-block btn-primary">Cevapla</button>
                </form>`
            }
        }
        xhr.send(params)
}
    
</script>

