<?php

class Login extends Dbh
{

    public function getUserStmt($username, $password)
    {
        $sql = "SELECT * FROM accounts WHERE username = ? AND password = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $password]);

        public function getUser()
    {
        $sql = "SELECT * FROM accounts";
        $stmt = $this->connect()->query($sql);

//        while($row = $stmt->fetch()) {
//            echo $row['username'] . '<br>';
//        }

    }sword]);

    }




















//
//        if(!$stmt->execute(array($username, $password))) {
//            $stmt = null;
//            header('location: ../index.php?error=stmtfailed');
//            exit();
//        }
//        if ($stmt->rowCount() == 0) {
//            $stmt = null;
//            header('location: ../index.php?error=usernotfound');
//            exit();
//        }
//
//        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        $checkPassword = password_verify($password, $passwordHashed[0]['password']);
//
//        if ($checkPassword == false) {
//            $stmt = null;
//            header('location: ../index.php?error=wrongpassword');
//            exit();
//        } else if ($checkPassword == true) {
//            $stmt = $this ->connect()->prepare('SELECT * FROM user WHERE username = ? AND password = ?;');
//
//            if(!$stmt->execute(array($username, $password))) {
//                $stmt = null;
//                header('location: ../index.php?error=stmtfailed');
//                exit();
//            }
//
//            if ($stmt->rowCount() == 0) {
//                $stmt = null;
//                header('location: ../index.php?error=usernotfound');
//                exit();
//            }
//
//            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//            session_start();
//            $_SESSION["username"] = $user[0]["username"];
//        }
//
//
//        $stmt = null;
//


//        $sql = "SELECT * FROM user";
//        $result = $this->connect()->query($sql);
//        $numRows = $result->num_rows;
//        if ($numRows > 0) {
//            while ($row = $result->fetch_assoc()) {
//                $data[] = $row;
//            }
//            return $data;
//        }



}
