
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Vaccination Appointments </title>
        <meta name = "viewport" content="width=device-width", intial-scale=1.0>
        <link rel="stylesheet" href="css/CSS.css">
        <link rel="stylesheet" type="text/css" href="css/SearchUsers.css">

    </head>

<body>      
    <center> 
        <form action="" method="post">
            <input type="text" name = "userid" placeholder="Please enter your User ID"><br>
            <input type="submit" name ="search" Value= "Search User ID"><br>
    </form>

<?php

$connect = mysqli_connect("localhost", "root", "","userappointment");



if (isset($_POST['search'])) {

    $userid= $_POST ['userid'];
    
    $query = "SELECT * FROM `users` WHERE `user_id` = '$userid' ";

    $results = mysqli_query($connect,$query);



    
    while($row = mysqli_fetch_array($results))
        {
            echo "<script>alert ('Contact Record Found')</script>";
        ?>
            <form action="" method = "POST">
            <input type="text" hidden name = "userid" value ="<?php echo $row ['user_id'] ?>"/><br>
            <label for="form">Full Name: </label><br>
            <input type="text" name = "fname" value ="<?php echo $row ['fname']?>"/><br>
            <label for="form">Date Of Birth:</label><br>
            <input type="text" name = "DOB" value ="<?php echo $row ['DOB']?>"/><br>
            <label for="form">Type Of Vaccine:</label><br>
            <input type="text" name = "vac" value ="<?php echo $row ['vac']?>"/><br>
            <label for="form">Vaccination Date:</label><br>
            <input type="text" name = "DOV" value ="<?php echo $row ['DOV']?>"/><br>
            <label for="form">Vaccination Time:</label><br>
            <input type="text" name = "vactime" value ="<?php echo $row ['vactime']?>"/><br>
            <input type="submit" name ="delete" Value= "Cancel Appointment"><br>
            
        
            </form>
        <?php
         

    }
        
   

}

if (isset($_POST['delete']))
    {
        $userid= $_POST ['userid'];
        
        $myquery ="DELETE FROM `users` WHERE `user_id` = '$userid' ";
    
        $res =  mysqli_query($connect,$myquery);
        
        if($res)
        {
            echo "<script>alert ('Contact Records Deleted')</script>";} 
        else {
            echo "<script>alert ('Contact Records Failed To Delete')</script>";}
    
    } 

?>
  <form action="" method="post">
            
            <button type="button"><a href="index.html">Main Menu</a></button>

    </form>
    </center>

</body>
