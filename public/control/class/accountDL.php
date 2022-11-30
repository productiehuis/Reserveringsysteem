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

        $stmt->bind_result($userID, $userName, $userPassword, $userLevel);
        $result = $stmt->fetch();
        $stmt->close();

        if (!empty($result))
        {
            $account->userID = $userID;
            $account->userName = $userName;
            $account->userPassword = $userPassword;
            $account->userLevel = $userLevel;

            return $account;
        }
        else
        {
            return "Doesnt exist";
        }

    }
}
