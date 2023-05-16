<?php

class User {
    private $name;
    private $email;
    private $password;

    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function login($email, $password) {
        return ($email === $this->email && $password === $this->password);
    }

    public function change_password($old_password, $new_password) {
        if ($old_password === $this->password) {
            $this->password = $new_password;
            return true;
        }
        return false;
    }
}

// Create a user object with random property values
$user = new User("John Doe", "johndoe@example.com", "password123");

// Test login with correct and incorrect data
echo "Login with correct data:\n";
var_dump($user->login("johndoe@example.com", "password123"));

echo "Login with incorrect data:\n";
var_dump($user->login("janedoe@example.com", "wrongpassword"));

// Test changing password with correct and incorrect old password
echo "Change password with correct old password:\n";
var_dump($user->change_password("password123", "newpassword"));

echo "Change password with incorrect old password:\n";
var_dump($user->change_password("wrongpassword", "newpassword"));
?>
