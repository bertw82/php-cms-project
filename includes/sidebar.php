<div class="col-md-4 sidebar">
  <!-- Login -->
  <div class="well" id="loginDiv">
    
    <?php if(isset($_SESSION['user_role'])): ?>
      
    <h4>Logged in as <?php echo $_SESSION['user_name']; ?></h4>
    <a href="includes/logout.php" class="btn btn-primary">Log Out</a>

    <?php else: ?>

    <h4>Login or <a href="registration.php">Sign Up</a></h4>
    <form action="includes/login.php" method="post">
    <div class="form-group">
        <input name="username" type="text" class="form-control" placeholder="Enter Username">
    </div>
    <div class="form-group">
        <input name="password" type="password" class="form-control" placeholder="Enter Password">
    </div>
    <div class="form">
          <button class="btn btn-primary" name="login" type="submit">Submit</button>
        </div>
    </form>
    <!-- /.input-group -->

    <?php endif; ?>

  </div>

  <?php            
  $query = "SELECT * FROM categories";
  $select_categories_sidebar = mysqli_query($connection, $query);
  ?>

  <!-- Blog Categories Well -->
  <div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
      <div class="col-lg-12">
        <ul class="list-unstyled">

  <?php

  while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];

          
    echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
  }
      
  ?>

        </ul>
      </div>
    </div>
  <!-- /.row -->
</div>

    <!-- Side Widget Well -->
    <!-- <?php include "widget.php" ?> -->

</div>