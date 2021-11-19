<!DOCTYPE html>
<html>


 <header><link rel="stylesheet" href="css/TableCSS.css"> </header>
 <body>

 <h2>Appointments</h2>
 <button type="button"><a href="filter.php">Filters</a></button>
 <button type="button"><a href="Table.php">All Appointments</a></button>
  <table style="width:100%" border='3'cellspacing='6'>
  <tr>

    <th>User ID</th>

    <th>Name</th>

    <th>Date of Birth</th>

    <th>Age</th>

    <th> Address </th>

    <th>Email</th>

    <th>Phone Number</th>

    <th>Choice of ID</th>

    <th>ID Number</th>

    <th>Choice of Vaccine</th>

    <th>Date of Vaccine</th>

    <th>Time</th>

    <th>Vaild form of ID</th>

    <th>Registration Form</th>

    <th colspan ="3" align = "center">Actions</th>
  </tr>
  
  

 <?php


 $connect = mysqli_connect("localhost", "root", "","userappointment");

    
 $query = "SELECT * FROM `users`";

 $results = mysqli_query($connect,$query);

 $userdata= mysqli_num_rows($results);


 if ($userdata!= 0) 
 {
    while($row = mysqli_fetch_array($results))
    {
        echo "
        <tr>

         <td>".$row['user_id'] ."</td>
         <td>".$row['fname'] ."</td>
         <td>".$row['DOB'] ."</td>
         <td>".$row['age'] ."</td>
         <td>".$row['faddress'] ."</td>
         <td>".$row['email'] ."</td>
         <td>".$row['phone_No'] ."</td>
         <td>".$row['id'] ."</td>
         <td>".$row['id_no'] ."</td>
         <td>".$row['vac'] ."</td>
         <td>".$row['DOV'] ."</td>
         <td>".$row['vactime'] ."</td>
         <td>".$row['id_proof'] ."</td>
         <td>".$row['reg'] ."</td>
         <td> <a href='Cancel_Admin.php?id=".$row['user_id']."'>Cancel</td>
         <td><a href='Confirm_Admin.php?id=".$row['user_id']."'>Confirm</td>
         <td><a href='Edit_Admin.php?id=".$row['user_id']."'>Edit</td>
        </tr> 
        ";
        

    }

 }
?>
</table>

</body>


</html>
