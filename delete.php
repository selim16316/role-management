<?php


// on clicking Delete Role button.
$users = json_decode(file_get_contents('data.json'), true);
if (isset($_POST['delete'])) {
  $_SESSION['usernewemail'] = $_POST['email'];

  $user_email = $_SESSION['usernewemail'];



  if (isset($users[$user_email])) {
    $users[$user_email]['role'] = "";
    file_put_contents('data.json', json_encode($users, JSON_PRETTY_PRINT));

    header("location: admin.php");
  } else {
    echo "email not found";
  }
}

// on clicking Delete user button

$userFile = json_decode(file_get_contents('data.json'), true);
if (isset($_POST['deleteuser'])) {
  $_SESSION['userDeleteemail'] = $_POST['email'];

  $userEmail = $_SESSION['userDeleteemail'];



  if (isset($users[$userEmail])) {
   unset($users[$userEmail]);

    file_put_contents('data.json', json_encode($users, JSON_PRETTY_PRINT));

    header("location: admin.php");
  } else {
    echo "email not found";
  }
}
