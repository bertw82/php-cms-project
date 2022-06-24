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

      // pagination written with help from https://www.simplilearn.com/tutorials/php-tutorial/pagination-in-php#:~:text=Ajax%2Dbased%20method.-,What%20is%20Pagination%20in%20PHP%3F,the%20readability%20of%20the%20data.
      $limit = 2;
      $post_query_count = "SELECT * FROM posts";
      $find_count = mysqli_query($connection, $post_query_count);
      $total_rows = mysqli_num_rows($find_count);
      $total_pages = ceil($total_rows / $limit);
      // var_dump($count);

      if(!isset($_GET['page'])){
        $page = 1;
      } else {
        $page = $_GET['page'];  
      }

      $initial_page = ($page - 1) * $limit;

      // select posts for pagination
      $query = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $initial_page, $limit ";
      $select_all_posts_query = mysqli_query($connection, $query);
      confirm($select_all_posts_query);

      if(mysqli_num_rows($select_all_posts_query) === 0) {
        echo "<h1 class='text-center'>No Posts Available</h1>";
      } else {

      while($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'],0,100);
        $post_status = $row['post_status'];
        
      ?>

      <!-- Blog Post -->
      <h2>
          <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
      </h2>
      <p class="lead">
          by <a href="author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a>
      </p>
      <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
      <hr>
      <!-- display image from database, although in images folder -->
      <a href="post.php?p_id=<?php echo $post_id; ?>">
        <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
      </a>
      <hr>
      <p><?php echo $post_content ?></p>
      <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>

      <hr>
      
      <?php } } ?>

      <!-- pagination buttons -->
      <ul class="pager">
      
      <?php 
      
        for($i = 1; $i <= $total_pages; $i++){
          if($i == $page){
            echo "<li><a class='active-link' href='index.php?page={$i}'>{$i}</a></li>";
          } else {
            echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
          }
        }

      ?>

      </ul>

      </div> <!-- /.col-md-8 -->

      <!-- Blog Sidebar Widgets Column -->
      <?php include "includes/sidebar.php"; ?>
        
    </div><!-- /.row -->
    
  </div> <!-- /.container -->
  
  <hr>

<?php include "includes/footer.php"; ?>