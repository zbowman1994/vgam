<?php

namespace ics199;

class Name {

    private $firstName;
    private $lastName;
    private static $nameCount = 0;

    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        self::$nameCount++;
    }

    public static function getObjectCount() {
        return self::$nameCount;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function __toString() {
        return "$this->firstName $this->lastName";
    }

}

?>