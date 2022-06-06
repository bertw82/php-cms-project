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

            <!-- Add & update Categories Form -->
            <div class="col-xs-6">

              <?php insert_categories(); ?>
              
              <!-- Add category -->
              <form action="" method="post" >
                <div class="form-group">
                  <label for="cat_title">Category Title</label>
                  <input class="form-control" type="text" name="cat_title">
                </div>
                <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                </div>
              </form>

              <?php // UPDATE AND INCLUDE QUERY

              if(isset($_GET['edit'])) { // the 'edit' from the update categories includes

                $cat_id = $_GET['edit'];
                include "includes/update_categories.php";
              }

              ?>         

            </div>
            <!-- /Add & update Categories Form -->

            <!-- Find and delete cateagories form -->
            <div class="col-xs-6">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category Title</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php find_categories(); ?>

                <?php delete_categories(); ?>
                  
                </tbody>
              </table>
            </div>
            <!-- Find and delete categories form -->

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