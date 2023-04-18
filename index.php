<?php
  include('./header.php'); 
 // include('./auth.php'); 
?>

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-center">
          <div class="col">
            <h1 class="page-header-title">Dashboard</h1>
          </div>
        </div>
      </div>
      <!-- End Page Header -->

      <!-- Stats -->
      <div class="row">
        <div class="col-sm-4 col-lg-4 mb-4 mb-lg-4">
          <!-- Card -->
          <a class="card card-hover-shadow h-100" href="#">
            <div class="card-body">
              <h6 class="card-subtitle">Total Users</h6>

              <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                  <h2 class="card-title text-inherit"><?= $conn->query("SELECT * FROM users")->num_rows; ?></h2>
                </div>
              </div>
            </div>
          </a>
          <!-- End Card -->
        </div>

        <div class="col-sm-4 col-lg-4 mb-4 mb-lg-4">
          <!-- Card -->
          <a class="card card-hover-shadow h-100" href="#">
            <div class="card-body">
              <h6 class="card-subtitle">Total Discussion</h6>

              <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                  <h2 class="card-title text-inherit"><?= $conn->query("SELECT * FROM topics")->num_rows; ?></h2>
                </div>
              </div>
            </div>
          </a>
          <!-- End Card -->
        </div>

        <div class="col-sm-4 col-lg-4 mb-4 mb-lg-4">
          <!-- Card -->
          <a class="card card-hover-shadow h-100" href="#">
            <div class="card-body">
              <h6 class="card-subtitle">Total Category/Tags</h6>

              <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                  <h2 class="card-title text-inherit"><?= $conn->query("SELECT * FROM categories")->num_rows; ?></h2>
                </div>
              </div>
            </div>
          </a>
          <!-- End Card -->
        </div>
      </div>
      <!-- End Stats -->

      <div class="row">
        <div class="col-lg-12 mb-12 mb-lg-12">
          <!-- Card -->
          <div class="card h-100">
            <!-- Header -->
            <div class="card-header card-header-content-sm-between">
              <h4 class="card-header-title mb-2 mb-sm-0">Statistical Analysis</h4>
            </div>
            <!-- End Header -->

            <div class="card-body">
              <div class="row mb-4">
                <div class="col-sm-auto align-self-sm-end">
                  <div class="row fs-6 text-body">

                    <div class="col-auto">
                      <span class="legend-indicator bg-primary"></span> Category
                    </div>

                    <div class="col-auto">
                      <span class="legend-indicator bg-success"></span> Users
                    </div>

                    <div class="col-auto">
                      <span class="legend-indicator bg-warning"></span> Discussion
                    </div>

                  </div>
                </div>
              </div>

              
              <!-- SELECT DATE(date_created) AS created_at, COUNT(id) FROM users 
              WHERE DATE(date_created) BETWEEN DATE(NOW()) - INTERVAL 6 DAY AND DATE(NOW())
              GROUP BY DATE(date_created) -->
              <?php
                $usersQry = $conn->query("SELECT DATE(dates.date) AS created_at, COUNT(users.id) AS num_users FROM 
                                        (SELECT DATE(NOW()) - INTERVAL 6 DAY + INTERVAL t.n DAY AS date
                                        FROM 
                                        (SELECT a.N + b.N*10 + c.N*100 AS n
                                        FROM (SELECT 0 AS N UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 
                                        UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 
                                        UNION SELECT 8 UNION SELECT 9) AS a
                                        CROSS JOIN 
                                        (SELECT 0 AS N UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 
                                        UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 
                                        UNION SELECT 8 UNION SELECT 9) AS b
                                        CROSS JOIN 
                                        (SELECT 0 AS N UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 
                                        UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 
                                        UNION SELECT 8 UNION SELECT 9) AS c
                                        LIMIT 7) t) dates 
                                        LEFT JOIN users ON DATE(users.date_created) = dates.date 
                                        GROUP BY DATE(dates.date)");
                
                $categoriesQry = $conn->query("SELECT DATE(dates.date) AS created_at, COUNT(categories.id) AS num_categories FROM 
                                        (SELECT DATE(NOW()) - INTERVAL 6 DAY + INTERVAL t.n DAY AS date
                                        FROM 
                                        (SELECT a.N + b.N*10 + c.N*100 AS n
                                        FROM (SELECT 0 AS N UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 
                                        UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 
                                        UNION SELECT 8 UNION SELECT 9) AS a
                                        CROSS JOIN 
                                        (SELECT 0 AS N UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 
                                        UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 
                                        UNION SELECT 8 UNION SELECT 9) AS b
                                        CROSS JOIN 
                                        (SELECT 0 AS N UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 
                                        UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 
                                        UNION SELECT 8 UNION SELECT 9) AS c
                                        LIMIT 7) t) dates 
                                        LEFT JOIN categories ON DATE(categories.date_created) = dates.date 
                                        GROUP BY DATE(dates.date)");
                
                $topicsQry = $conn->query("SELECT DATE(dates.date) AS created_at, COUNT(topics.id) AS num_topics FROM 
                                        (SELECT DATE(NOW()) - INTERVAL 6 DAY + INTERVAL t.n DAY AS date
                                        FROM 
                                        (SELECT a.N + b.N*10 + c.N*100 AS n
                                        FROM (SELECT 0 AS N UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 
                                        UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 
                                        UNION SELECT 8 UNION SELECT 9) AS a
                                        CROSS JOIN 
                                        (SELECT 0 AS N UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 
                                        UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 
                                        UNION SELECT 8 UNION SELECT 9) AS b
                                        CROSS JOIN 
                                        (SELECT 0 AS N UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 
                                        UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 
                                        UNION SELECT 8 UNION SELECT 9) AS c
                                        LIMIT 7) t) dates 
                                        LEFT JOIN topics ON DATE(topics.date_created) = dates.date 
                                        GROUP BY DATE(dates.date)");

                $dateData = array();
                $usersData = array();
                $categoriesData = array();
                $topicsData = array();

                while ($usersRow = mysqli_fetch_object($usersQry)) {
                  array_push($dateData, date('M d',strtotime($usersRow->created_at)) );
                  array_push($usersData, $usersRow->num_users);
                }

                while ($categoriesRow = mysqli_fetch_object($categoriesQry)) {
                  array_push($categoriesData, $categoriesRow->num_categories);
                }

                while ($topicsRow = mysqli_fetch_object($topicsQry)) {
                  array_push($topicsData, $topicsRow->num_topics);
                }
              ?>
              <!-- Bar Chart -->
              <div class="chartjs-custom">
                <canvas id="updatingBarChart" style="height: 20rem;" data-hs-chartjs-options='{
                          "type": "bar",
                          "data": {
                            "labels": <?= json_encode($dateData); ?>,
                            "datasets": [{
                              "data": <?= json_encode($categoriesData); ?>,
                              "backgroundColor": "#377dff",
                              "hoverBackgroundColor": "#377dff",
                              "borderColor": "#377dff",
                              "maxBarThickness": "10"
                            },
                            {
                              "data": <?= json_encode($usersData); ?>,
                              "backgroundColor": "#00c9a7",
                              "borderColor": "#00c9a7",
                              "maxBarThickness": "10"
                            },
                            {
                              "data": <?= json_encode($topicsData); ?>,
                              "backgroundColor": "#f5ca99",
                              "borderColor": "#f5ca99",
                              "maxBarThickness": "10"
                            }]
                          },
                          "options": {
                            "scales": {
                              "y": {
                                "grid": {
                                  "color": "#e7eaf3",
                                  "drawBorder": false,
                                  "zeroLineColor": "#e7eaf3"
                                },
                                "ticks": {
                                  "beginAtZero": true,
                                  "stepSize": 100,
                                  "fontSize": 12,
                                  "fontColor":  "#97a4af",
                                  "fontFamily": "Open Sans, sans-serif",
                                  "padding": 10,
                                  "postfix": ""
                                }
                              },
                              "x": {
                                "grid": {
                                  "display": false,
                                  "drawBorder": false
                                },
                                "ticks": {
                                  "fontSize": 12,
                                  "fontColor":  "#97a4af",
                                  "fontFamily": "Open Sans, sans-serif",
                                  "padding": 5
                                },
                                "categoryPercentage": 0.5,
                                "maxBarThickness": "10"
                              }
                            },
                            "cornerRadius": 2,
                            "plugins": {
                              "tooltip": {
                                "prefix": "",
                                "hasIndicator": true,
                                "mode": "index",
                                "intersect": false
                              }
                            },
                            "hover": {
                              "mode": "nearest",
                              "intersect": true
                            }
                          }
                        }'></canvas>
              </div>
              <!-- End Bar Chart -->

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Content -->
</main>

<?php
  include('./footer.php'); 
?>