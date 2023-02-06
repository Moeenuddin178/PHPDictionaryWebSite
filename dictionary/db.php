<?php

        $conn = mysqli_connect('wordpressdb-x.hosting.stackcp.net', 'SCWORDPRESS-32313622ed', 'f25126576b21', 'SCWORDPRESS-32313622ed');
              //  $conn = mysqli_connect('localhost', 'root', '', 'db_dictionary');

//mysqli_set_charset($conn,"utf8mb4");
        if (!$conn) {
          die("Connection failed" . mysqli_connect_error());
        } else {
          // print("hi");
      
        }
        
        ?>