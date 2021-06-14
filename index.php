<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="wrapper">
					<h3>Rotate Image Before Upload</h3>
					<hr>
					<form method="post" action="upload.php" enctype="multipart/form-data">
					    <input type="file" name="file" id="file" />
					    <input type="hidden" name="rotation" id="rotation" value="0"/>
					    <br>
					    <input type="submit" name="submit" value="Upload"/>
					</form>

					<div class="img-preview" style="display: none;">
					    <button id="rleft" style="float: left;"><i class="fa fa-rotate-left"></i></button>
					    <button id="rright" style="float: right;"><i class="fa fa-rotate-right"></i></button>
					    <div id="imgPreview"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function filePreview(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		            $('#imgPreview + img').remove();
		            $('#imgPreview').after('<img src="'+e.target.result+'" class="pic-view" width="450" height="300"/>');
		        };
		        reader.readAsDataURL(input.files[0]);
		        $('.img-preview').show();
		    }else{
		        $('#imgPreview + img').remove();
		        $('.img-preview').hide();
		    }
		}

		$("#file").change(function (){
		    filePreview(this);
		});
	</script>

	<script type="text/javascript">
		$(function() {
            var rotation = 0;
            $("#rright").click(function() {
                rotation = (rotation -90) % 360;
                $(".pic-view").css({'transform': 'rotate('+rotation+'deg)'});
                
                if(rotation != 0){
                    $(".pic-view").css({'width': '300px', 'height': '300px'});
                }else{
                    $(".pic-view").css({'width': '100%', 'height': '300px'});
                }
                $('#rotation').val(rotation);
            });
            
            $("#rleft").click(function() {
                rotation = (rotation + 90) % 360;
                $(".pic-view").css({'transform': 'rotate('+rotation+'deg)'});
                
                if(rotation != 0){
                    $(".pic-view").css({'width': '300px', 'height': '300px'});
                }else{
                    $(".pic-view").css({'width': '100%', 'height': '300px'});
                }
                $('#rotation').val(rotation);
            });
        });
	</script>
</body>
</html>