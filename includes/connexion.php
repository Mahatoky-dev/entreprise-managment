<?php
function bddConnect()
{
    static $connect = null ;

    if($connect === null)
    {
        $connect = mysqli_connect("localhost","root","","employees");
        // $connect = mysqli_connect("localhost","ETU3916","NXW5YU8K","db_s2_ETU003916");
        if(!$connect)
        {
            die("echec de la connexion au base de donné : " . mysqli_connect_error());
        }
    }

    return $connect;
}

?>
