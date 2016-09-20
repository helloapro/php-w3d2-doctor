<?php
    class Doctor
    {
        private $id;
        private $name;
        private $specialty;

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


        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM doctors;");
        }
    }
?>
