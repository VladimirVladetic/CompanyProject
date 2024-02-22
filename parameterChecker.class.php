<?php
include 'database.php';

class ParameterChecker{
    public function checkParameters($name,$surname,$yearofbirth,$password){
        $error = false;
        $alerttext = "Password errors: ";
        if((strlen($password) < 8)){
            $error = true;
            $alerttext .= "Password must be longer than 8 characters. ";
            //echo "<script>alert('Password must be longer than 8 characters.')</script>"; 
        }
        if(preg_match('/[A-Z]/', $password)===0){
            $error = true;
            $alerttext .= "Password must contain at least one uppercase letter. ";
            //echo "<script>alert('Password must contain at least one uppercase letter.')</script>";
        } 
        else if(preg_match('/[a-z]/', $password)===0){
            $error = true;
            $alerttext .= "Password must contain at least one lowercase letter. ";
            //echo "<script>alert('Password must contain at least one lowercase letter.')</script>";
        }
        else if(preg_match('/[0-9]/', $password)===0){
            $error = true;
            $alerttext .= "Password must contain at least one number. ";
            //echo "<script>alert('Password must contain at least one number.')</script>";
        }

        
        if($name == ""){
            $error = true;
            $alerttext .= " Name errors: ";
            $alerttext .= "Name required. ";
        }
        if($surname == ""){
            $error = true;
            $alerttext .= " Surnameame errors: ";
            $alerttext .= "Surname required. ";
        }

        $currentDate = new DateTime();
        $currentyear = $currentDate->format("Y");
        if($yearofbirth > $currentyear || $yearofbirth < 1800){
            $error = true;
            $alerttext .= " Year of birth errors: ";
            $alerttext .= "Input valid year of birth. ";
            //echo "<script>alert('Input valid year of birth.')</script>";
        }
        if($error)
        echo "<script>alert('$alerttext')</script>";

        return $error;
    }

}

?>