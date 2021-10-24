<?php
    $count = count($_FILES['file']['name']);
    for($i = 0;$i < $count;$i++){
        // GET FILE EXTENSION
        $extn = pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
        // DETECT ERRORS
        if($_FILES['file']['error'][$i] > 0){
            echo "Error". $_FILES["file"]["error"][$i] . "<br>";
        }else{  
                // UPLOAD
                $date_n_time = date("Y-m-d");
				$rand = uniqid();
                $name = ''.$rand.''.$date_n_time.'.'.$extn;
                move_uploaded_file($_FILES['file']['tmp_name'][$i], '../image_folder/'.$name);
        }
    }
?>

