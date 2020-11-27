<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <script src="../js/register.js"></script>
    <?php
    include '../../mysqli_connect.php';
    if(!isset($_SESSION)){
        session_start();
    }

if (isset($_SESSION['loggedinad']) && $_SESSION['loggedinad'] == true) {

} else {
    echo "Please log in first to see this page.";
    header("location:login.php");
}

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $image_tmpname = $_FILES['image_filename']['name'];
        $turf_name = $_POST['turf_name'];
        $email = $_POST['emailId'];
        $contact_number = $_POST["contactNumber"];
        $turf_address = $_POST["turf_address"];
        $timeslot_start = $_POST["timeslot_start"];
        $timeslot_end = $_POST["timeslot_end"];
        $price = $_POST["price"];
        $size = $_POST["size"];
        if (isset($_POST['refreshments'])) $refreshments = 1;
        else $refreshments = 0;
        if (isset($_POST['changingRoom'])) $changingRoom = 1;
        else $changingRoom = 0;
        if (isset($_POST['seating'])) $seating = 1;
        else $seating = 0;

        $imgdir = "upload/";
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

        $insert_query = "insert into turf (turf_name,email,contact_number,turf_address,timeslot_start,timeslot_end,price,refreshments,changingRoom,size,seating) values ('$turf_name','$email','$contact_number','$turf_address','$timeslot_start','$timeslot_end','$price','$refreshments','$changingRoom','$size','$seating');";
        if (mysqli_query($link, $insert_query)) {
            echo "<div style='background-color: rgb(0, 0, 0);
								margin:auto;
								margin-top:60px;
								margin-bottom:-65px;
								font-family: Arial, Helvetica, sans-serif;
								padding: 10px;
								width: 50%;
								opacity: 0.8;
								border-radius: 15px;
								text-align: center;
								color: rgba(17,238,17, 1);
								box-shadow: 7px 7px 10px #252525;'>Turf has been added to the website. 
						</div>";
        } else {
            echo "<div style='background-color: rgb(0, 0, 0);
								margin:auto;
								margin-top:60px;
								margin-bottom:-65px;
								font-family: Arial, Helvetica, sans-serif;
								padding: 10px;
								width: 50%;
								opacity: 0.8;
								border-radius: 15px;
								text-align: center;
								color: rgba(255,205,0, 1);
								box-shadow: 7px 7px 10px #252525;'>Some error occured. Turf has not been added.
						</div>";
        }

        
        
        $last_pic_id = mysqli_insert_id($link);
        $newfilename = $imgdir.$last_pic_id.$ext;
        rename($imgname,$newfilename); 
        }
        



    }

    mysqli_close($link);

    ?>

</head>

<body>
    <a class="homebutton" href="..\admin\homepage.php"><i class="fa fa-caret-left"></i>&nbsp;&nbsp;Home</a>
    <form id="regForm" name="regForm" enctype="multipart/form-data" action="add.php" name="RegisterForm" onsubmit="return validatesignup()" method="POST">
        <div class="yoo">
            <h4 class="title">Post</h4>
            <div class="title-text text-muted">Post a new turf entry</div>
            <br>
            <div class="warning-message invisible" id="warning-message">
            </div>
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-child"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Enter turf name" name="turf_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="email" class="form-control" placeholder="Email" name="emailId" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-address-book"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="10 digit contact number" name="contactNumber" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-map-marker"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Enter address" name="turf_address" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        
                        <label for="timeslot_start">From</label>
                        <input type="datetime-local" id="timeslot_start" name="timeslot_start" min="09:00" max="18:00" required>
                        <label for="timeslot_start">&nbsp;&nbsp;&nbsp;To</label>
                        <input type="datetime-local" id="timeslot_end" name="timeslot_end" min="09:00" max="18:00" required>
                       
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-money"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="price" name="price" required>
                    </div>
                </div>
                <div class="form-group" >Amenities: <br>
                    
                        
                        <input class="form-check-input" type="checkbox" id="refreshments" name="refreshments" value=1>
                        <label for="refreshments"> Refreshments Available</label><br>
                        <input class="form-check-input" type="checkbox" id="changingRoom" name="changingRoom" value=1>
                        <label for="changingRoom"> Changing Room Available</label><br>
                        <input class="form-check-input" type="checkbox" id="seating" name="seating" value=1>
                        <label for="seating"> Seating Area Available</label>
                    
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-area-chart"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Enter turf size" name="size" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-camera-retro fa-lg"></i>
                        </span>
                        Upload Image:<input type="file" name="image_filename" id="image_filename"><br>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <center>
            <span>
                <button type="reset" class="reset-button">Reset</button> &nbsp;&nbsp;&nbsp;
                <button type="submit" class="register-button">Post</button>
            </span>
        </center>
        <br>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>