<?php

$connect = mysqli_connect("localhost", "root", "","userappointment");
include "classes/dbh.classes.php";
include "classes/signup.classes.php";
include "classes/signup_classes_controller.php";
include "includes/confirm_email.php";
// get the post records

if (isset($_POST['submit'])) 
{
    $name= $_POST ['name'] ;
    $DOB = $_POST ['DOB'];
    $age = $_POST ['age']; 
    $Address= $_POST ['Address'];
    $email = $_POST ['email'];
    $phone_No = $_POST ['phone_No'];
    $id = $_POST ['id'];
    $id_no = $_POST ['id_no'];
    $vac = $_POST ['vac'];
    $id_proof = $_POST ['id_proof'];
    $reg = $_POST ['reg'];

$query = "INSERT INTO `users` ( `fname`, `DOB`, `age`, `faddress`, `email`, `phone_No`, `id`, `id_no`,`vac`, `id_proof`, `reg`) VALUES
('$name','$DOB','$age','$Address','$email','$phone_No','$id','$id_no','$vac','$id_proof','$reg')";


$results = mysqli_query($connect , $query );

/*if($results)  I PUT BOTH IF STATEMNETS TOGETHER AT THE BOTTOM
{
	echo "<script>alert ('Contact Records Inserted')</script>";
}else 
{
    echo "<script>alert ('Contact Records Failed')</script>";
}*/


//if(isset($_POST['submit']))
{ // check if user entered data into the form

    $mailto = $email;  //email address on which we send the contact form
    $from = "othniel.gordon@my.uwi.edu"; //email coming from admin
    $name = $_POST['name']; //users name
    $subject = "New Vaccination appointment"; // for admin
    $subject2 = "Your appointment has been booked successfully!"; //for client
    $message = "Client name: ". $name. "booked a vaccination appointment";//for admin
    $message2 = "Client name: ". $name. "Thank you for booking an appointment. Please continue to protect yourself and others";//this is for sender/client 
    $headers = "From ". $mailto; //admin email address
    $headers2 = "From ". $from; //
    $result = mail($mailto, $subject,$message, $headers); // confirmation to admin
    $result2 = mail($from, $subject2, $message2, $headers2); // confirmation to client
    /*if ($result)//if email is submitted successfully prints this 
    {
        echo '<script type ="text/javascript">alert("Appointment Booked Successfully") </script>';
    }
    else
    {
        echo '<script type ="text/javascript">alert("Appointment Booked Unsuccessfully") </script>';
    }*/

    if($results)
    {
    	echo "<script>alert ('Contact Records Inserted')</script>";
        echo '<script type ="text/javascript">alert("Appointment Booked Successfully") </script>';
    }
    else 
    {
        echo "<script>alert ('Contact Records Failed')</script>";
        echo '<script type ="text/javascript">alert("Appointment Booked Unuccessfully") </script>';
    }

}

}

?>
