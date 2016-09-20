<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Doctor.php";
    //require_once "src/Patient.php";

    $server = 'mysql:host=localhost;dbname=clinic_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class DoctorTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Doctor::deleteAll();
        }
    }
?>
