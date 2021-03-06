       
                <!-- /.row -->
                
<div class="row">
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
              <i class="fa fa-file-text fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">

          <?php 

          $post_counts = recordCount('posts');
          echo "<div class='huge'>{$post_counts}</div>";

          ?>
            <div>Posts</div>
          </div>
        </div>
        </div>
          <a href="posts.php">
            <div class="panel-footer">
              <span class="pull-left">View Details</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-green">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-comments fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">

            <?php 

            $comments_counts = recordCount('comments');
            echo "<div class='huge'>{$comments_counts}</div>";

            ?>
              <div>Comments</div>
            </div>
          </div>
        </div>
          <a href="comments.php">
            <div class="panel-footer">
              <span class="pull-left">View Details</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-yellow">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-user fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
           
           <?php 

              $user_counts = recordCount('users');
              echo "<div class='huge'>{$user_counts}</div>";

            ?>
              <div> Users</div>
            </div>
          </div>
        </div>
          <a href="users.php">
              <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-red">
         <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                  <i class="fa fa-list fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">

              <?php 

                $category_counts = recordCount('categories');
              
                echo "<div class='huge'>{$category_counts}</div>";
              ?>
                <div>Categories</div>
              </div>
            </div>
          </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <?php 

    $post_published_count = checkStatus('posts', 'post_status', 'published');
    $post_draft_count = checkStatus('posts', 'post_status', 'draft');
    $comment_draft_count = checkStatus('comments', 'comment_status', 'Declined');
    $subscriber_count = checkStatus('users', 'user_role', 'subscriber');

    ?>

    <div style="margin-top: 40px;"></div>

    <!-- Chart -->

    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

          <?php 
          
          $element_text = ['All Posts','Published Posts', 'Draft Posts','Categories', 'Users', 'Subscribers', 'Comments', 'Pending Comments'];
          $element_count = [$post_counts, $post_published_count, $post_draft_count, $category_counts, $user_counts, $subscriber_count, $comments_counts, $comment_draft_count];
          $rows = count($element_text);

          for($i = 0; $i < $rows; $i++) {
            echo "['$element_text[$i]'" . "," . "$element_count[$i]],";
          }

          ?>
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>