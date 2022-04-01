<?php include "includes/header.php" ?>

<body>

  <div id="wrapper">

    <?php if($connection) {
      echo "hello world";
    } ?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      
      <?php include "includes/main_nav.php" ?> 

      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      
      <?php include "includes/sidebar.php" ?>

      <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
                Welcome to Admin
                <small>Bert Witzel</small>
            </h1>
          </div>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

  <?php include "includes/footer.php" ?>
