<?php
$method = $_POST['method'];
if($method == 'image'){
    $dir = '../image_folder';
    $file = scandir($dir);
    foreach($file as $x){
        if($x == '.' || $x == '..')continue;
        echo '<div class="row">';
            echo '<div class="col l12 s12 m6">';
                echo '<div class="card">';
                    echo '<img src="image_folder/'.$x.'" class="responsive-img "/>';
                        echo '<div class="card-content">';
                            echo '<button class="btn-small red" onclick="deleteFile(&quot;'.$x.'&quot;)">Delete</button>';
                        echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}

if($method == 'delete_file'){
    $dir = "../image_folder/";
    $file = $_POST['file'];
    if(unlink($dir."".$file) == TRUE){
        echo "deleted";
    }else{
        echo "failed";
    }
}

?>