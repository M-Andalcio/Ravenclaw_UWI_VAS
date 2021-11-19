<?php

class Signup extends Dbh 
{
    protected function setuser($name, $DOB, $age, $Address, $email, $phone_No, $id_choice, $id_no, $vaccine_choice, $id_proof, $reg)
    {
        $stmt = $this -> connect() -> prepare('INSERT INTO users(users_DBid, users_id_no, users_name, users_DOB, users_age, users_Address, users_email, users_phone, users_id_proof, users_reg) VALUES(?,?,?,?,?,?,?,?,?,?);');

        if(!$stmt -> execute(array($email, $id_no)))
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }


    public function checkuser($email, $id_no)
    {
        $stmt = $this -> connect() -> prepare('SELECT users_email FROM users WHERE users_email = ? OR users_email = ?;');
        
        if(!$stmt -> execute(array($email, $id_no)))
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $resultCheck=false;
        if($stmt->rowCount()>0)
        {
            $resultCheck = false;
        }
        else
        {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function idselect()
    {
        if(isset($_POST['submit']))
        {
            if(!empty($_POST['id'])) 
            {
            $selected = $_POST['id'];
            echo 'You have chosen: ' . $selected;
            }
        }
    }

    protected function vaccselect()
    {
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['vac'])) 
        {
        $selected = $_POST['vac'];
        echo 'You have chosen: ' . $selected;
        }
    }
}


}
?>