<?php
include_once("inc_config.php");
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
    </head>
    <body>
     <?php include('header.php');?>
<!--=================================
breadcrumb -->
<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="<?php echo BASE_URL_WEB;?>"> <i class="fas fa-home"></i> </a></li>
          <!-- <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="#">Pages</a></li> -->
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span>Gallery</span></li>
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
          <h2>Gallery</h2>
          <!-- <p>Discover homes in Real villa Most Popular Cities</p> -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
        <?php
        $galleryResult = $db->view('*', 'mlm_gallery', 'galleryid', "and status='active'", 'order_custom asc');
        if($galleryResult['num_rows'] >= 1){
        foreach ($galleryResult['result'] as $galleryRow) {
        ?>
          <div class="col-md-4 mb-4 ">
            <a href="#">
              <div class="location-item bg-overlay-gradient bg-holder" style="background-image: url(<?php echo BASE_URL .IMG_MAIN_LOC . $galleryRow['imgName'];?>);">
                <div class="location-item-info">
                  <h5 class="location-item-title"><?php echo $validation->db_field_validate($galleryRow['title']); ?></h5>
                  <span class="location-item-list">Delhi</span>
                </div>
              </div>
            </a>
          </div>
          <?php } } else { ?>
         <h2 class='text-center'>No Data Found!</h2>

           <?php }?>
         
        
         
          
        </div>
      </div>
      
    </div>
  </div>
</section>
<!--=================================
Most popular places -->
<!--=================================
mobile app -->
<?php include('footer.php');?>
<?php include('inc_footer.php');?>
</body>

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/real-villa/index-slider.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jun 2022 07:53:50 GMT -->
</html>
