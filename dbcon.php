<?php
session_start();
$con = mysqli_connect("localhost","root","","book");
if(!$con){
    echo"Not Connected ";
}
