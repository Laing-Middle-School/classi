<?php include('auth-protect.php'); ?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
      
        <title>Staff</title>
      
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
      </head>
      
      <body>
      
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
          <div class="container">
            <a class="navbar-brand" href="index.php">classi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="comm-teachers.php">Teachers</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="comm-staff.php">Staff</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="comm-students.php">Students</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="comm-tech.php">Tech Help</a>
                </li>

                <li class="nav-item"><a class="nav-link"></a></li>
                <li class="nav-item"><a class="nav-link"></a></li>

                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
                </li>   <li class="nav-item">
                  <a class="nav-link" href="links.php">Links</a>
                </li>   <li class="nav-item">
                  <a class="nav-link" href="comm-teachers.php">Communications</a>

                </li>
              </ul>
            </div>
          </div>
        </nav>
      
        <!-- Page Content -->
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h1 class="mt-5">Staff Members!</h1>
              <p class="lead">The emails of all the staff members!</p>
              <ul class="list-unstyled">
              </ul>
            </div>
          </div>
        </div>
        <body style="text-align:center;">

          <!DOCTYPE html>
          <html>
          <head>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <style>
          * {
            box-sizing: border-box;
          }
           
          #myInput {
            background-image: url('/css/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
          }
           
          #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
          }
           
          #myTable th, #myTable td {
            text-align: left;
            padding: 12px;
          }
           
          #myTable tr {
            border-bottom: 1px solid #ddd;
          }
           
          #myTable tr.header, #myTable tr:hover {
            background-color: #f1f1f1;
          }
           
            #myOtherInput {
            background-image: url('/css/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
          }
           
          #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
          }
           
          #myTable th, #myTable td {
            text-align: left;
            padding: 12px;
          }
           
          #myTable tr {
            border-bottom: 1px solid #ddd;
          }
           
          #myTable tr.header, #myTable tr:hover {
            background-color: #f1f1f1;
          }
           
          #myOtherOtherInput {
            background-image: url('/css/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
          }
           
          #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
          }
           
          #myTable th, #myTable td {
            text-align: left;
            padding: 12px;
          }
           
          #myTable tr {
            border-bottom: 1px solid #ddd;
          }
           
          #myTable tr.header, #myTable tr:hover {
            background-color: #f1f1f1;
          }
          </style>
          </head>
          <body>
  
           
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by name" title="Type in a name">
          <input type="text" id="myOtherInput" onkeyup="myOtherFunction()" placeholder="Search by email" title="Type in a name">
          <input type="text" id="myOtherOtherInput" onkeyup="myOtherOtherFunction()" placeholder="Search by job" title="Type in a name">
           
          <table id="myTable">
            <tr class="header">
              <th style="width:60%;">Name</th>
              <th style="width:40%;">Email</th>
              <th style="width:40%;">job</th>
            </tr>
            <tr>
              <td>Wendy Anderson</td>
              <td>wendy_anderson@charleston.k12.sc.us</td>
              <td>Assistant Principle</td>
            </tr>
            <td>Jessica Campbell</td>
            <td>jessica_campbell@charleston.k12.sc.us</td>
            <td>Resource and inclusion teacher</td>
          </tr>
          <td>Myranda Brawley</td>
          <td>Myranda_Brawley@charleston.k12.sc.us</td>
          <td>Assistant Principle</td>
        </tr>
        <td>Carol Bourque</td>
        <td>carol_bourque@charleston.k12.sc.us</td>
        <td>Reasource and Inclusion</td>
      </tr>
      <td>Tamya Cross</td>
        <td>tanya_cross@charleston.k12.sc.us</td>
        <td>School Nurse</td>
      </tr>
      <td>Ingrid Davis</td>
        <td>Ingrid_Davis@charleston.k12.sc.us</td>
        <td>Reading Interventionist</td>
      </tr>
      <td>Jane Dawson</td>
        <td>jane_dawson@charleston.k12.sc.us</td>
        <td>Guidance</td>
      </tr>
      <td>Lisa Graham</td>
        <td>Lisa_Graham@Charleston.k12.SC.US</td>
        <td>Receptionist</td>
      </tr>
      <td>Kim Holmes</td>
        <td>kim_holmes@charleston.k12.sc.us</td>
        <td>School Secretary</td>
      </tr>
      <td>Vanessag gilliard</td>
        <td>Vanessag_gilliard@charleston.k12.sc.us</td>
        <td>Student Concern Specialist</td>
      </tr>
      <td>Roxanne Johnson</td>
        <td>Roxanne_Johnson@charleston.k12.sc.us</td>
        <td>Bookkeeper</td>
      </tr>
      <td>Jessica King</td>
        <td>JESSICA_KING@charleston.k12.sc.us</td>
        <td>Guidance</td>
      </tr>
      <td>Carrie Knotts</td>
        <td>carrie_knotts@charleston.k12.sc.us</td>
        <td>Assistant Principle</td>
      </tr>
      <td>Jared Morgan</td>
        <td>Jared_Morgan@charleston.k12.sc.us</td>
        <td>Special Education</td>
      </tr>
      <td>Jennifer Phillips</td>
        <td>jennifer_phillips@charleston.k12.sc.us</td>
        <td>Library / Media Center Clerk</td>
      </tr>
      <td>Gloria Pitts</td>
        <td>gloria_pitts@charleston.k12.sc.us</td>
        <td>Lead School Nurse</td>
      </tr>
      <td>Crystal Rayzer</td>
        <td>Crystal_Rayzer@charleston.k12.sc.us</td>
        <td>Teacher Coach</td>
      </tr>
      <td>Anna Rennison</td>
        <td>anna_rennison@charleston.k12.sc.us</td>
        <td>School Psychologist</td>
      </tr>
      <td>Jennifer Robinovitz</td>
        <td>Jennifer_Robinovitz@charleston.k12.sc.us</td>
        <td>Reasource And Inclusion</td>
      </tr>
      <td>Annabel Schizas</td>
        <td>Annabel_Schizas@Charleston.k12.sc.us</td>
        <td>Guidance</td>
      </tr>

      <td>Gina Sott</td>
        <td>gina_scott@charleston.k12.sc.us</td>
        <td>Teacher / Librarian</td>
      </tr>
      <td>Annette Saebrook</td>
        <td>Annette_Seabrook@charleston.k12.sc.us</td>
        <td>Registrar</td>
      </tr>
      <td>Jacquelyn Snipe</td>
        <td>jacquelyn_snipe@charleston.k12.sc.us</td>
        <td>Day Porter</td>
      </tr>

      <td>Stephanie Thomas</td>
        <td>STEPHANIE_THOMAS@charleston.k12.sc.us</td>
        <td>Receptionist</td>
      </tr>
      <td>Chris Thompson</td>
        <td>chris_thompson@charleston.k12.sc.us</td>
        <td>Lead Day Porter</td>
      </tr>
      <td>Megan Thornton</td>
        <td>megan_thornton@charleston.k12.sc.us</td>
        <td>Guidance</td>
      </tr>
      <td>Gayle Washington</td>
        <td>Gayle_Washington@charleston.k12.sc.us</td>
        <td>BIR And ISS</td>
      </tr>

      <td>James Whitehair</td>
        <td>James_Whitehair@charleston.k12.sc.us</td>
        <td>Principle</td>
      </tr>

      <var><td></td>
        <td></td>
        <td></td>
      </tr></var>


          </table>
           
          <script>
          function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[0];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              }       
            }
          }
           
          function myOtherFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myOtherInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[1];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              }       
            }
          }
           
          function myOtherOtherFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myOtherOtherInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[2];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              }       
            }
          }
          </script>
           
          </body>
  

    
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.slim.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      
      </body>
      
      </html>
