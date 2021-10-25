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
                            echo '<a href="#">This is a link</a>';
                        echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}

?>