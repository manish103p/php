<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>World of Trekkers</title>
    <link rel="stylesheet" type="text/css" href="../css/homepage.css">
    <?php 
    if(!isset($_SESSION)){
        session_start();
    }
    ?>
    <style>
       
        

    </style>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include '../../mysqli_connect.php';
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        
        $delete_query="delete from user_trekker where email={$_SESSION['username']}";
        if ($link->query($delete_query) === TRUE) {
            header("location:logout.php");

          } else {
            echo "Error deleting record: " . $link->error;
          }
          $link->close();   
    }
    ?>
</head>
<body style="margin: 0;">


    <div class="banner">
        <img src="../images/home/banner.jpg" style="width:100%;">
        <div class="topnav">
        <?php
            include('../../mysqli_connect.php');   
            if(!isset($_SESSION)){
                session_start();
            }
            if(!isset($_SESSION['username']) or !isset($_SESSION['loggedin']) or $_SESSION['loggedin']!==true){
                echo "<a href='login.php'>LOG IN</a>";
            }
            else{                
                echo "<a href='logout.php'>LogOut</a>";
                echo "<a href='#myModal' data-toggle='modal'>Profile</a>";
            }
        ?>
           
            
            
            <img style="width:70px;height:58px;padding:8px;" src="../images/home/WEBB png.png" />
        </div>

    </div>
    <div id="myModal" class="modal fade" role="dialog" style="opacity:1;">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content" style="background-color: black;color: white;opacity:0.8;top:180px;">
            <div class="modal-header">              
              <center><h4 class="modal-title" >Profile</h4></center>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <p>
                <br>
                <?php
                    include '../../mysqli_connect.php';
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    }
                   
                    $select_query="select * from user;";
                    $rows=mysqli_query($link,$select_query);
                    while($row=mysqli_fetch_array($rows,MYSQLI_BOTH))
                    {
                        if($_SESSION['username']===$row['email']){
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;&nbsp;&nbsp; {$row['email']}"."<br><br>";
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Full Name:&nbsp;&nbsp;&nbsp; {$row['full_name']}"."<br><br>";
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Age: &nbsp;&nbsp;&nbsp;{$row['age']}"."<br><br>";
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile number:&nbsp;&nbsp;&nbsp; {$row['contact_number']}"."<br><br>";
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender:&nbsp;&nbsp;&nbsp; {$row['gender']}"."<br><br>";
                        }
                    }
                ?>
              </p>
            </div>
            <div class="modal-footer">
                <span>
                <form action="update_account.php">
                    <button type="submit" class="btn btn-warning" data-toggle="modal" style="color:white;" data-target="#confirmDeleteModal">Update</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Delete Account</button>
                </form>
                <!-- Confirm Delete Modal -->
                <div class="modal fade" id="confirmDeleteModal" role="dialog" style="opacity:1;">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content" style="top:40px;color:black;text-align:left;">
                        <div class="modal-body">
                        <p>Do you want to delete the account??</p>
                        </div>
                        <div class="modal-footer">
                        <form action="delete_account.php">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </form>
                        
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

<section id="why-us"> 
<br>
<div class="heading" id="offer-text-head"><h1> WHAT WE OFFER </h1></div>
    
    <div class="heading" id="offer-text"> Are you looking to play after work, organize your Sunday Five's football match? Explore the largest network of sports facilities whole over the India  </div>
    <div class="heading" id="offer-text"> Once you’ve found the perfect ground, court or gym, Connect with the venue through the Book Now Button to make online booking & secure easier payment </div>
    <div class="heading" id="offer-text"> You’re the hero, you’ve found a stunning turf or court, booked with ease and now its time to play. The scene is set for your epic match.  </div>
    
  
  <div class="why-us-card">
    <img src="../images/home/why_us1.png" alt="Avatar" class="why-us-images">
    <h3 class="inner" id="why">EXPLORE</h3>
  </div>

  <div class="why-us-card">
    <img src="../images/home/why_us2.png" alt="Avatar" class="why-us-images">
    <h3 class="inner" id="why">BOOK</h3>
  </div>
  
  <div class="why-us-card">
    <img src="../images/home/why_us3.png" alt="Avatar" class="why-us-images">
    <h3 class="inner" id="why">PLAY</h3>
  </div>
  
