<?php
session_start();

if(!isset($_SESSION['email']))
{
  header('location: login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <section>
    <div class="container og">
      <div class="row justify-content-center align-items-center">
        <div class="col-8">
          <div class="table1">

            <h1 class="my-3">A Role Management Project</h1>
            <p>Welcome, <?php echo (isset($_SESSION['email'])) ?  $_SESSION['email'] : 'GUEST'  ?></p>
            <div class="d-flex justify-content-between">
              <div>
                <!-- <a href="">All Students</a> -->
                <!-- <span> | </span> -->
                <a href="registration.php"> <button class="btn btn-primary btn-sm"> Add new User</button> </a>
              </div>

              <!-- Display login and Logout button based on Session -->
              <div>
                <?php
                if (!isset($_SESSION['email']))
                  echo '<a href="login.php"><button class="btn btn-primary btn-sm">Login</button></a>';
                else
                  echo '<a href="logout.php"><button class="btn btn-primary btn-sm">Logout</button></a>';
                ?>
              </div>
            </div>

            <hr>
            <?php


            ?>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Serial</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  
                  <th scope="col">Role</th>
                 
                </tr>
              </thead>
              <tbody>
                <!-- Show details table -->
                <?php
                $c = 0;
                $file = 'data.json';
                $data =  json_decode(file_get_contents($file), true);
                foreach ($data as $key => $value) :
                  // echo $key;
                  // echo $value['username'];
                  $c = $c + 1;
                ?>
                  <tr>

                    <th scope="row"> <?php echo $c ?>
                    </th>
                    <td><?php echo $value['username'] ?></td>
                    <td><?php echo $key  ?></td>
                    
                    <td><?php echo $value['role'] ?></td>


                  


                  <?php endforeach ?>



                  </tr>

                  <!-- <br> -->

              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

  </section>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


</html>