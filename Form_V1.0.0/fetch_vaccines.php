<?php


include("config.php");
if(isset($_POST['request']))
{
    $request = $_POST['request'];
    
    $query = "SELECT * FROM users WHERE vac = '$request'";
    $result = mysqli_query($connect,$query);
    $count = mysqli_num_rows($result);
}

?>
<table style="width:100%" border='3' cellspacing='6' class= "table">
<header><link rel="stylesheet" href="filterCSS.css"> </header>
    <?php

    if($count)
    {
    ?>
        <thead> 
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Vaccine</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Registration Form</th>
            </tr>
    <?php
    }
    else
    {
        echo "Sorry! no record found";
    }
    ?>
    </thead>

    <tbody>
        <?php
        while($row = mysqli_fetch_assoc($result))
        {
            ?>
        <tr>
                    <td><?php echo $row['user_id'] ?></td>
                    <td><?php echo $row['fname'] ?></td>
                    <td><?php echo $row['vac'] ?></td>
                    <td><?php echo $row['DOV'] ?></td>
                    <td><?php echo $row['vactime'] ?></td>
                    <td><?php echo $row['reg'] ?></td>
        </tr>
        <?php
        }
        ?>

    </tbody>
</table>
