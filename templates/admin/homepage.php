<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>ADMIN</title>
    <link rel="stylesheet" type="text/css" href="../css/homepage_admin.css">
    <?php 
    if(!isset($_SESSION)){
        session_start();
    }

if (isset($_SESSION['loggedinad']) && $_SESSION['loggedinad'] == true) {

} else {
    echo "Please log in first to see this page.";
    header("location:login.php");
}
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include '../../mysqli_connect.php';
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        

    }
    ?>
</head>
<body style="margin: 0;">


    <div class="banner">
        <div class="topnav">
        <?php
            include('../../mysqli_connect.php');   
            if(!isset($_SESSION)){
                session_start();
            }
            if(!isset($_SESSION['usernamead']) or !isset($_SESSION['loggedinad']) or $_SESSION['loggedinad']!==true){
                echo "<a href='login.php'>LOG IN</a>";
            }
            else{                
                echo "<a href='logout.php'>LogOut</a>";
                echo "<a href='add.php'>ADD TURF</a>";
            }
        ?>   
            
            <img style="width:70px;height:58px;padding:8px;" src="../images/home/WEBB png.png" />
        </div>

    </div>



<br><br><br>
<!--grid1 start -->
<!-- CARDS -->
<?php

echo '<div class="card-group" style="padding-bottom:15px;border-bottom:1px solid #606060ff;">';
  $select_turf_query="select * from turf;";
  $rows=mysqli_query($link,$select_turf_query);
  while($row=mysqli_fetch_array($rows, MYSQLI_BOTH)){

echo '<!-- card1 -->
  <div class="card" style="border-radius:10px;">
    <img class="card-img-top" src="../admin/upload/'.$row['id'].'.jpg" alt="Card image cap" style="border-radius:8px;;padding:3px;height:50%;width:95%; display: block;margin-left: auto;    margin-right: auto;">
    <div class="card-body">
      <h5 class="card-title">'.$row['turf_name'].'</h5>
      <p class="card-title"><span>'.$row['size'].' ft</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="align-item:right;"></span></p>
      <p class="card-title">Rs. '.$row['price'].'</p>
    </div>
    <div class="card-footer">
      <center>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#knowMoreModal1'.$row['turf_name'].'">Know More</button>
        &nbsp;  

        <div id="knowMoreModal1'.$row['turf_name'].'" class="modal fade" role="dialog" style="opacity:1;">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content" style="background-color: black;color: white;opacity:0.95;top:120px;border:2px solid white;">
            <div class="modal-header">
              <center><h4 class="modal-title">'.$row['turf_name'].'</h4></center>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <p>
                <br>
                <h5>EMAIL: &nbsp;'.$row['email'].'</h5>
                <h5>CONTACT: &nbsp;'.$row['contact_number'].'</h5>
                <h5>ADDRESS: &nbsp;'.$row['turf_address'].'</h5>
                <h5>TIME SLOT START: &nbsp;'.$row['timeslot_start'].'</h5>
                <h5>TIME SLOT END: &nbsp;'.$row['timeslot_end'].'</h5>
                <h5>PRICE: &nbsp;'.$row['price'].'</h5>
                <h5>SIZE: &nbsp;'.$row['size'].' square ft</h5> 
              
              </p>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#bookModal1'.$row['turf_name'].'">DELETE</button>
               
            </div>
          </div>
      
        </div>
      </div>

      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#bookModal1'.$row['turf_name'].'">DELETE</button>



        <div id="bookModal1'.$row['turf_name'].'" class="modal fade" role="dialog" style="opacity:1;">
            <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="background-color: black;color: white;opacity:0.95;top:190px;border:2px solid white;">
                <div class="modal-header">
                <center><h4 class="modal-title" >'.$row['turf_name'].'</h4></center>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <p>';
                  

                        if(!isset($_SESSION)){
                            session_start();
                        }
                        if(!isset($_SESSION['usernamead']) or !isset($_SESSION['loggedinad']) or $_SESSION['loggedinad']!==true){
                            echo "Login to delete...";
                        }
                        else{                
                            echo "Confirm deleting of {$row['turf_name']}?";
                        }
                  
                echo '</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"data-dismiss="modal">Cancel</button>';
                
                            echo "<form method='POST' action='delete.php'>
                            <input type='hidden' name='turfId' value={$row['id']} />
                            <button type='submit' class='btn btn-success' data-toggle='modal'>Confirm</button>
                            </form>";
                 
                    
                echo"</div>
            </div>
        </div>
    </div>
      </center>
    </div>
  </div>";
 }
?>
    

</div>
<!-- end CARDS-->
<!--grid1 end -->



<footer>
 <p> COPYRIGHT @BOOKMYTURF
 <a class="homebutton" href='../html/homepage.php'><i class="fa fa-caret-left" ></i>&nbsp;&nbsp;home</a> </p>
 
</footer>
    

</body>
</html>