<?php
/**
 * Created by PhpStorm.
 * User: Raghav Gupta
 * Date: 2018-07-27
 * Time: 12:44 PM
 */

session_start();
session_destroy();
header('Location: index.php');
