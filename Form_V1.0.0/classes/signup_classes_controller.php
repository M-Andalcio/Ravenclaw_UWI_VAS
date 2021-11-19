<?php
include "classes/signup.classes.php";
include "classes/signup_inc.php";
class SignupContr extends Signup_inc
{
private $name ;
private $DOB ;
private $age ; 
private $Address;
private $email;
private $phone_No;
private $id_choice;
private $id_no;
private $vaccine_choice;
private $id_proof;
private $reg;

public function __construct($name, $DOB, $age, $Address, $email, $phone_No, $id_choice, $id_no, $vaccine_choice, $id_proof, $reg)
{
    $this -> name = $name;
    $this -> DOB = $DOB;
    $this -> age = $age;
    $this -> Address = $Address;
    $this -> email = $email;
    $this -> phone_No = $phone_No;
    $this -> id_choice = $id_choice;
    $this -> id_no = $id_no;
    $this -> vaccine_choice;
    $this -> id_proof = $id_proof;
    $this -> reg = $reg;
}

public function SignUpUser()
{
    
    if($this -> emptyInput() == false)
    {
        //echo empty input
        header("location:../index.php?error=emptyinput");
        exit();
    }
    if($this -> invalidname() == false)
    {
        //echo invalid name
        header("location:../index.php?error=name");
        exit();
    }
    if($this -> invalidEmail() == false)
    {
        //echo invalid email
        header("location:../index.php?error=invalidemail");
        exit();
    }
    if($this -> uidTakenCheck() == false)
    {
        //echo id taken
        header("location:../index.php?error=idtaken");
        exit();
    }
    
    $this-> setuser($this-> name, $this-> DOB, $this-> age, $this-> Address, $this-> email, $this-> phone_No, $this -> id_choice, $this-> id_no, $this-> vaccine_choice, $this-> id_proof, $this-> reg);
}



//check for empty input fields
private function emptyInput()
{
    $result = false;
    if(empty($this -> name) || empty($this -> DOB) || empty($this -> age) || empty($this -> Address) || empty($this -> email) || empty($this -> phone_No) || empty($this -> id_no) || empty($this -> id_proof) || empty($this -> reg) )
    {
        $result = false;
    }
    else
    {
        $result = true;
    }
    return $result;
}
//check valid username type

private function invalidname()
{
    $result=false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $this ->name))
    {
        $result = false;
    }
    else 
    {
        $result = true;
    }
    return $result;
}

private function invalidEmail()
{
    $result = false;
    if(!filter_var($this->email,FILTER_VALIDATE_EMAIL))
    {
        $result = false;
    }
    else
    {
        $result = true;
    }
    return $result;
}
private function uidTakenCheck()
{
    include "../classes/signup.classes.php";
    $result = false;
    if(!$this->checkuser($this->email, $this->id_no))
    {
        $result = false;
    }
    else
    {
        $result = true;
    }
    return $result;
}



}