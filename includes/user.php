<?php
class User
{
    public function __construct(
        public string $username,
        public string $password,
        public string $email = '',
        public $pdo
    )
    {}

    function userExists() 
    {
        $sql = "SELECT username FROM users WHERE username=? OR email=?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$this->username, $this->email]);

        $row = $statement->fetch();
        if($row)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function login()
    {
        $sql = "SELECT username, password FROM users WHERE username=?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$this->username]);

        $row = $statement->fetch();

        $pswCheck = password_verify($this->password, $row['password']);

        if($row) 
        {
            if($pswCheck)
            {
                session_start();
                $_SESSION['user'] = $this->username;

                header('Content-Type: application/json');
                echo json_encode(array('message' => 'User found.'));
            }
            else
            {
                header('Content-Type: application/json');
                echo json_encode(array('message' => 'Wrong password.'));
            }
        }
        else
        {
            header('Content-Type: application/json');
            echo json_encode(array('message' => 'User not found.'));
        }
    }

    function register()
    {
        if($this->userExists())
        {
            header('Content-Type: application/json');
            echo json_encode(array('message' => 'User already exists.'));
        }
        else
        {
            $psw_hash = password_hash($this->password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users VALUES (NULL, ?, ?, ?, NULL, 0)";
            $statement = $this->pdo->prepare($sql);
            $statement->execute([$this->username, $this->email, $psw_hash]);

            session_start();
            $_SESSION['user'] = $this->username;

            header('Content-Type: application/json');
            echo json_encode(array('message' => 'User created.'));
        }
    }
}