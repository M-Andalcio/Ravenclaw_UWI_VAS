<?php

?>
   
    <html lang="en">
   
    <head>

     <title> Vaccination Form </title>
     <meta name = "viewport" content="width=device-width", intial-scale=1.0>
     <link rel="stylesheet" href="style_V0.0.1.css">
    </head>

    <body>

       <h1> VACCINATION Cancellation Reason </h1>


      <form action = "" method = "post"> 

    <div>
            <label for="form">Reason for Cancellation :</label><br>
            <textarea name="reason" id="form" rows="4" cols="35" placeholder="Enter Reason here" required></textarea><br>
    </div>

        <button for="submit" type="submit" name="cancel" id="cancel">Cancel</button>

    </form>
    </body>
    </html>
 

  <?php 

if (isset($_POST['cancel']))
{
   require 'PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $connect = mysqli_connect("localhost", "root", "","userappointment");
    $reason = $_POST ['reason'];

    $userid= $_GET ['id'];
    $myquery2 = "SELECT * FROM `users` WHERE `user_id` = '$userid' ";
    $res = mysqli_query($connect , $myquery2 );

    while($row = mysqli_fetch_array($res))
   {
     
      $mail->isSMTP();                                      
      $mail->Host = 'smtp.gmail.com'; 
      $mail->SMTPAuth = true;                              
      $mail->Username = 'SoftwareProject2007@gmail.com';         
      $mail->Password = 'Ravenclaw8*';                          
      $mail->SMTPSecure = 'tls';                            
      $mail->Port = 587;                                    
      
      $mail->setFrom('SoftwareProject2007@gmail.com', 'Uwi Vaccination');
      $mail->addAddress($row['email']);     
      $mail->addReplyTo('SoftwareProject2007@gmail.com');
  
      $mail->isHTML(true);                                  
      
      $mail->Subject = 'UWI Vaccination!';
      $mail->Body   = "Unfortuately, Your Appointment Has been Cancelled. <br> Your Appointment Has been Cancelled because: $reason";
      
      
      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          header('Location:Table.php');
          echo 'Confirmation Email has been sent';
          
      }
     
     
   }
   if($results)
   {
    echo "<script>alert ('Contact Records Cancel')</script>";} 
    else {

   
    echo "<script>alert ('Contact Records Failed To Cancel')</script>";}
    
    $myquery ="DELETE FROM `users` WHERE `user_id` = '$userid' ";
    
    $results = mysqli_query($connect , $myquery );

    

}
 
    


?>