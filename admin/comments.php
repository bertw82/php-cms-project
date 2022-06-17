<?php include "includes/admin_header.php" ?>

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
            
            <?php 
            if(isset($_GET['source'])){
              $source = $_GET['source'];
            } else {
              $source = '';
            }

            switch($source) {
              case 'add_post';
              include "includes/add_post.php";
              break;

              case 'edit_post';
              include "includes/edit_post.php";
              break;

              case 'post_comments';
              include "includes/post_comments.php";
              break;

              case 'approve';
              include "includes/post_comments.php";
              break;

              case 'decline';
              include "includes/post_comments.php";
              break;

              case 'delete';
              include "includes/post_comments.php";
              break;
              
              // display all the time unless meeting cases above
              default: 
              include "includes/view_all_comments.php";
              break;
            }


            ?>

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