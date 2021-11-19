<?php

$email= $_POST['email'];
$pwd  =$_POST['pwd'];

$connect = new mysqli("localhost", "root", "", "userappointment");

if($connect->connect_error)
{
    die("Failed to connect:".$connect->connect_error);
}
else
{
    $stmt = $connect->prepare("SELECT * FROM admintable where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result =$stmt->get_result();
    if($stmt_result->num_rows>0)
    {
        $data =$stmt_result->fetch_assoc();
        if($data['pwd'] === $pwd && $data['email'] === $email)
        {
            echo"<script>alert('Login Successful')</script>";
            header('Location:filter.php');
        }
    }
    else
    {
        echo "Wrong email or password";
    }
}


?>

