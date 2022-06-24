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
                Welcome to Admin
                <small><?php echo $_SESSION['user_name']; ?></small>
            </h1>
          </div>
        </div>
        <!-- /.row -->

        <?php include "includes/widget_chart.php" ?>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->
  <script src="js/loader.js"></script>

  <?php include "includes/admin_footer.php" ?>
