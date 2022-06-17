<?php 
  // create new user
  if(isset($_POST['create_user'])){
    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);
    $username = escape($_POST['username']);
    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);
    move_uploaded_file($user_image_temp, "../images/$user_image");
    // make user subscriber by default
    if($user_role == ''){
      $user_role = 'subscriber';
    }

    $query = "INSERT INTO users(user_name,user_password,user_firstname,user_lastname,user_role,user_email,user_image) ";

    $query .= "VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_role}','{$user_email}', '{$user_image}')";

    $create_user_query = mysqli_query($connection, $query);

    confirm($create_user_query);
    header("Location: users.php");
  }

?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">First Name</label>
    <input type="text" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" class="form-control" name="user_lastname">
  </div>

  <div class="form-group">
    <label for="title">User Role</label>
    <select name="user_role" id="">
      <option value="select_options" disabled selected>Select Options</option>
      <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option>
    </select>
  </div>

  <div class="form-group">
    <label for="title">User Image</label>
    <input type="file" class="form-control" name="image">
  </div>

  <div class="form-group">
    <label for="title">Username</label>
    <input type="text" class="form-control" name="username">
  </div>

  <div class="form-group">
    <label for="title">Email</label>
    <input type="text" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="title">Password</label>
    <input type="password" class="form-control" name="user_password">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
  </div>

</form>