<?php
//finds the names in the database
$connect = mysqli_connect("localhost", "root", "","userappointment");



$sql = "SELECT * FROM users;";
$vac_result = mysqli_query($connect, $sql);
$result_check = mysqli_num_rows($vac_result);

if($result_check>0)
{
    while($row = mysqli_fetch_assoc($vac_result) )
    {
        echo $row['fname'] . "<br>";
    }

}



?>