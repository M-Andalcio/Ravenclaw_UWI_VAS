<?php

class Signup extends Dbh
{
    protected function setuser($name, $DOB, $age, $Address, $email, $phone_No, $id_no, $id_proof, $reg)
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


    protected function checkuser($email, $id_no)
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



}