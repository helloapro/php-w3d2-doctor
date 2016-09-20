<?php
    class Patient
    {
        private $name;
        private $id;
        private $dob;

        function __construct($name, $id=null, $dob)
        {
            $this->id = $id;
            $this->name = $name;
            $this->dob = $dob;
        }

        function getId()
        {
            return $this->id;
        }

        function getName()
        {
            return $this->name;
        }

        function getDOB()
        {
            return $this->dob;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO patients (name, dob) VALUES ('{$this->getName()}', '{$this->getDOB()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_patients = $GLOBALS['DB']->query("SELECT * FROM patients;");
            $patients = array();
            foreach($returned_patients as $patient) {
                $id = $patient['id'];
                $name = $patient['name'];
                $dob = $patient['dob'];
                $new_patient = new Patient($name, $id, $dob);
                array_push($patients, $new_patient);
            }
            return $patients;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM patients;");
        }
    }
?>
