<?php

class splitOperation
{

    public function getUser_id($username, $dbcon)
    {
        try {
            $stmt = $dbcon->prepare("select user_id from user_table WHERE email=?");
            $stmt->execute([$username]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $user_id = $row['user_id'];
            }
            return $user_id;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function categoryName($category, $dbcon)
    {
        try {
            $stmt = $dbcon->prepare("select name from category_table where category_id=?");
            $stmt->execute([$category]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $categoryName = $row['name'];
            }
            return $categoryName;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function insertSplitExpense($category, $user_id, $splitAmount, $dbcon, $split_id, $email, $username)
    {
        //get Transaction_id from expense table and update here
        $date = date("Y-m-d");
        $month = date("m", strtotime($date));
        $query = "insert into expense_table (category_id,user_id,amount,date,split) values (?,?,?,?,?)";
        $stmt = $dbcon->prepare($query);
        $stmt->execute([$category, $user_id, $splitAmount, $month, 'yes']);
        $transaction_id = $dbcon->lastInsertId();
        $query = "update split_table set transaction_id = '$transaction_id' where split_id = '$split_id' ";
        $stmt = $dbcon->prepare($query);
        $stmt->execute();
        $split = new splitOperation();
        $categoryName = $split->categoryName($category, $dbcon);
        //Worked by Raghav Gupta *************
        include "email.php";
        $emails = explode(",", $email);
        try {
            foreach ($emails as $email1) {
                $mail->addAddress("$email1");
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Budgetit Expense';
                $mail->Body = "$categoryName expense added by $username <br> Total amount is: $splitAmount";
                $mail->send();
            }
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        //**************
        return true;
    }

    public function splitAmount($email, $amount)
    {
        $emails = explode(",", $email);
        $count = count($emails);
        $splitAmount = $amount / ($count + 1);
        return $splitAmount;
    }

    public function updateSplitDetailsTable($email, $dbcon, $amount, $user_id, $splitAmount, $split_id)
    {
        $date = date("Y-m-d");
        $month = date("m", strtotime($date));
        $owedAmount = $amount - $splitAmount;
        $query = "insert into split_details (split_id,split_emails,owed_amount,month,user_id) values (?,?,?,?,?)";
        $stmt = $dbcon->prepare($query);
        $stmt->execute([$split_id, $email, $owedAmount, $month, $user_id]);
        return true;
    }

    public function insertSplitDetails($category, $amount, $email, $username)
    {
        try {
            require 'connection.php';
            $con = new DatabaseConnection();
            $dbcon = $con->connect();
            $split = new splitOperation();
            $user_id = $split->getUser_id($username, $dbcon);
            $query = "insert into split_table (user_id,email,category_id) values (?,?,?)";
            $stmt = $dbcon->prepare($query);
            $stmt->execute([$user_id, $email, $category]);
            $split_id = $dbcon->lastInsertId();
            //call splitAmount function
            $splitAmount = $split->splitAmount($email, $amount);
            //call insertSplitExpense function
            $split->insertSplitExpense($category, $user_id, $splitAmount, $dbcon, $split_id, $email, $username);
            //call update splitDetails function
            $split->updateSplitDetailsTable($email, $dbcon, $amount, $user_id, $splitAmount, $split_id);
            return true;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

}