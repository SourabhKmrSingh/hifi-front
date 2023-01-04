<?php
include_once("inc_config.php");
$title_id = $validation->urlstring_validate($_GET['id']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hi-Fi-Hospitality</title>

  <?php include('inc_header.php'); ?>
  <style>
    @media only screen and (min-width: 1000px) {
      .project-img {
        min-height: 500px;
      }
    }
  </style>
</head>

<body>
  <?php include('header.php'); ?>
  <!--=================================
breadcrumb -->
  <?php $projectResult = $db->view('*', 'mlm_projects', 'projectid', "and title_id='$title_id' and status='active'");
  $projectRow = $projectResult['result'][0];
  ?>
  <div class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
            <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="#">Project</a></li>
            <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span><?php echo $validation->db_field_validate($projectRow['title']); ?></span></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--=================================
breadcrumb -->

  <!--=================================
     <!--=================================
Most popular places -->
  <section class="my-4" id="gallery">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="section-title text-center">
            <h2><?php echo $validation->db_field_validate($projectRow['title']); ?></h2>
            <!-- <p>Discover homes in Real villa Most Popular Cities</p> -->
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="row">

            <div class="col-md-12 mb-12 ">
              <a href="#">
                <div class="location-item bg-overlay-gradient bg-holder project-img" style="background-image: url(<?php echo BASE_URL . IMG_MAIN_LOC . $projectRow['imgName']; ?>);">
                  <div class="location-item-info">
                    <h5 class="location-item-title"><?php echo $validation->db_field_validate($projectRow['title']); ?></h5>
                    <!-- <span class="location-item-list">Delhi</span> -->
                  </div>
                </div>
              </a>
            </div>

          </div>
        </div>

      </div>
      <div class="row mt-4">
        <div class="col-lg-5 col-sm-xs-5 col-xs-5">
          <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12 col-12">
              <h4>Project Name : <?php echo $validation->db_field_validate($projectRow['title']); ?></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-3 col-xs-3 col-12">
        </div>
        <div class="col-lg-4 col-sm-4 col-xs-4 col-12">
          <div class="row">
            <div class="col-lg-6 col-sm-6" >
              <h4>Amount :<?php echo $validation->db_field_validate($projectRow['amount']); ?></h4>
            </div>
            <!-- <div class="section-title ">

              <p><?php echo $validation->db_field_validate($projectRow['description']); ?></p>
            </div> -->
          </div>
        </div>
      </div>
  </section>
  <!--=================================
Most popular places -->
  <!--=================================
mobile app -->
  <?php include('footer.php'); ?>
  <?php include('inc_footer.php'); ?>
</body>
<!-- Mirrored from themes.potenzaglobalsolutions.com/html/real-villa/index-slider.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jun 2022 07:53:50 GMT -->

</html>