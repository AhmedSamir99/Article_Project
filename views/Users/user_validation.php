<?php
function validateName($name) {
    if (strlen($name) > MAX_LENGTH) {
        return "Name is too long";
    } elseif (strlen($name) < MIN_LENGTH) {
        return "Name is too short";
    } else {
        return "";
    }
}

function validateEmail($email, $dbHandler) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Please enter a valid email address";
    } else {
        $sql = "SELECT COUNT(*) FROM users WHERE email='$email'";
        $result = $dbHandler->getResults($sql);
        if ($result[0]["count(*)"] > 0) {
            return "Email already exists";
        } else {
            return "";
        }
    }
}

function validateMobileNumber($mobileNumber) {
    if (strlen($mobileNumber) != MOBILENUMBER_MIN_LENGTH) {
        return "Please enter a valid mobile number with 10 digits";
    } else {
        return "";
    }
}

function validatePassword($password) {
    if (strlen($password) < PASS_MIN_LENGTH) {
        return "Password is too short it must be more than 5";
    } elseif (strlen($password) > PASS_MAX_LENGTH) {
        return "Password is too long it must be less than 20";
    } else {
        return "";
    }
}

function validateUsername($username) {
    if (strlen($username) > MAX_LENGTH) {
        return "Username is too long";
    } elseif (strlen($username) < MIN_LENGTH) {
        return "Username is too short";
    } else {
        return "";
    }
}
?>