</section>
<br>
<div class="heading" id="offer-text-head"><h1> AVAILABLE OPTIONS </h1></div>


<!--grid1 start -->
<!-- CARDS -->
<?php

echo '<div class="card-group" style="padding-bottom:15px;border-bottom:1px solid #606060ff;">';
  $select_turf_query="select * from turf;";
  $rows=mysqli_query($link,$select_turf_query);
  while($row=mysqli_fetch_array($rows, MYSQLI_BOTH)){

echo '<!-- card1 -->
  <div class="card" style="border-radius:10px;">
    <img class="card-img-top" src="../images/home/turf1.jpg" alt="Card image cap" style="border-radius:8px;;padding:3px;">
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
                Also known as Mount Everest of Maharashtra !Kalsubai Peak Trek with a height of 1646 meters or 5400 Feet is famous as the highest peaks in Maharashtra. Kalsubai Mountain lies in the Sahyadri mountain range falling under Kalsubai Harishchandragad Wildlife Sanctuary. Kalsubai Height being the highest peak, it commands a beautiful view. Since Bhandardara Dam and Kalsubai Peak is extremely famous, enough effort has been made to make this trek easy. There are steel railings, chains, and ladders at places where it is difficult to climb. 
              
              </p>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#bookModal1'.$row['turf_name'].'">Book</button>
               
            </div>
          </div>
      
        </div>
      </div>

      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#bookModal1'.$row['turf_name'].'">Book</button>



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
                        if(!isset($_SESSION['username']) or !isset($_SESSION['loggedin']) or $_SESSION['loggedin']!==true){
                            echo "Login to book this trip...";
                        }
                        else{                
                            echo "Confirm Booking to {$row['turf_name']}?";
                        }
                  
                echo '</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"data-dismiss="modal">Cancel</button>';
                
                        if(!isset($_SESSION)){
                            session_start();
                        }
                        if(!isset($_SESSION['username']) or !isset($_SESSION['loggedin']) or $_SESSION['loggedin']!==true){
                            echo "<a href='login.php'><button type='button' class='btn btn-primary' data-toggle='modal'>Login</button></a>";
                        }
                        else{                
                            echo "<form method='POST' action='book.php'>
                            <input type='hidden' name='turfId' value={$row['id']} />
                            <button type='submit' class='btn btn-success' data-toggle='modal'>Confirm</button>
                            </form>";
                        }
                 
                    
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

<section id="buy">

<?php
include '../../mysqli_connect.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(isset($_SESSION['username']) and isset($_SESSION['loggedin']) and $_SESSION['loggedin']==true){
  echo "<div class='heading' id='offer-text-head'><h1> Your Previous BOOKINGS </h1></div>";
  $email=$_SESSION['username'];
  $select_turf_user_query="select * from turf_user where email='$email';";
  $select_turf_query="select * from turf;";
  $rows=mysqli_query($link,$select_turf_user_query);
 
  while($row=mysqli_fetch_array($rows, MYSQLI_BOTH)){
    $turf=mysqli_query($link,$select_turf_query);
    while($place=mysqli_fetch_array($turf,MYSQLI_BOTH)){
    if($row['turf_id']==$place['id'] ){
     
     echo "<div class='purchase-card'>
      <img src='../images/home/trip.jpg' alt='Avatar' class='trekk'>
      <div class='card-body'>
      <h5 class='card-title'>{$place['turf_name']}</h5>
          <p class='card-text'><span>{$place['size']} ft.</span></p>
          <p class='card-text'>Rs.&nbsp;{$place['price']}</p>
          <p class='card-text'>Time: {$place['timeslot_start']}</p>
      </div>
    </div>";
    }
    
  }

  }


}

?>

</section>



<footer>
 <p> COPYRIGHT @WORLD OF TREKKERS
 <a class="homebutton" href='../admin/login.php'><i class="fa fa-caret-left" ></i>&nbsp;&nbsp;Admin</a> </p>
 
</footer>
    

</body>
</html>