<?php

class ChartPopulate
{
    public function populateExpenseChart($username, $month)
    {
        try {
            require_once 'connection.php';
            $con = new DatabaseConnection();
            $dbcon = $con->connect();
            $detils = new AccountDetailsOp();
            $user_id = $detils->getUser_id($username, $dbcon);
            $query = "select s.name,a.total from (select sum(amount) total, category_id from project.expense_table
 where user_id=? and date=?
 group by category_id) a,category_table s where a.category_id=s.category_id";
            $stmt = $dbcon->prepare($query);
            $stmt->execute([$user_id, $month]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $entry = "";
            foreach ($rows as $row) {
                $entry .= "['" . $row{'name'} . "'," . $row{'total'} . "],";
            }
            return $entry;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    // Implemented by Mary Ann Joji B00783053
    public function populateBudgetChart($username)
    {
        try {
            require_once 'connection.php';
            $con = new DatabaseConnection();
            $dbcon = $con->connect();
            $detils = new AccountDetailsOp();
            $user_id = $detils->getUser_id($username, $dbcon);
            $query = "select sum(amount) as newamt from budget_table where user_id=? and month=?";
            $stmt = $dbcon->prepare($query);
            $ExArr = array();
            $ExArr1 = array();
            for ($i = 1; $i < 13; $i++) {
                $stmt->execute([$user_id, $i]);
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row) {
                    array_push($ExArr, $i);
                    if ($row['newamt'] == 0) {
                        array_push($ExArr1, 0);
                    } else {
                        array_push($ExArr1, $row['newamt']);
                    }

                }
            }
            $c = array_combine($ExArr, $ExArr1);

            $query1 = "select sum(amount) as totEx from expense_table where user_id=? and date=?;";
            $stmt1 = $dbcon->prepare($query1);
            $ExArr = array();
            $ExArr1 = array();
            for ($i = 1; $i < 13; $i++) {
                $stmt1->execute([$user_id, $i]);
                $rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row) {
                    array_push($ExArr, $i);
                    if ($row['totEx'] == 0) {
                        array_push($ExArr1, 0);
                    } else {
                        array_push($ExArr1, $row['totEx']);
                    }

                }
            }
            $d = array_combine($ExArr, $ExArr1);
            $entry = "";
            foreach ($c as $x => $x_value) {
                foreach ($d as $x1 => $x_value1) {
                    if (($x == 1) && ($x1 == 1)) {
                        $entry .= "['Jan'," . $x_value . "," . $x_value1 . "],";
                        break;
                    } else if (($x == 2) && ($x1 == 2)) {
                        $entry .= "['Feb'," . $x_value . "," . $x_value1 . "],";
                        break;
                    } else if (($x == 3) && ($x1 == 3)) {
                        $entry .= "['Mar'," . $x_value . "," . $x_value1 . "],";
                        break;
                    } else if (($x == 4) && ($x1 == 4)) {
                        $entry .= "['Apr'," . $x_value . "," . $x_value1 . "],";
                        break;
                    } else if (($x == 5) && ($x1 == 5)) {
                        $entry .= "['May'," . $x_value . "," . $x_value1 . "],";
                        break;
                    } else if (($x == 6) && ($x1 == 6)) {
                        $entry .= "['Jun'," . $x_value . "," . $x_value1 . "],";
                        break;
                    } else if (($x == 7) && ($x1 == 7)) {
                        $entry .= "['July'," . $x_value . "," . $x_value1 . "],";
                        break;
                    } else if (($x == 8) && ($x1 == 8)) {
                        $entry .= "['Aug'," . $x_value . "," . $x_value1 . "],";
                        break;
                    } else if (($x == 9) && ($x1 == 9)) {
                        $entry .= "['Sept'," . $x_value . "," . $x_value1 . "],";
                        break;
                    } else if (($x == 10) && ($x1 == 10)) {
                        $entry .= "['Oct'," . $x_value . "," . $x_value1 . "],";
                        break;
                    } else if (($x == 11) && ($x1 == 11)) {
                        $entry .= "['Nov'," . $x_value . "," . $x_value1 . "],";
                        break;
                    } else if (($x == 12) && ($x1 == 12)) {
                        $entry .= "['Dec'," . $x_value . "," . $x_value1 . "]";
                        break;
                    }
                }
            }

            return $entry;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}