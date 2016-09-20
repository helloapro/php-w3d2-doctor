<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Doctor.php";
    require_once "src/Patient.php";

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

        function test_getName()
        {
            $name = "Dr. Neil Jones";
            $id = null;
            $specialty = "Gastronomy";
            $test_doctor = new Doctor($name, $id, $specialty);
            $result = $test_doctor->getName();
            $this->assertEquals($name, $result);
        }

        function test_getId()
        {
            $name = "Dr. Neil Jones";
            $id = 1;
            $specialty = "Gastronomy";
            $test_doctor = new Doctor($name, $id, $specialty);
            $result = $test_doctor->getId();
            $this->assertEquals($id, $result);
        }

        function test_getSpecialty()
        {
            $name = "Dr. Neil Jones";
            $id = 1;
            $specialty = "Gastronomy";
            $test_doctor = new Doctor($name, $id, $specialty);
            $result = $test_doctor->getSpecialty();
            $this->assertEquals($specialty, $result);
        }

        function test_save()
        {
            $name = "Dr. Neil Jones";
            $id = null;
            $specialty = "Gastronomy";
            $test_doctor = new Doctor($name, $id, $specialty);
            $test_doctor->save();
            $result = Doctor::getAll();
            $this->assertEquals($test_doctor, $result[0]);
        }

        // function test_getPatients()
        // {
        //     $name = "Dr. Neil Jones";
        //     $id = null;
        //     $specialty = "Gastronomy";
        //     $test_doctor = new Doctor($name, $id);
        //     $test_doctor->save();
        //     $name = "Dr. Amanda Franklin";
        //     $id = null;
        //     $specialty = "Audiology";
        //     $test_doctor2 = new Doctor($name, $id);
        //     $test_doctor2->save();
        //
        //
        //     $id = null;
        //     $doctor_id = $test_doctor->getId();
        //     $name = "Bobby";
        //     $breed = "Husky";
        //     $gender = "neutral";
        //     $date_admitted = "2016-09-02";
        //     $test_animal = new Animal($id, $doctor_id, $name, $breed, $gender, $date_admitted);
        //     $test_animal->save();
        //     $id = null;
        //     $doctor_id = $test_doctor2->getId();
        //     $name = "Fluffy";
        //     $breed = "Tabby";
        //     $gender = "Male";
        //     $date_admitted = "2016-09-10";
        //     $test_animal2 = new Animal($id, $doctor_id, $name, $breed, $gender, $date_admitted);
        //     $test_animal2->save();
        //
        //     $result = $test_doctor->getAnimals();
        //
        //     $this->assertEquals($test_animal, $result[0]);
        // }
    }
?>
