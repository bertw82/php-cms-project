<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Image</th>
      <th>Role</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>

  <?php 
    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query); 
    confirm($select_users);

    while($row = mysqli_fetch_assoc($select_users)) {
      $user_id = $row['user_id'];
      $user_name = $row['user_name'];
      $user_password = $row['user_password'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $user_image = $row['user_image'];
      $user_role = $row['user_role'];

      
      echo "<tr>";      
      echo "<td>{$user_id}</td>";
      echo "<td>{$user_name}</td>";
      echo "<td>{$user_firstname}</td>";
      echo "<td>{$user_lastname}</td>";
      echo "<td>{$user_email}</td>";
      echo "<td><img style='width:100px'; src='../images/$user_image' alt='image'></td>";
      echo "<td>{$user_role}</td>";
      echo "<td><a href='users.php?source=edit_user&user_id={$user_id}'>Edit</a></td>";
      echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
      echo "</tr>";
    }
  ?>
  </tbody>
</table>

<?php 

  // delete user
  if(isset($_GET['delete'])){
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_user_query = mysqli_query($connection, $query);
    confirm($delete_user_query);
    header("Location: users.php"); //reload the query
  }

?>