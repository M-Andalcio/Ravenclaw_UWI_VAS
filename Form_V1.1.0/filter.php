<!DOCTYPE html>
<html lang="en">

<?php

include("config.php")
?>

<header><link rel="stylesheet" href="TableCSS.css"> </header>

<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style type ="text/css">

</style>

</head>
<body>
    <div id = "filters">
    <span>Fetch results by &nbsp;</span>
    <select name = "fetchval" id = "fetchval">

        <option value="" disabled="" selected="">Select Filter</option>
        <option value="Sp">Sinopharm</option>
        <option value="AZ" >AstraZeneca</option>
        <option value="Pf">Pfizer</option>
        <option value="JJ">Johnson & Johnson</option>
    </select>
    </div>

    <div id = "filters">
        <span>Fetch results by &nbsp;</span>
        <select name = "fetchtime" id = "fetchtime">
    
            <option value="Bl" selected disabled>Choose a time</option>
            <option value="8:30">8:30am</option>
            <option value="9:00">9:00am</option>
            <option value="9:30">9:30am</option>
            <option value="10:00">10:00am</option>
            <option value="10:30">10:30am</option>
            <option value="11:00">11:00am</option>
            <option value="11:30">11:30pm</option>
            <option value="12:00">12:00pm</option>
            <option value="12:30">12:30pm</option>
            <option value="1:00">1:00pm</option>
            <option value="1:30">1:30pm</option>
            <option value="2:00">2:00pm</option>
            <option value="2:30">2:30pm</option>
            <option value="3:00">3:00pm</option>
            <option value="3:30">3:30pm</option>
            <option value="4:00">4:00pm</option>

        </select>
        </div>

        <div id = "filters">
            <span>Fetch results by &nbsp;</span>
                <input type="text" name="DOV" id="fetchdate" placeholder="MM/DD/YYYY" required><br>
        </div>


    <div class= "container">
        <table class= "table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Vaccine</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Registration Form</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM users";
                $r = mysqli_query($connect,$query);
                while($row = mysqli_fetch_assoc($r))
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
    </div>



<script type ="text/javascript">
    $(document).ready(function()
    {
        $("#fetchval").on('change',function()
        {
            var value = $(this).val();

            $.ajax
            ({
                url:"fetch_vaccines.php",
                type:"POST",
                data: 'request=' + value,
                beforeSend:function()
                {
                    $(".container").html("<span>Working...</span>");
                },
                success:function(data)
                {
                    $(".container").html(data);
                }
            })

        });
    });
</script>


<script type ="text/javascript">
    $(document).ready(function()
    {
        $("#fetchtime").on('change',function()
        {
            var value = $(this).val();
            //alert(value);

            $.ajax
            ({
                url:"fetch_times.php",
                type:"POST",
                data: 'request=' + value,
                beforeSend:function()
                {
                    $(".container").html("<span>Working...</span>");
                },
                success:function(data)
                {
                    $(".container").html(data);
                }
            })

        });
    });
</script>


<script type ="text/javascript">
    $(document).ready(function()
    {
        $("#fetchdate").on('change',function()
        {
            var value = $(this).val();
            //alert(value);

            $.ajax
            ({
                url:"fetch_date.php",
                type:"POST",
                data: 'request=' + value,
                beforeSend:function()
                {
                    $(".container").html("<span>Working...</span>");
                },
                success:function(data)
                {
                    $(".container").html(data);
                }
            })

        });
    });
</script>


</body>
