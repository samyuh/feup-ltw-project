<?php 
    /*
    * REGEX VALIDATORS 
    */
    function validUsername($element) {
        return preg_match ("/^[a-zA-Z0-9]+$/", $element);
    }

    function validGender($element) {
        return preg_match ("/^(fe)?male$/", $element);
    }

    function validNumber($element) {
        return preg_match ("/^\d+$/", $element);
    }

    function validLocation($element) {
        return preg_match ("/^[a-zA-Z0-9]+$/", $element);
    }
    
    function validPassword($element) {
        return preg_match ("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $element);
    }
    
    function validName($element) {
        return preg_match ("/^[a-zA-Z0-9]+$/", $element);
    }

    function validSpecie($element) {
        return preg_match ("/^(dog|cat)$/", $element);
    }

    function validSize($element) {
        return preg_match ("/^(small|medium|large)$/", $element);
    }

    function validColor($element) {
        return preg_match ("/^[a-zA-Z0-9]+$/", $element);
    }

    function validText($element) {
        return preg_match ("/^(\w|\s|,|!|\?|')+$/", $element);
    }
?>