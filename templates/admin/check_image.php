<?php
$link = mysqli_connect("localhost","root","","image")
or die("Could not connect".mysqli_error());

$image_caption = $_POST['image_caption'];
$image_username = $_POST['image_username'];
$image_tmpname = $_FILES['image_filename']['name'];
$today = date("Y-m-d");

$imgdir = "../exp_3/upload/";
$imgname = $imgdir.$image_tmpname;
if(move_uploaded_file($_FILES['image_filename']['tmp_name'], $imgname))
{
list($width,$height,$type,$attr)= getimagesize($imgname);
switch($type)
{
 case 1:
  $ext = ".gif"; break;
 case 2:
  $ext = ".jpg"; break;
 case 3:
  $ext = ".png"; break;
 default:
   echo "Not acceptable format of image";
}
$insert = "insert into images (image_caption, image_username, image_date)
   values ('$image_caption','$image_username','$today')";
$insertresults = mysqli_query($link,$insert) or die(mysqli_error());


$last_pic_id = mysqli_insert_id($link);
$newfilename = $imgdir.$last_pic_id.$ext;
rename($imgname,$newfilename); 
}
?>
Here is your pic<br>
<img src="upload/<?php echo $last_pic_id.$ext; ?>" align='center'>
