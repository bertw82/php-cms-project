<?php

  if(isset($_GET['user_id'])){
    $the_get_id = $_GET['user_id'];
  }
  $query = "SELECT * FROM users WHERE user_id = $the_get_id";
  $select_users_by_id_query = mysqli_query($connection, $query); 
  confirm($select_users_by_id_query);

  while($row = mysqli_fetch_assoc($select_users_by_id_query)) {
    $user_name = $row['user_name'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
    $user_image = $row['user_image'];
  }

  if(isset($_POST['update_user'])){
    
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];
    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($user_image_temp, "../images/$user_image");

    if(empty($user_image)){
      $query = "SELECT * FROM users WHERE user_id = $the_get_id ";
      $select_image = mysqli_query($connection, $query);
      while($row = mysqli_fetch_array($select_image)){
        $user_image = $row['user_image'];
      }
    }

    // one long concatenated query string
    $query = "UPDATE users SET ";
    $query .= "user_name = '{$user_name}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_image = '{$user_image}' ";
    $query .= "WHERE user_id = '{$the_get_id}' ";

    $update_user = mysqli_query($connection, $query); 
    confirm($update_user);
    header("Location: users.php");
  }
?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">First Name</label>
    <input value="<?php echo $user_firstname;?>" type="text" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input value="<?php echo $user_lastname;?>" type="text" class="form-control" name="user_lastname">
  </div>

  <div class="form-group">
  <label for="title">User Role</label>

    <select name="user_role" id="">
      <?php 

      echo "<option value='{$user_role}'>{$user_role}</option>";
      
      if($user_role == 'admin'){
        echo "<option value='subscriber'>subscriber</option>";
      } else {
        echo "<option value='admin'>admin</option>";

      }
     ?>

    </select>
  </div>

  <div class="form-group">
    <label for="title">User Image</label>
    <img width="100" src="../images/<?php echo $user_image; ?>" alt="">
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="title">Username</label>
    <input value="<?php echo $user_name;?>" type="text" class="form-control" name="user_name">
  </div>

  <div class="form-group">
    <label for="title">Email</label>
    <input value="<?php echo $user_email;?>" type="text" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="title">Password</label>
    <input value="<?php echo $user_password;?>" type="password" class="form-control" name="user_password">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_user" value="Edit User">
  </div>

</form>

