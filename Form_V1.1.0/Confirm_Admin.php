<?php


 $connect = mysqli_connect("localhost", "root", "","userappointment");

 $userid= $_GET ['id'];

 $myquery = "SELECT * FROM `users` WHERE `user_id` = '$userid' ";

 $res = mysqli_query($connect , $myquery );

 while($row = mysqli_fetch_array($res))
 {
     $userid= $row['user_id'];
     $name= $row['fname'];
     $DOB= $row['DOB'];
     $age= $row['age'];
     $Address= $row['faddress'];
     $email= $row['email'];
     $phone_No= $row['phone_No'];
     $id= $row['id'];
     $id_no= $row['id_no'];
     $vac= $row['vac'];
     $DOV= $row['DOV'];
     $vactime= $row['vactime'];
     $reg = $row['reg'];

     if (empty($reg))
     {
        $myquery ="DELETE FROM `users` WHERE `user_id` = '$userid' ";
    
        $results = mysqli_query($connect , $myquery );
     }

     elseif ($vac == "AZ")
     {
         $S_DOV = date('m/d/y', strtotime($DOV. ' + 21 days'));
         $query = "INSERT INTO `users` ( `fname`, `DOB`, `age`, `faddress`, `email`, `phone_No`, `id`, `id_no`,`vac`,`DOV`,`vactime`) VALUES
         ('$name','$DOB','$age','$Address','$email','$phone_No','$id','$id_no','$vac','$S_DOV','$vactime')";
         $results = mysqli_query($connect , $query );
         if($results)
         {
         echo "<script>alert ('Record Confirmed')</script>";} 
          else {
 
         echo "<script>alert ('Records Failed To Confirm')</script>";}
         $my_query ="DELETE FROM `users` WHERE `user_id` = '$userid' ";
    
         $results = mysqli_query($connect , $my_query );
     }
     elseif ($vac == "Pf")
     {
         $S_DOV = date('m/d/y', strtotime($DOV. ' + 14 days'));
         $query = "INSERT INTO `users` ( `fname`, `DOB`, `age`, `faddress`, `email`, `phone_No`, `id`, `id_no`,`vac`,`DOV`,`vactime`) VALUES
         ('$name','$DOB','$age','$Address','$email','$phone_No','$id','$id_no','$vac','$S_DOV','$vactime')";
         $results = mysqli_query($connect , $query );
         if($results)
         {
          echo "<script>alert ('Record Confirmed')</script>";} 
          else {
 
         echo "<script>alert ('Records Failed To Confirm')</script>";}
         $my_query ="DELETE FROM `users` WHERE `user_id` = '$userid' ";
    
         $results = mysqli_query($connect , $my_query );
     }
     elseif ($vac == "Sp")
     {
         $S_DOV = date('m/d/y', strtotime($DOV. ' + 10 days'));
         $query = "INSERT INTO `users` ( `fname`, `DOB`, `age`, `faddress`, `email`, `phone_No`, `id`, `id_no`,`vac`,`DOV`,`vactime`) VALUES
         ('$name','$DOB','$age','$Address','$email','$phone_No','$id','$id_no','$vac','$S_DOV','$vactime')";
         $results = mysqli_query($connect , $query );
         if($results)
        {
         echo "<script>alert ('Record Confirmed')</script>";} 
         else {

        echo "<script>alert ('Records Failed To Confirm')</script>";}
        $my_query ="DELETE FROM `users` WHERE `user_id` = '$userid' ";
    
        $results = mysqli_query($connect , $my_query );
     }
     elseif ($vac == "JJ")
     {
        $myquery ="DELETE FROM `users` WHERE `user_id` = '$userid' ";
    
        $results = mysqli_query($connect , $myquery );
        if($results)
        {
        echo "<script>alert ('Record Confirmed')</script>";} 
        else {

        echo "<script>alert ('Records Failed To Confirm')</script>";}
     }
     


     
     header('Location:Table.php');

}
        
 
    
?>