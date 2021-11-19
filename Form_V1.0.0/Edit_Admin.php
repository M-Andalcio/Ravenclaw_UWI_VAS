
 <?php

ob_start();

$connect = mysqli_connect("localhost", "root", "","userappointment");





 $userid= $_GET ['id'];
   
 $query = "SELECT * FROM `users` WHERE `user_id` = '$userid' ";

 $results = mysqli_query($connect,$query);
 
while($row = mysqli_fetch_array($results))
    {
   
    ?>
   
    <html lang="en">
   
    <head>

     <title> Vaccination Form </title>
     <meta name = "viewport" content="width=device-width", intial-scale=1.0>
     <link rel="stylesheet" href="style_V0.0.1.css">
    </head>

    <body>

       <h1>VACCINATION FORM</h1>


      <form action = "" method = "post"> 

      <div>
        <label for="form"> User ID :</label><br>
        <input type="text" name="userid" id="form" value ="<?php echo $row ['user_id']?>" required> <br>
    </div>
    
    <div>
        <label for="form">Name :</label><br>
        <input type="text" name="name" id="form" value ="<?php echo $row ['fname']?>" required> <br>
    </div>
    
    <div>
        <label for="form"> Date of Birth :</label><br>
        <input type="date" name="DOB" id="form" value ="<?php echo $row ['DOB']?>" required><br>
    </div>

    <div>
        <label for="form">Age :</label><br>
        <input type="number" name="age" id="form" value ="<?php echo $row ['age']?>" required><br>
    </div>

    <div>
        <label for="form">Address :</label><br>
        <input name="Address" id="form" rows="4" cols="35" value ="<?php echo $row ['faddress']?>" required></input><br>
    </div>

    <div>
        <label for="form">Email :</label><br>
        <input type="email" name="email" id="form" value ="<?php echo $row ['email']?>" required><br>
    </div>

    <div>
        <label for="form">Phone Number :</label><br>
        <input type="tel" name="phone_No" id="form" value ="<?php echo $row ['phone_No']?>" required><br>
    </div>

    <div>
        <label for="form">Indicate your choice of ID :</label><br>
        <select name="id" id="form" required>
          <option value="<?php echo $row ['id']?>"><?php echo $row ['id']?></option>
          <option value="Dp">Driver's Permit</option>
          <option value="Id">ID Card</option>
          <option value="Bc">Birth Certificate</option>
          <option value="Pp">Passport</option>
        </select><br>
    </div>

    <div>
        <label for="form">ID number:</label><br>
        <input type="tel" name="id_no" id="form" value ="<?php echo $row ['id_no']?>" required><br>
    </div>

    <div>
        <label for="form">Indicate your choice of Vaccine :</label><br>
        <select name="vac" id="form" required>
          <option value="<?php echo $row ['vac']?>"><?php echo $row ['vac']?></option>
          <option value="Sp">Sinopharm</option>
          <option value="AZ">AstraZeneca</option>
          <option value="Pf">Pfizer</option>
          <option value="JJ">Johnson & Johnson</option>
        </select><br>
    </div>
    <div>
        <label for="form"> Please indicate your preferred appointment day :</label><br>

        <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


        <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
        <script type="text/javascript" name= "DOV" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script language="javascript">
            $(document).ready(function () {
                $("#date_picker").datepicker({
                    minDate: 0, beforeShowDay: $.datepicker.noWeekends
                });
            });
        </script>
         <input  type="text" name= "DOV" id="date_picker" value ="<?php echo $row ['DOV']?>" required>

    </div>

    <div>
        <label for="form">Indicate your preferred time :</label><br>
        <select name="vactime" id="form" required>
          <option value="<?php echo $row ['vactime']?>"><?php echo $row ['vactime']?></option>
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
        
        </select><br>
    </div>  

    <div>
            <label for="form">Reason for Edit/Update :</label><br>
            <textarea name="reason" id="form" rows="4" cols="35" placeholder="Enter Reason here" required></textarea><br>
    </div>

        <button for="submit" type="submit" name="update" id="update">Update</button>

    </form>
    </body>
    </html>
 

  <?php 
}
           


if (isset($_POST['update']))
 {
    require 'PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $connect = mysqli_connect("localhost", "root", "","userappointment");

    $userid= $_POST ['userid'];
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
    $reason = $_POST ['reason'];

    $myquery = "UPDATE `users` SET `fname`='$name',`DOB`='$DOB',`age`='$age',`faddress`='$Address',`email`='$email',
    `phone_No`='$phone_No',`id`='$id',`id_no`='$id_no',`vac`='$vac',`DOV`='$DOV',`vactime`='$vactime' WHERE `users`.`user_id`='$userid'";
    
    $res = mysqli_query($connect , $myquery );

    
    if($res)
    {
     
      echo '<script type ="text/javascript">alert("Appointment Updated Successfully") </script>';
      
    
    }
    else 
    {
        echo '<script type ="text/javascript">alert("Appointment Failed to Update") </script>';
    }

    $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;                              
        $mail->Username = 'SoftwareProject2007@gmail.com';         
        $mail->Password = 'Ravenclaw8*';                          
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 587;                                    
        
        $mail->setFrom('SoftwareProject2007@gmail.com', 'Uwi Vaccination');
        $mail->addAddress($_POST ['email']);     
        $mail->addReplyTo('SoftwareProject2007@gmail.com');
    
        $mail->isHTML(true);                                  
        
        $mail->Subject = 'UWI Vaccination!';
        $mail->Body   = "Your Appointment Has been Updated. <br> Find your Appointment by searching your User ID: $userid <br> 
        Your Appointment Has been Updated because: $reason";
        
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            header('Location:Table.php');
            echo 'Confirmation Email has been sent';
            
        }


 }
?>