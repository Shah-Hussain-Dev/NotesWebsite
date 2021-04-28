<?php
include "dbcon.php";
include "links.php";
if(isset($_POST['submit'])){
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $book_category = $_POST['book_Category'];
    $sql = "INSERT INTO book_tb( Bookname, Bookcat) VALUES ('$book_name','$book_category')";
    $query=mysqli_query($con,$sql);
    
    if($query){
        $passmsg ='<div class="alert alert-danger col-sm-6 mt-2" role="alert">Unable to  Update  Username</div>';
        header('Location:index.php');
    }else{
        echo"data not inserted"+mysqli_connect_erro($query);

    }
   
}






?>