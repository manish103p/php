<?php



$sql = "CREATE TABLE IF NOT EXISTS images(
        image_id INT(11) NOT NULL PRIMARY key AUTO_INCREMENT,
 image_caption VARCHAR(255) NOT NULL,
 image_username VARCHAR(255) NOT NULL,
 image_date DATE not null)";

$results = mysqli_query($link,$sql) or die(mysqli_error());
echo "<h2>Table for storing images create successfully</h2>";
?>
<html>
<head>
<title>Upload your picture</title>
</head>
<body>

<form name="form1" action="check_image.php" enctype="multipart/form-data" method="post">

Upload Image:<input type="file" name="image_filename" id="image_filename"><br>

</form>
Here is your pic
<img src="uploads/<?php echo $last_pic_id.$ext; ?>" align='center'>
</body>
</html>
