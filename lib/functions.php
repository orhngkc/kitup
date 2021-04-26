<?php
    function convertedURL(){
        $r = array();
        if (isset($_SERVER['REQUEST_URI'])) {
            $request_path = explode('?', $_SERVER['REQUEST_URI']);
            $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
            $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
            //$path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);

            //$path['call'] = utf8_decode($path['call_utf8']);
            $path['call'] = $path['call_utf8'];
            if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
                $path['call'] = '';
            }
            $r = explode('/', $path['call']);
        }

    if($r[0] === "") $file = "main";
    else $file = $r[0]."/";
    
    if ($r[1]=== "") $file .= "index.php";
    else $file.=$r[1].".php";
   
//    echo $file."<hr>";
     return $file;
             
    }

    function seflink($text){
        $find = array("/Ğ/","/Ü/","/Ş/","/İ/","/Ö/","/Ç/","/ğ/","/ü/","/ş/","/ı/","/ö/","/ç/");
        $degis = array("G","U","S","I","O","C","g","u","s","i","o","c");
        $text = preg_replace("/[^0-9a-zA-ZÄzÜŞİÖÇğüşıöç]/"," ",$text);
        $text = preg_replace($find,$degis,$text);
        $text = preg_replace("/ +/"," ",$text);
        $text = preg_replace("/ /","-",$text);
        $text = preg_replace("/\s/","",$text);
        $text = strtolower($text);
        $text = preg_replace("/^-/","",$text);
        $text = preg_replace("/-$/","",$text);
        return $text;
    }