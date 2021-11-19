<?php

$connect = mysqli_connect("localhost", "root", "","userappointment");

// get the post records

if (isset($_POST['submit']))
{
    $name= $_POST ['name'];
    $DOB = $_POST ['DOB'];
    $age = $_POST ['age']; 
    $Address= $_POST ['Address'];
    $email = $_POST ['email'];
    $phone_No = $_POST ['phone_No'];
    $id = $_POST ['id'];
    $id_no = $_POST ['id_no'];
    $vac = $_POST ['vac'];
    $DOV = $_POST ['DOV'];
    $vactime = $_POST ['vactime'];
    $id_proof = $_POST ['id_proof'];
    $reg = $_POST ['reg'];

    $query = "INSERT INTO `users` ( `fname`, `DOB`, `age`, `faddress`, `email`, `phone_No`, `id`, `id_no`,`vac`,`DOV`,`vactime`,`id_proof`, `reg`) VALUES
    ('$name','$DOB','$age','$Address','$email','$phone_No','$id','$id_no','$vac','$DOV','$vactime','$id_proof','$reg')";


    $results = mysqli_query($connect , $query );

    
    if($results)
    {
    	echo "<script>alert ('Contact Records Inserted')</script>";
        echo '<script type ="text/javascript">alert("Appointment Booked Successfully") </script>';
    }
    else 
    {
        echo "<script>alert ('Contact Records Failed')</script>";
        echo '<script type ="text/javascript">alert("Appointment Booked Successfully") </script>';
    }


}


if (isset($_POST['submit']))
{
    require 'PHPMailerAutoload.php';
    $connects = mysqli_connect("localhost", "root", "","userappointment");

    $mail = new PHPMailer;

    $name= $_POST ['name'];
    $DOB = $_POST ['DOB'];
    $email = $_POST ['email'];
    $vac = $_POST ['vac'];
    $DOV = $_POST ['DOV'];
    $vactime = $_POST ['vactime'];


    $querys = "SELECT * FROM `users` WHERE `fname` = '$name' and `DOB` = '$DOB' ";

    $result = mysqli_query($connects,$querys);



    while($row = mysqli_fetch_array($result))
        {
            $userid= $row['user_id'];
        }



        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;                              
        $mail->Username = 'SoftwareProject2007@gmail.com';         
        $mail->Password = 'Ravenclaw8*';                          
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 587;                                    
        
        $mail->setFrom('SoftwareProject2007@gmail.com', 'Uwi Vaccination');
        $mail->addAddress($_POST ['email']);     
        $mail->addReplyTo('SoftwareProject2007@gmail.com');
    
        $mail->isHTML(true);                                  
        
        $mail->Subject = 'UWI Vaccination!';
        $mail->Body   = "Congratulations!! Appointment Successfully Booked. DATE:$DOV TIME:$vactime, to find your Appointment search your User ID: $userid ";

        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Confirmation Email has been sent';
            header('Location:index.html');
        }
    
    
            
           
    
    
    
    }
?>
