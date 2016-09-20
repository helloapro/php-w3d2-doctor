<?php
    class Doctor
    {
        private $name;
        private $id;
        private $specialty;

        function __construct($name, $id=null, $specialty)
        {
            $this->id = $id;
            $this->name = $name;
            $this->specialty = $specialty;
        }

        function getId()
        {
            return $this->id;
        }

        function getName()
        {
            return $this->name;
        }

        function getSpecialty()
        {
            return $this->specialty;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO doctors (name, specialty) VALUES ('{$this->getName()}', '{$this->getSpecialty()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_doctors = $GLOBALS['DB']->query("SELECT * FROM doctors;");
            $doctors = array();
            foreach($returned_doctors as $doctor) {
                $id = $doctor['id'];
                $name = $doctor['name'];
                $specialty = $doctor['specialty'];
                $new_doctor = new Doctor($name, $id, $specialty);
                array_push($doctors, $new_doctor);
            }
            return $doctors;
        }


        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM doctors;");
        }
    }
?>
