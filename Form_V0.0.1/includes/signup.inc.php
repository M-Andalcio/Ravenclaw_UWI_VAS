<?php
if(isset($_POST["submit"]))
{

$name = $_POST["name"];
$DOB = $_POST["DOB"];
$age = $_POST["age"];
$Address = $_POST["Address"];
$email = $_POST["email"];
$phone_No = $_POST["phone_No"];
$id_no = $_POST["id_no"];
$id_proof = $_POST["id_proof"];
$reg = $_POST["reg"];
}


// instantiates sign up const class
include "classes/dbh.classes.php";
include "classes/signup.classes.php";
include "classes/signup.classes.controller.php";


$signup = new SignupContr($name, $DOB, $age, $Address, $email, $phone_No, $id_no, $id_proof, $reg);
$signup -> SignUpUser();

header("location:../index.php?error=none");