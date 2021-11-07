<?php


 $connect = mysqli_connect("localhost", "root", "","userappointment");

 $userid= $_GET ['id'];

 $myquery ="DELETE FROM `users` WHERE `user_id` = '$userid' ";
    
 $results = mysqli_query($connect , $myquery );
        
 if($results)
 {
    echo "<script>alert ('Contact Records Cancel')</script>";} 
 else {

    echo "<script>alert ('Contact Records Failed To Cancel')</script>";}
    
    header('Location:Table.php');
?>