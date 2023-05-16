<?php

class User {
    private string $name;
    private string $email;
    private string $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function login($email, $password): bool
    {
        return ($email === $this->email && $password === $this->password);
    }

    public function changePassword(string $old_password, string $new_password): bool
    {
        if ($old_password === $this->password) {
            $this->password = $new_password;
            return true;
        }
        return false;
    }
}

$randomPassCorrect = bin2hex(random_bytes(10));
$randomPassWrong   = bin2hex(random_bytes(10));

$user = new User("Ktoto", "ktoto@example.com", $randomPassCorrect);

echo "Логін з невірними даними: ";
var_dump($user->login("nekto@example.com", $randomPassWrong));
echo "<br>";

echo "Логін з вірними даними: ";
var_dump($user->login("ktoto@example.com", $randomPassCorrect));
echo "<br>";

echo "Зміна паролю з невірними даними: ";
var_dump($user->changePassword($randomPassWrong, 'newpass'));
echo "<br>";

echo "Зміна паролю з вірними даними: ";
var_dump($user->changePassword($randomPassCorrect, 'newpass'));
echo "<br>";
