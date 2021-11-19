<?php


$connect = new mysqli("localhost", "root", "", "userappointment");

if($connect->connect_error)
{
    die("Failed to connect:".$connect->connect_error);
}
else
{
    $stmt = $connect->prepare("SELECT * FROM users where vac = ? AND DOV = ? AND vactime = ? ");
    $stmt->bind_param("sss", $vac, $DOV, $vactime);
    $stmt->execute();
    $stmt_result =$stmt->get_result();
    if($stmt_result->num_rows>0)
    {
        $vac= $_POST['vac'];
        $DOV= $_POST['DOV'];
        $vactime= $_POST['vactime'];

        $data =$stmt_result->fetch_all();
        if($data['vac'] == $vac && $data['DOV'] == $DOV && $data == $vactime)
        {
            echo '<script type ="text/javascript">alert("This slot is already booked, please select a different time slot.") </script>';
            header('Location:Form_V0.0.2.html');
        }
        else
        {
            echo "<script>alert ('Contact Records Inserted')</script>";
            header('Location:registration0.0.2.php');
            
        }
    }
    
}

?>
