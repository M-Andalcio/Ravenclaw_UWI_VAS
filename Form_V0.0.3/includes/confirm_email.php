<?php

if(isset($_POST['submit']))
{// check if user entered data into the form
    $mailto = $email;  //email address on which we send the contact form
    $from = "narvelle.ferdinand@my.uwi.edu"; //email coming from admin
    $name = $_POST['name']; //users name
    $subject = "New Vaccination appointment"; // for admin
    $subject2 = "Your appointment has been booked successfully!"; //for client
    $message = "Client name: ". $name. "booked a vaccination appointment";//for admin
    $message2 = "Client name: ". $name. "Thank you for booking an appointment. Please continue to protect yourself and others";//this is for sender/client 
    $headers = "From ". $mailto; //admin email address
    $headers2 = "From ". $from; //
    $result = mail($mailto, $subject,$message, $headers); // confirmation to admin
    $result2 = mail($from, $subject2, $message2, $headers2); // confirmation to client
    if ($result)//if email is submitted successfully
    {
        echo '<script type ="text/javascript">alert("Appointment Booked Successfully") </script>';
    }
    else
    {
        echo '<script type ="text/javascript">alert("Appointment Booked Successfully") </script>';
    }

}

?>

