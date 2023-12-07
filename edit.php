<?php

session_start();

$users = json_decode(file_get_contents('data.json'), true);


if (isset($_POST['update'])) {
  $user_email = $_SESSION['useremail'];
  $new_role   = $_POST['role'];

  if (isset($users[$user_email])) {
    $users[$user_email]['role'] = $new_role;
    file_put_contents('data.json', json_encode($users, JSON_PRETTY_PRINT));

    header("location: admin.php");
  } else {
    echo "email not found";
  }
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
  <section class=" " id="custom-edit">

    <div class=" p-5 rounded" style="background-color:bisque">
      <h3 class="text-center ">Edit User for </h3>
      <h5 class="text-center p-3"><?php echo $_SESSION['useremail']  ?></h5>

      <form class="form" method="post">
        <div class="form-outline mb-4">


          <div class="form-outline mb-4">
            <input type="text" name="role" id="form3Example3cg" class="form-control form-control-lg" placeholder="Role " required />

          </div>
        </div>

        <div class="d-flex justify-content-center my-2">
          <button type="submit" name="update" class="btn btn-md btn-primary ">Update Profile</button>
        </div>




      </form>
    </div>


  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>