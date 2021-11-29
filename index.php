<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pGallery</title>
    <link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css">
</head>
<body>
    <?php include 'upload_modal.php';?>
    <div class="navbar-fixed">
        <nav class="#000000 black z-depth-3">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">pGallery</a>
            <ul class="right">
            <li><button class="btn-flat white-text modal-trigger" href="#" data-target="upload_img" onclick="load_upload_form()" style="font-weight:bold;font-size:20px;">&plus;</button></li>
            </ul>
        </div>
        </nav>
    </div>
    
   <div class="row divider"></div>
   
    <div class="row">
        <div class="col s12" id="data"></div>
    </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            load_img();
            $('.modal').modal();
        });
        function load_upload_form(){
            $('#render').load('upload_form.php');
        }
        function upload(){
            var form_data = new FormData();
            var ins = document.getElementById('file_upload').files.length;
            if(ins > 0){
                for(var x = 0; x < ins; x++){
                form_data.append("file[]",document.getElementById('file_upload').files[x]);
                }
                $.ajax({
                    url: 'process/upload_image.php',
                    dataType:'text',
                    cache: false,
                    contentType:false,
                    processData: false,
                    data: form_data,
                    type: 'POST',
                    success:function(response){
                        console.log(response);
                        load_upload_form();
                        load_img();
                        swal('Notification',response,'info');
                    }
                });
            }else{
                console.log('no file');
                document.querySelector('#message').innerHTML = 'No file is selected!';
            }
        }
        
        function load_img(){
            $.ajax({
                url: 'process/controller.php',
                type: 'POST',
                cache:false,
                data:{
                    method:'image'
                },success:function(data){
                    // console.log(data);
                    $('#data').html(data);
                }
            });
        }

        function deleteFile(file){
            // console.log(file);
            $.ajax({
                url : 'process/controller.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'delete_file',
                    file: file
                },success:function(response){
                    console.log(response);
                    swal('DELETED!');
                }
            });
        }
    </script>
</body>
</html>