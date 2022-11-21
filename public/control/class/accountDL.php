<?php
require_once "models/connection.php";
class accountDL extends connection
{
    protected $con;

    public function __construct()
    {
        parent::__construct();
        $this->con = parent::conn();
    }

    public function createAccount(account $data)
    {
        $cleanUsername = $this->sanitize($data->userName);
        $cleanHashedPassword = password_hash($data->userPassword, PASSWORD_BCRYPT);
        $cleanUserLevel = $this->sanitize($data->userLevel);

        $stmt = $this->con->prepare("INSERT INTO account(userName, userHashedPassword, userLevel) VALUES(?, ?, ?)");
        $stmt->bind_param("ssi", $cleanUsername, $cleanHashedPassword, $cleanUserLevel);
        $stmt->execute();

        $return = $stmt->error;
        $stmt->close();

        return $return;
    }

    public function readAccount(string $username)
    {
        require_once "models/account.php";
        $account = new account();
        $cleanUsername = $this->sanitize($username);

        $stmt = $this->con->prepare("SELECT * FROM account WHERE userName = ?");
        $stmt->bind_param("s", $cleanUsername);
        $stmt->execute();

        $result = $stmt->get_result();
        $item = $result->fetch_assoc();
        $stmt->close();

        if (!empty($item))
        {
            $account->userID = $item["userID"];
            $account->userName = $item["userName"];
            $account->userPassword = $item["userHashedPassword"];
            $account->userLevel = $item["userLevel"];

            return $account;
        }
        else
        {
            return "Doesnt exist";
        }

    }
}
