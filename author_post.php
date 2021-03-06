<!-- Header -->
<?php include "includes/header.php"; ?>
<!-- Database  -->
<?php include "includes/db.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

      <?php

      if(isset($_GET['p_id'])){
        $the_post_id = escape($_GET['p_id']);
        $the_post_author = escape($_GET['author']);

      }

        $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' ";
        $select_all_posts_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];
          $post_content = $row['post_content'];
          $post_tags = $row['post_tags'];
          
          ?>

          <!-- First Blog Post -->
          <h1>All posts by <?php echo $post_author ?></h1>
          <h2>
              <a href="#"><?php echo $post_title ?></a>
          </h2>
          <p class="lead">
              by <?php echo $post_author ?>
          </p>
          <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
          <hr>
          <!-- display image from database, although in images folder -->
          <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
          <hr>
          <p><?php echo $post_content ?></p>

          <hr>
        
      <?php } ?>

      </div>

      <!-- Blog Sidebar Widgets Column -->
      <?php include "includes/sidebar.php"; ?>
        

    </div>
      <!-- /.row -->
    </div>
        <hr>

     <?php include "includes/footer.php"; ?>