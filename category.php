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

        if(isset($_GET['category'])){
          $post_category_id = escape($_GET['category']);
        }

          $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id";
          $select_all_posts_query = mysqli_query($connection, $query);

          if(mysqli_num_rows($select_all_posts_query) === 0) {
            echo "<h1 class='text-center'>No Posts Available</h1>";
          } 

          while($row = mysqli_fetch_assoc($select_all_posts_query)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'],0,100);

            $post_tags = $row['post_tags'];
          
            ?>

            <!-- First Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
            <hr>
            <!-- display image from database, although in images folder -->
            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
            <hr>
            <p><?php echo $post_content ?></p>
            <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
           
          <?php }  ?>

      </div> <!-- /.col-md-8 -->

      <!-- Blog Sidebar Widgets Column -->
      <?php include "includes/sidebar.php"; ?>
        
    </div><!-- /.row -->
    
  </div> <!-- /.container -->
  
  <hr>

<?php include "includes/footer.php"; ?>