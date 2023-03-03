<?php
session_start();

class Connection
{
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $db_name = "php-oop-login-logout";
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
    }
}

class Register extends Connection
{
    public function registration($name, $username, $email, $password, $confirmpassword)
    {

        $duplicate = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            return 10;
        } else {
            if ($password == $confirmpassword) {

                $query = "INSERT INTO tb_user (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";

                if ($this->conn->query($query) === TRUE) {

                    return 1;
                }
            } else {
                return 100;
            }
        }
    }
}

class Login extends Connection
{
    public $id;
    public function log_in($usernameemail, $password)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");

        if (!$result) {
            die(mysqli_error($this->conn));
        }
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if ($password == $row["password"]) {
                $this->id = $row["id"];
                return 1;
                //login successfull
            } else {
                return 10;
                //wrong password
            }
        } else {
            return 100;
            //user not registed
        }
    }
    public function idUser()
    {
        return $this->id;
    }

    
}

class logout extends Connection{
    public function log_out(){
     session_unset(); session_destroy();
     header("location: login.php");
    }
}