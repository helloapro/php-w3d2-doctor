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

    class PatientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Patient::deleteAll();
        }

        function test_getName()
        {
            $name = "Fannie Mae";
            $id = null;
            $dob = "1962-02-26";
            $test_patient = new Patient($name, $id, $dob);
            $result = $test_patient->getName();
            $this->assertEquals($name, $result);
        }

        function test_getId()
        {
            $name = "Fannie Mae";
            $id = 1;
            $dob = "1962-02-26";
            $test_patient = new Patient($name, $id, $dob);
            $result = $test_patient->getId();
            $this->assertEquals($id, $result);
        }

        function test_getDOB()
        {
            $name = "Fannie Mae";
            $id = 1;
            $dob = "1962-02-26";
            $test_patient = new Patient($name, $id, $dob);
            $result = $test_patient->getDOB();
            $this->assertEquals($dob, $result);
        }

        function test_save()
        {
            $name = "Fannie Mae";
            $id = null;
            $dob = "1962-02-26";
            $test_patient = new Patient($name, $id, $dob);
            $test_patient->save();
            $result = Patient::getAll();
            $this->assertEquals($test_patient, $result[0]);
        }

        // function test_getPatients()
        // {
        //     $name = "Fannie Mae";
        //     $id = null;
        //     $dob = "1962-02-26";
        //     $test_patient = new Patient($name, $id);
        //     $test_patient->save();
        //     $name = "Dr. Amanda Franklin";
        //     $id = null;
        //     $dob = "Audiology";
        //     $test_patient2 = new Patient($name, $id);
        //     $test_patient2->save();
        //
        //
        //     $id = null;
        //     $patient_id = $test_patient->getId();
        //     $name = "Bobby";
        //     $breed = "Husky";
        //     $gender = "neutral";
        //     $date_admitted = "2016-09-02";
        //     $test_animal = new Animal($id, $patient_id, $name, $breed, $gender, $date_admitted);
        //     $test_animal->save();
        //     $id = null;
        //     $patient_id = $test_patient2->getId();
        //     $name = "Fluffy";
        //     $breed = "Tabby";
        //     $gender = "Male";
        //     $date_admitted = "2016-09-10";
        //     $test_animal2 = new Animal($id, $patient_id, $name, $breed, $gender, $date_admitted);
        //     $test_animal2->save();
        //
        //     $result = $test_patient->getAnimals();
        //
        //     $this->assertEquals($test_animal, $result[0]);
        // }
    }


?>
