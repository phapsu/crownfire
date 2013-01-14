<?php

// Directory where uploaded images are saved
$dirname = "uploads"; 

// If uploading file
/*
print_r($_REQUEST);
if ($_REQUEST['photo']) {
	$imageData = base64_decode($_REQUEST['photo']);
	$file = $dirname.'/image.jpg';
	if (file_exists($file)) { unlink($file); }
	$fp = fopen($file, 'w');
	fwrite($fp, $imageData);
	fclose($fp);
	
	$fp = fopen($dirname.'/base64.txt', 'w');
	fwrite($fp, $_REQUEST['photo']);
	fclose($fp);
}
exit;
*/
if ($_FILES) {
    print_r('>>>>>>>FILES<<<<<<<<<<');
	print_r($_REQUEST);
	
    print_r($_FILES);
	print_r('>>>>>>>END FILES<<<<<<<<<<');
    mkdir ($dirname, 0777, true); 
    move_uploaded_file($_FILES["file"]["tmp_name"],$dirname."/".$_FILES["file"]["name"]);
}

// If retrieving an image
else if (isset($_GET['image'])) {
    print_r('>>>>>>>IMG<<<<<<<<<<');
    $file = $dirname."/".$_GET['image'];

    // Specify as jpeg
    header('Content-type: image/jpeg');
  
    // Resize image for mobile
    list($width, $height) = getimagesize($file); 
    $newWidth = 120.0; 
    $size = $newWidth / $width;
    $newHeight = $height * $size; 
    $resizedImage = imagecreatetruecolor($newWidth, $newHeight); 
    $image = imagecreatefromjpeg($file); 
    imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height); 
    imagejpeg($resizedImage, null, 80); 
}

// If displaying images
else {
    $baseURI = "http://".$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
    $images = scandir($dirname);
    $ignore = Array(".", "..");
    if ($images) {
        foreach($images as $curimg){ 
            if (!in_array($curimg, $ignore)) {
                echo "Image: ".$curimg."<br>";
                echo "<img src='".$baseURI."?image=".$curimg."&rnd=".uniqid()."'><br>"; 
            }
        }
    }
    else {
        echo "No images on server";
    }
}
?>