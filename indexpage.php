<?php  
$output="images/textimage2.jpg";
$i=0;
if(isset($_POST["submit"])){
    $input_text=$_POST['text'];
    $source=realpath($_FILES["imagefile"]["tmp_name"]);
    $source_ext=$_FILES["imagefile"]["type"];
    $allowed_types = array ('image/jpeg','image/jpg');
    if (in_array($source_ext, $allowed_types) ) {
			$image=imagecreatefromjpeg($source);
			imagejpeg($image,$output);
			$blue=imagecolorallocate($image,0,0,255);
			$font_size=40;
			$rotation=0;
			$coordinates=$_POST['coordinates'];
			$coordinates=explode(" ",$coordinates);
			$origin_x=$coordinates[0];
			$origin_y=$coordinates[0];
			$text2=imagettftext($image,$font_size-10,$rotation,$origin_x+70,$origin_y,$blue,"fonts/TCCEB.TTF",$input_text);
			imagejpeg($image,$output,99);
			$i=1;
	}else {
		echo "Plese upload jpeg or jpg files";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	  <title>Text On Image</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>Text On Image</h2></center>
<center>
<div class="container">
	  <form class="form-horizontal" method="post" action='' enctype="multipart/form-data">
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="imagefile">Browse the image</label>
	      <div class="col-sm-10">
	        <input type="file" class="form-control" id="imagefile" name="imagefile">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="text">Enter the input text</label>
	      <div class="col-sm-10">          
	        <input type="text" class="form-control" id="text" placeholder="Enter the text" name="text">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="text">Enter the Text loaction X and Y coordinates</label>
	      <div class="col-sm-10">          
	        <input type="text" class="form-control" id="coordinates" placeholder="coordinates should be seperated by space" name="coordinates">
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-10">
	        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
	      </div>
	    </div>
	  </form>
	</div>
	</form>
</center>
<center>
	<?php if($i==1){?>
	<img src="<?php echo $output;?>">
	<?php }?>
</center>
</body>
</html>