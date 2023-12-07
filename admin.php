<?php
session_start();

require "delete.php";

if (!isset($_SESSION['email'])) {
  header("location: index.php");
}

// on succesful clicking of Edit button
if (isset($_POST['edit'])) {
  $_SESSION['useremail'] = $_POST['email'];

  header("location: edit.php");
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Crew Project</title>
  <!-- boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <section>
    <div class="container og">
      <div class="row justify-content-center align-items-center">
        <div class="col-9">
          <div class="table1">

            <h1 class="my-3 text-center">Role Management System</h1>
            <p>Welcome, <?php echo (isset($_SESSION['email'])) ?  $_SESSION['email'] : 'GUEST'  ?></p>


            <hr>
            <?php


            ?>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Serial</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               
                <?php
                $c = 0;
                $file = 'data.json';
                $data =  json_decode(file_get_contents($file), true);
                foreach ($data as $key => $value) :

                  $c = $c + 1;
                ?>
                  <tr>

                    <th scope="row"> <?php echo $c ?>
                    </th>
                    <td><?php echo $value['username'] ?></td>
                    <td><?php echo $key  ?></td>
                    <td><?php echo $value['password']  ?></td>
                    <td><?php echo $value['role'] ?></td>


                    <form action="admin.php" method="post">
                      <input type="hidden" name="email" value="<?php echo $key;  ?>">
                      <td>

                        <?php
                        if ($key === "admin@admin.com") {
                          
                          echo "SUPER ADMIN";
                        } else {
                          
                          echo '<button class="btn btn-sm btn-primary edit mx-1" name="edit">Update</button>';
                          echo '<button class="btn btn-sm btn-danger mx-2" name="delete" type="submit">Delete Role</button>';
                          echo '<button class="btn btn-sm btn-warning mx-2" name="deleteuser" type="submit">Delete User</button>';
                        }
                        ?>



                      </td>
                    </form>


                  <?php endforeach ?>



                  </tr>

                  <!-- <br> -->

              </tbody>
            </table>

            <div class="d-flex justify-content-between">
              <div>

                <a href="registration.php"> <button class="btn btn-primary btn-sm"> Add User</button> </a>
              </div>

              <div>
                <?php
                if (!isset($_SESSION['email']))
                  echo '<a href="login.php"><button class="btn btn-primary btn-sm">Login</button></a>';
                else
                  echo '<a href="logout.php"><button class="btn btn-primary btn-sm">Logout</button></a>';
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


</html>