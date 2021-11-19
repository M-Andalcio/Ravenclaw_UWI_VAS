<?php
if(isset($_POST["submit"]))
{

$name = $_POST["name"];
$DOB = $_POST["DOB"];
$age = $_POST["age"];
$Address = $_POST["Address"];
$email = $_POST["email"];
$phone_No = $_POST["phone_No"];
$id_choice =$POST["id_choice"];
$id_no = $_POST["id_no"];
$vaccine_choice = $POST["vaccine_choice"];
$id_proof = $_POST["id_proof"];
$reg = $_POST["reg"];
}

//Code added to connect to database - L
$conn = new mysqli('localhost', 'root', '', 'test');
if($conn->connect_error){
    die('Connection failed : '.$conn->connect_error);}
else{
    $stmt=$conn->prepare("incert into registration(name, DOB, age, Address, email, phone_No, id_choice, id_no, vaccine_choice, id_proof, reg)
        values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    /*in the process of finding data types of DOB, id_proof and reg */
    $stmt->bind_param("s_issss__", $name, $DOB, $age, $Address, $email, $phone_No, $id_choice, $id_no, $vaccine_choice, $id_proof, $reg);
    $stmt->execute();
    echo "Successfully Registered - Appointment Booked";
    $stmt->close();
    $conn->close();
    }

// instantiates sign up const class
include "classes/dbh.classes.php";
include "classes/signup.classes.php";
include "classes/signup.classes.controller.php";


$signup = new SignupContr($name, $DOB, $age, $Address, $email, $phone_No,$id_choice, $id_no, $vaccine_choice, $id_proof, $reg);
$signup -> SignUpUser();

header("location:../index.php?error=none");
?>