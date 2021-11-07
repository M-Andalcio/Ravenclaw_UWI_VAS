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

?>
