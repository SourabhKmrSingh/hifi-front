<!--=================================
header -->
<style>
</style>
<header class="header">
  <div class="topbar">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="d-block d-md-flex align-items-center text-center">
            <div class="me-3 d-inline-block">
              <a href="tel: 91-11-41004838"><i class="fa fa-phone me-2 fa fa-flip-horizontal"></i> 91-11-00000000 </a>
            </div>
            <div class="me-auto d-inline-block" style="display:none;">


            </div>
            <div class="dropdown d-inline-block ps-2 ps-md-0">
              <a class="dropdown-toggle" href="#" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                info@hi-fi-hospitality.in
              </a>
            </div>
            <div class="dropdown d-inline-block ps-2 ps-md-0">
              <a class=" btn btn-large btn-info" href="#">
                Login
              </a>

            </div>
            <div class="social d-inline-block">
              <ul class="list-unstyled">
                <li><a href="#"> <i class="fab fa-facebook-f"></i> </a></li>
                <li><a href="#"> <i class="fab fa-twitter"></i> </a></li>
                <li><a href="#"> <i class="fab fa-linkedin"></i> </a></li>

              </ul>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-light bg-white navbar-static-top navbar-expand-lg header-sticky">
    <div class="container" style='justify-content: flex-start;'>
      <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
      <!-- <div class='my-2 mx-4'>
           <img src='https://upload.wikimedia.org/wikipedia/en/thumb/4/41/Flag_of_India.svg/1200px-Flag_of_India.svg.png' width ='80' />
           </div> -->
      <a class="navbar-brand py-2" href="<?php echo BASE_URL_WEB;?>">
        <img class="img-fluid" src="<?php echo BASE_URL . IMG_MAIN_LOC . $configRow['logo'];?>" alt="logo" style="height:60px;width:140px;">

      </a>
      <div class="navbar-collapse collapse justify-content-center">
        <ul class="nav navbar-nav">
          <li class="nav-item dropdown active">
            <a class="nav-link" href="<?php echo BASE_URL_WEB;?>">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link " href="<?PHP echo BASE_URL_WEB . "about" . SUFFIX;?>">
              About
            </a>
            <!-- <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="about-us.php">Who we are</a></li>
              <li><a class="dropdown-item" href="contact-us.php">Contact Us</a></li>
            </ul> -->
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="<?PHP echo BASE_URL_WEB . "gallery" . SUFFIX;?>">Gallery</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Project
            </a>
            <ul class="dropdown-menu">
              <?php

              $projectResult = $db->view('projectid,title, title_id', 'mlm_projects', 'projectid', "and status='active'", 'title asc');

              foreach ($projectResult['result'] as $projectRow) {

              ?>
                <li><a class="dropdown-item" href="<?php echo BASE_URL_WEB . "project/" . $validation->db_field_validate($projectRow['title_id']) . SUFFIX; ?>"><?php echo $validation->db_field_validate($projectRow['title']); ?></a></li>
              <?php

              }

              ?>
              <!-- <li><a class="dropdown-item" href="#">Hospitality Golden City</a></li>
             <li><a class="dropdown-item" href="pdf/item-1.pdf">Sai Dham Colour</a></li>
            <li><a class="dropdown-item" href="pdf/item-2.pdf">N2</a></li>
            <li><a class="dropdown-item" href="pdf/item-3.pdf">K-3 Colour</a></li>
            <li><a class="dropdown-item" href="pdf/item-4.pdf">Palwal Colour</a></li>
            <li><a class="dropdown-item" href="pdf/item-5.pdf">Sai City Block-S Colour</a></li>
            <li><a class="dropdown-item" href="pdf/item-6.pdf">K2 Black</a></li>
            <li><a class="dropdown-item" href="pdf/item-7.pdf">K Block Colour</a></li>
            <li><a class="dropdown-item" href="pdf/item-8.pdf"> Mandkola 2.5 ACER</a></li> -->
            </ul>
          </li>
          <li class="dropdown nav-item mega-menu">
            <a href="<?PHP echo BASE_URL_WEB . "plot-inventory" . SUFFIX;?>" class="nav-link">Plots inventary</a>
          </li>
          <!-- <li class="dropdown nav-item mega-menu">
          <a href="#" class="nav-link" data-bs-toggle="dropdown">Solution</a>
         </li> -->

          <li class="nav-item dropdown">
            <a class="nav-link" href="<?PHP echo BASE_URL_WEB . "contact" . SUFFIX;?>">Contact</a>
          </li>

        </ul>
      </div>

    </div>
  </nav>
</header>
<!--=================================
 header -->