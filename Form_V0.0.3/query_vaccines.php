<?php

$connect = mysqli_connect("localhost", "root", "","userappointment");

//https://www.codeproject.com/Articles/32508/How-to-Use-SQL-Server-to-Select-Records-for-a-Sche

$sql = "SELECT * FROM users;";
$vac_result = mysqli_query($connect, $sql);
$result_check = mysqli_num_rows($vac_result);

if($result_check>0)
{
    while($row = mysqli_fetch_assoc($vac_result) )
    {
        echo $row['vac'] . "<br>";
    }

}



?>