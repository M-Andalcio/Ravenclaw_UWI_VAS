<?php

class Dbh
{

public function connect()
{
    try 
    {
        $username = "root";
        $password = "";
        $Dbh = new PDO('mysql=localhost;dbname=vacclogin', $username,$password);
        return $Dbh;
    }
    catch(PDOException $e)
    {
        print "Error! : " . $e->getMessage(). "br/>";
        die();
    }
}

}