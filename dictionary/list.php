<?php
//connect to the db
include('connectToDB.php');
//include('db.php');

?>

<!doctype html>
<!--<html lang="en">-->

<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="google-site-verification" content="3o4W0vs9pg02K1ISOa_QZ5dntbMjmDvmB61cUln4I0M" />

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6391606990216604"
     crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- font awsome-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
     
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
 
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <!-- Bootstrap Css -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  
 

</head>

<body>

  <?php
  include('navbar.php');
  ?>
  <div class="vector" style="transform: scaleX(-1) rotate(180deg); background-size : 32%; "></div>
  <div class="container p-5 mb-5">
    <div class="row justify-content-center ">
      <div class="list">

        <ul>
          <li><a href="list.php?letter=a">A</a></li>
          <li><a href="list.php?letter=b">B</a></li>
          <li><a href="list.php?letter=c">C</a></li>
          <li><a href="list.php?letter=d">D</a></li>
          <li><a href="list.php?letter=e">E</a></li>
          <li><a href="list.php?letter=f">F</a></li>
          <li><a href="list.php?letter=g">G</a></li>
          <li><a href="list.php?letter=h">H</a></li>
          <li><a href="list.php?letter=i">I</a></li>
          <li><a href="list.php?letter=j">J</a></li>
          <li><a href="list.php?letter=k">K</a></li>
          <li><a href="list.php?letter=l">L</a></li>

          <li><a href="list.php?letter=m">M</a></li>
          <li><a href="list.php?letter=n">N</a></li>
       
        </ul>
        <ul>
           <li><a href="list.php?letter=o">O</a></li>
          <li><a href="list.php?letter=p">P</a></li>
          <li><a href="list.php?letter=q">Q</a></li>
          <li><a href="list.php?letter=r">R</a></li>
          <li><a href="list.php?letter=s">S</a></li>
          <li><a href="list.php?letter=t">T</a></li>
          <li><a href="list.php?letter=u">U</a></li>
          <li><a href="list.php?letter=v">V</a></li>
          <li><a href="list.php?letter=w">W</a></li>
          <li><a href="list.php?letter=x">X</a></li>
          <li><a href="list.php?letter=y">Y</a></li>
          <li><a href="list.php?letter=z">Z</a></li>
        </ul>
      </div>
    </div>

    <div class="row mt-5">

      <?php


      if (isset($_GET['letter'])) {
        $letter = $_GET['letter'];
      }

      if (!isset($_GET['page'])) {
        $page = 1;
      } else {
        $page = $_GET['page'];
      }
      
      
      
//       {
// $db = new PDO('mysql:host=wordpressdb-x.hosting.stackcp.net;dbname=SCWORDPRESS-32313622ed', 'SCWORDPRESS-32313622ed', 'f25126576b21',
//               array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// }
      

	  if (isset($_GET['letter'])) {
	   $conn = mysqli_connect('wordpressdb-x.hosting.stackcp.net', 'SCWORDPRESS-32313622ed', 'f25126576b21', 'SCWORDPRESS-32313622ed');
              //  $conn = mysqli_connect('localhost', 'root', '', 'db_dictionary');

//mysqli_set_charset($conn,"utf8mb4");
        // if (!$conn) {
        //   die("Connection failed" . mysqli_connect_error());
        // } else {
        //   // print("hi");
      
        // }
        //******************* */
      
        //define total number of results you want per page  
        $results_per_page = 250;

        $word = ($_GET['letter'] . '%');

        //$word = '$word';
      
        // print($word);
        //find the total number of results stored in the database  
        $query = "select word from dictionary where word like '{$word}%'";


        $result = mysqli_query($conn, $query);

        $number_of_result = mysqli_num_rows($result);

        //print($number_of_result);
        //determine the total number of pages available  
        $number_of_page = ceil($number_of_result / $results_per_page);
      // print($number_of_page);
        //determine which page number visitor is currently on  
      

        //determine the sql LIMIT starting number for the results on the displaying page  
        $page_first_result = ($page - 1) * $results_per_page;


        //  print($page_first_result);
        //******************* */
      




        $req = $db->prepare("select word from dictionary where word like ? ORDER BY word LIMIT " . $page_first_result . ',' . $results_per_page);

        // print($req);
      


        //   //$number_of_result = mysqli_num_rows($req->fetch()); 
      
        //   $number_of_result = $req->fetchAll(); 
        //  // $number_of_page = ceil ($number_of_result / $results_per_page);  
        //  print count($number_of_result);
        // print($number_of_page);
      
        $req->execute(array($_GET['letter'] . '%'));







        while ($data = $req->fetch()) {
       
        	

          echo
            " <div class='col-md-2 my-2 text-capitalize terms '>
           
			<a href=list.php?word=" . urlencode($data['word']) . ">" . $data['word'] . "</a>
            </div>";
        }



        $req->closeCursor();
      } else if (isset($_GET['word'])) {
        $req = $db->prepare("select * from dictionary where word = ?");
        $req->execute(array($_GET['word']));

        $data = $req->fetch();
        echo "<div class='col-md-7 mx-auto'>";
        echo "<h1 class='text-capitalize'>" . $data['word'] . "</h1>";
        echo "<hr>";

        echo "<h3 class='text-capitalize'> <strong>" . $data['word'] . "</strong></h3>";

        echo "<h4>" . $data['meaning'] . "<h4>";
        //print($data['meaning']);
        echo "</div>";
      }

      ?>


    </div>


    <div class="table-responsive">
      <div class="row justify-content-center ">
        <div class="list col-md-10 " >
        <nav aria-label="Page navigation example">
          <ul class="pagination pagination-lg">


            <?php

            //if(isset)
            


        //  echo($number_of_page);

           

            //display the link of the pages in URL  
            for ($page = 1; $page <= $number_of_page; $page++) {

              if ($page == 15) {
                //echo "<br>";
                echo '<div  class=row  ></div>';

              }
                echo '<li><a  href = "list.php?page=' . $page . '&letter=' . $letter . '">' . $page . ' </a></li>';
              
            };


            



            ?>

            <ul />
            </nav>


        </div>
      </div>

    </div>


  </div>
  <!-- Footer -->
  <footer>
    <div class=" py-1"> Copyright © 2023 </div>
  </footer>



  <!-- Optional JavaScript -->
  <script src="app.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>