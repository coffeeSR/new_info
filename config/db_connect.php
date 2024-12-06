<?php 
    //connect to db
    $conn = mysqli_connect('localhost', 'shakti', "test1234", 'new_project');

    //check error
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }
    ?>