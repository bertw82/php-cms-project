<?php include "includes/admin_header.php" ?>

<?php 

if(isset($_SESSION['user_name'])){
  // display profile of the user
  $user_name = $_SESSION['user_name'];
  $query = "SELECT * FROM users WHERE user_name = '{$user_name}' ";
  $select_user_profile_query = mysqli_query($connection, $query);
  confirm($select_user_profile_query);

  while($row = mysqli_fetch_array($select_user_profile_query)){
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
  }
}

?>

<?php 
// edit profile
if(isset($_POST['update_profile'])){
  $user_name = escape($_POST['user_name']);
  $user_password = escape($_POST['user_password']);
  $user_firstname = escape($_POST['user_firstname']);
  $user_lastname = escape($_POST['user_lastname']);
  $user_role = escape($_POST['user_role']);
  $user_email = escape($_POST['user_email']);
  $user_image = escape($_FILES['image']['name']);
  $user_image_temp = escape($_FILES['image']['tmp_name']);

  move_uploaded_file($user_image_temp, "../images/$user_image");

  if(empty($user_image)){
    $query = "SELECT * FROM users WHERE user_name = '{$user_name}' ";
    $select_image = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_image)){
      $user_image = $row['user_image'];
    }
  }

  // check for new password
  if(!empty($_POST['user_password'])){
    $password = escape($_POST['user_password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE users SET ";
    $query .= "user_name = '{$user_name}', ";
    $query .= "user_password = '{$hashed_password}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_image = '{$user_image}' ";
    $query .= "WHERE user_name = '{$user_name}' ";

    $update_user = mysqli_query($connection, $query); 
    confirm($update_user);
    header("Location: users.php");

  } else {

    $query = "UPDATE users SET ";
    $query .= "user_name = '{$user_name}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_image = '{$user_image}' ";
    $query .= "WHERE user_name = '{$user_name}' ";
  
    $update_user = mysqli_query($connection, $query); 
    confirm($update_user);
    header("Location: users.php");
  }
}
?>

<body>

  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      
      <?php include "includes/admin_main_nav.php" ?> 

      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      
      <?php include "includes/admin_sidebar.php" ?>

      <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
                Admin Panel
              <small>Bert Witzel</small>
            </h1>
            
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
    <label for="title">Add New Password or Leave Blank</label>
    <input value="" type="password" class="form-control" name="user_password">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
  </div>

</form>

          </div>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

  <?php include "includes/admin_footer.php" ?>