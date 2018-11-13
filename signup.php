<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>BUDGETit</title>
    <?php include "includes/header.php" ?>


</head>
<body>

<!-- Nav Bar -->
<?php include "includes/navbar.php" ?>

<!--<div id="header"></div><br/>-->
<div class="container-fluid">
    <div class="card bg-dark text-white">
        <!--        <img class="card-img" style="-webkit-filter: blur(3px); filter: blur(3px);" src="./images/splitBg.jpg" alt="Card image cap">-->
        <div class="card-img-overlay">
            <div class="container-fluid">
                <div class="card" style="max-width: 40%; color:#0E2658; opacity: 0.8; padding:10px" id="containercenter">
                    <h4><b>Signup</b></h4>
                    <div class="card-body" style="max-width: 100%;" >
                        <form class="form" action="signup.php" method="post">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" id="firstname"
                                       placeholder="First Name" required/>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" id="lastname"
                                       placeholder="Last Name" required pattern="^[a-zA-Z]*|[a-zA-Z]*[ |-][a-zA-Z]*"/>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                       placeholder="Enter email" required/>
                            </div>
                            <div class="form-group">
                                <label>Passface</label>

                                <?php

                              echo '<input type="hidden" name="selected_image" value="" />';
                                echo '<script>$("img[data-picture_id]").click(function(e){
  $("input[name=\'selected_image\']").val($(this).data(\'picture_id\'));
});</script>';



                                $files = glob("includes/images/*.*");
                                for ($i=1; $i<count($files); $i++)
                                {

                                    $num = $files[$i];
                                    $a= explode('/', $num);
                                    $b = explode('.',$a[2]);
                                    echo '<img src="'.$num.'"data-picture_id="'.$b[0].'" alt="random image">'."&nbsp;&nbsp;";
                                }
                                ?>

                            </div>
<!--                            <div class="form-group">-->
<!--                                <label>Password</label>-->
<!--                                <input type="password" name="password" class="form-control" id="password"-->
<!--                                       placeholder="Password" required/>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label>Confirm Password</label>-->
<!--                                <input type="password" name="cpassword" class="form-control" id="cpassword"-->
<!--                                       placeholder="Confirm Password" required/>-->
<!--                            </div>-->

                            <input name="button" type="submit" id="signup" value="SIGNUP"/>
                            <!--                            <button type="submit" class="btn btn-primary">SIGNUP</button>-->
                            <!--                            <button type="button" class="btn btn-primary" onClick="location.href = 'index.php';">BACK TO HOME</button>-->
                        </form>
                        <!--code added by Sandeep Kaur B00786324-->
                        <?php
                        include "includes/database.php";

                        if (isset($_POST['button'])) {
//                        echo '<script type="text/javascript"> alert("signup button clicked")</script>';

                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $confirm = $_POST['cpassword'];
                            $phoneno = $_POST['phoneno'];
                            $userid = NULL;
                            if ($password == $confirm) {

//                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//                            // set the PDO error mode to exception
//                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $query = $conn->prepare("SELECT * FROM project.user_table WHERE email = :email");
                                $query->execute(array(':email' => $email));
                                $query2 = $query->fetch(PDO::FETCH_ASSOC);


                                if ($query2 == true) {
                                    echo '<script type="text/javascript"> alert("email already registered, try another email")</script>';
                                } else {

                                    try {

                                        $query3 = $conn->prepare("INSERT INTO user_table (user_id,first_name,last_name, email,password, phone_no)
    VALUES (:userid,:firstname,:lastname, :email,:password, :phoneno)");
//                $query3->bindParam(':id', $id);
                                        $query3->bindParam(':userid', $userid);
                                        $query3->bindParam(':email', $email);
                                        $query3->bindParam(':password', $password);
                                        $query3->bindParam(':firstname', $firstname);
                                        $query3->bindParam(':lastname', $lastname);
                                        $query3->bindParam(':phoneno', $phoneno);


                                        $query3->execute();


                                        echo '<script type="text/javascript"> alert("user registered successfully")</script>';
                                    } catch (PDOException $e) {
                                        echo "Error: " . $e->getMessage();
                                        echo '<script type="text/javascript"> alert("error inserting the data!")</script>';
                                    }

                                }
                            } else {
                                echo '<script type="text/javascript"> alert("passwords mismatch!")</script>';
                            }

                            }
                        ?>
                        <!-- -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function myFunction() {
        document.getElementById("inputEmail").multiple = true;
        var email = document.getElementById("inputEmail").value;
        var amount = document.getElementById("amount").value;
        if (email.length == 0) {
            alert('Please enter Email ID');
            return false;
        }
        if (amount.length == 0) {
            alert('Amount Can not be empty');
            return false;
        }
        return true;
        document.getElementById("demo").innerHTML = "The email field now accept multiple values.";

    }


</script>
</body>
</html>
