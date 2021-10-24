<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css">
</head>
<body>
    <div class="row">
        <div class="col s12">

        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input type="file" name="file[]" id="file_upload" multiple accept="image/*">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload one or more files">
            </div>
        </div>
        
        <button class="btn" id="upload" onclick="upload()">upload</button>
        </div>
    </div>
   
    <div class="row">
        <div class="col s12" id="data"></div>
    </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script>
        load_img();
        function upload(){
            var form_data = new FormData();
            var ins = document.getElementById('file_upload').files.length;
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
                    load_img();
                }
            });
        }

        function load_img(){
            $.ajax({
                url: 'process/controller.php',
                type: 'POST',
                cache:false,
                data:{
                    method:'image'
                },success:function(data){
                    console.log(data);
                    $('#data').html(data);
                }
            });
        }
    </script>
</body>
</html>