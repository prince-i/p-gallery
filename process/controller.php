<?php
$method = $_POST['method'];
if($method == 'image'){
    $dir = '../image_folder';
    $file = scandir($dir);
    foreach($file as $x){
        echo '<img src="image_folder/'.$x.'"/>';
    }
}

?>