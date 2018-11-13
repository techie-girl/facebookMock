<!-- Code by Sandeep Kaur B00786324 -->
<?php
session_start();
if (empty($_SESSION['username'])) {
    header('Location: index.php');
}
include "includes/database.php";
if (isset($_POST['button'])) {
    $email = $_POST['email'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

//$query = $conn->prepare("SELECT * FROM project.user_table WHERE email = :email");
//$query->execute(array(':email' => $email));
//$query2 = $query->fetch(PDO::FETCH_ASSOC);

    $query = $conn->prepare("SELECT * FROM user_table WHERE email=:email  AND password= :password");
    $query->execute(array(':email' => $email, 'password' => $oldPassword));
    $query2 = $query->fetch(PDO::FETCH_ASSOC);

    if ($query2 != true) {
        echo '<script type="text/javascript"> alert("you entered an incorrect password!")</script>';
    } else if ($newPassword == $confirmPassword)
        $query1 = $conn->prepare("UPDATE user_table SET password='$newPassword' where email=:email");

    $query1->bindParam(':email', $email);

    $query1->execute();


//        echo 'inside pasword';
    $query1->execute();
    if ($query) {
        echo '<script type="text/javascript"> alert("you have successfully changed your password!")</script>';
    } else {
        echo '<script type="text/javascript"> alert("passwords do not match!")</script>';
    }
}
?>
<!--  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>BUDGETit</title>
    <?php include "includes/header.php" ?>


</head>
<body>

<!-- Nav Bar -->
<?php include "includes/navbar.php" ?>
<!-- Code by Sowmya Umesh B00788667 -->
<?php
require_once('./includes/connection.php');
require './includes/addExpenseOp.php';
$con = new DatabaseConnection();
$dbcon = $con->connect();
$db = new addExpenseOp();
$user_id = $db->getUser_id($_SESSION['username'], $dbcon);
$stmt = $dbcon->prepare("select first_name, last_name, email from user_table where user_id=?");
$stmt->execute([$user_id]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$firstname = $lastname = $email = "";
foreach ($rows as $row) {
    $firstname = $row["first_name"];
    $lastname = $row["last_name"];
    $email = $row["email"];
}
?>


<!--  <div id="header"></div><br/>-->
<div role="main" class="container-fluid" style="max-width:100%;">

    <div class="card" style="width: 50%;" id="containercenter">
        <img src="./includes/assets/images/Profileicon.png" class="w3-circle" alt="Alps"
             style="max-width:40%; max-height:40%;">
        <div class="card-body">
            <h4 class="card-title" style="font-family: serif;"><b> Profile Details </b></h4>
            <table>
                <tr>
                    <td>
                        <p style="font-family: serif; font-size: 1em;" class="card-text"> First
                            Name: <?php echo $firstname; ?></p>

                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="font-family: serif; font-size: 1em;" class="card-text"> Last
                            Name: <?php echo $lastname; ?></p>

                    </td>
                </tr>

                <tr>
                    <td>
                        <p style="font-family: serif; font-size: 1em;" class="card-text"> Email
                            ID: <?php echo $email; ?></p>

                    </td>
                </tr>

            </table>
            <button type="button" style="font-family: serif; font-size: 1.2em; background-color:#0E2658;" id="mybutton" data-toggle="modal"
                    data-target="#exampleModal" class="btn btn-primary" >Change Password
            </button>


            <a style="font-family: serif; font-size: 1.2em; color:#0E2658;" href="#"> Contact Us</a>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:#0E2658;"> Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="viewProfile.php">
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="email">E mail</label>
                        <div class="col-xs-9">
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="Enter your email">
                        </div>
                        <label class="control-label col-xs-3" for="oldPassword">Old Password</label>
                        <div class="col-xs-9">
                            <input type="password" class="form-control" name="oldPassword" id="oldPassword"
                                   placeholder="Enter Old Password">
                        </div>
                        <label class="control-label col-xs-3" for="newPassword">New Password</label>
                        <div class="col-xs-9">
                            <input type="password" class="form-control" name="newPassword" id="newPassword"
                                   placeholder="Enter New Password">
                        </div>
                        <label class="control-label col-xs-3" for="confirmPassword">Confirm Password</label>
                        <div class="col-xs-9">
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"
                                   placeholder="Confirm new Password">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" style="background-color:#0E2658;" data-dismiss="modal">Close</button>
                        <input name="button" type="submit" id="signup" class="btn btn-primary" style="background-color:#0E2658;" value="Change Password"/>
                        <!--        <input type="button" class="btn btn-primary"> Change Password</input>-->
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!--<div class="modal fade" id="ContactusModal" tabindex="-1" role="dialog" aria-labelledby="ContactusModalLabel"-->
<!--     aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="ContactusModal"> Contact us</h5>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <div class="form-group">-->
<!--                    <label class="control-label col-xs-3" for="oldPassword">Old Password</label>-->
<!--                    <div class="col-xs-9">-->
<!--                        <input type="password" class="form-control" name="oldPassword" id="oldPassword"-->
<!--                               placeholder="Enter Old Password">-->
<!--                    </div>-->
<!--                    <label class="control-label col-xs-3" for="oldPassword">Old Password</label>-->
<!--                    <div class="col-xs-9">-->
<!--                        <input type="password" class="form-control" name="oldPassword" id="oldPassword"-->
<!--                               placeholder="Enter Old Password">-->
<!--                    </div>-->
<!--                    <label class="control-label col-xs-3" for="newPassword">New Password</label>-->
<!--                    <div class="col-xs-9">-->
<!--                        <input type="password" class="form-control" name="newPassword" id="newPassword"-->
<!--                               placeholder="Enter New Password">-->
<!--                    </div>-->
<!--                    <label class="control-label col-xs-3" for="confirmPassword">Confirm Password</label>-->
<!--                    <div class="col-xs-9">-->
<!--                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"-->
<!--                               placeholder="Confirm new Password">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                    <button type="button" class="btn btn-primary"> Change Password</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
</body>
</html>
