<?php

include_once("inc_config.php");



@$projectid = $validation->input_validate($_GET['projectid']);

@$blockid = $validation->input_validate($_GET['blockid']);



$where_query = " and status = 'active'";

if ($projectid != "") {

    $where_query .= " and projectid = '$projectid'";
}

if ($blockid != "") {

    $where_query .= " and blockid = '$blockid'";
}

$plotResult = $db->view("*", "mlm_plots", "plotid", $where_query, "plotid asc");

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
    .tree {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tree img {
        max-height: 60px;
    }

    .tree p {
        margin-bottom: 3px;
        margin-top: 0px;
        font-size: 13px;
        color: #000000;
    }

    .tree .pending {
        color: red;
        font-size: 10px;
    }

    .tree ul {
        padding-top: 20px;
        position: relative;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    .tree li {
        float: left;
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }


    /*We will use ::before and ::after to draw the connectors*/

    .tree li::before,
    .tree li::after {
        content: '';
        position: absolute;
        top: 0;
        right: 50%;
        border-top: 1px solid #ccc;
        width: 50%;
        height: 20px;
    }

    .tree li::after {
        right: auto;
        left: 50%;
        border-left: 1px solid #ccc;
    }


    /*We need to remove left-right connectors from elements without 
any siblings*/

    .tree li:only-child::after,
    .tree li:only-child::before {
        display: none;
    }


    /*Remove space from the top of single children*/

    .tree li:only-child {
        padding-top: 0;
    }


    /*Remove left connector from first child and 
right connector from last child*/

    .tree li:first-child::before,
    .tree li:last-child::after {
        border: 0 none;
    }


    /*Adding back the vertical connector to the last nodes*/

    .tree li:last-child::before {
        border-right: 1px solid #ccc;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }

    .tree li:first-child::after {
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
    }


    /*Time to add downward connectors from parents*/

    .tree ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 1px solid #ccc;
        width: 0;
        height: 20px;
    }

    .tree li a {
        border: 1px solid #ccc;
        padding: 5px 10px;
        text-decoration: none;
        color: #666;
        font-size: 11px;
        display: inline-block;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }


    /*Time for some hover effects*/


    /*We will apply the hover effect the the lineage of the element also*/

    .tree li a:hover,
    .tree li a:hover+ul li a {
        background: #c8e4f8;
        color: #000;
        border: 1px solid #94a0b4;
    }


    /*Connector styles on hover*/

    .tree li a:hover+ul li::after,
    .tree li a:hover+ul li::before,
    .tree li a:hover+ul::before,
    .tree li a:hover+ul ul::before {
        border-color: #94a0b4;
    }

    .plot_block {
        width: 100%;
        text-align: left;
        padding-left: 12px;
        padding-right: 12px;
    }

    .plot_col {
        box-shadow: 0 2px 20px rgba(65, 131, 215, 0.22), 0 2px 11px rgba(65, 131, 215, 0.15) !important;
        background: #FFFFFF;
        word-wrap: break-word;
        padding: 0px;
        padding: 7px 4px;
        text-align: center;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
    }


    /* .plot_main_col:first-child */


    /* { */


    /* padding-left:15px; */


    /* padding-right:3px; */


    /* } */

    .plot_main_col {
        padding-left: 3px;
        padding-right: 3px;
    }


    /* .plot_main_col:last-child */


    /* { */


    /* padding-left:3px; */


    /* padding-right:15px; */


    /* } */

    .plot_col p,
    .plot_col ul {
        padding: 0px !important;
        margin: 0px !important;
    }

    .plot_col .plot_ul {
        /*display:none;*/
    }

    .plot_col:hover .plot_col ul.plot_ul {
        display: block;
    }

    .plot_green {
        background: green !important;
        color: #FFFFFF !important;
    }

    .plot_red {
        background: red !important;
        color: #FFFFFF !important;
    }

    .plot_blue {
        background: blue !important;
        color: #FFFFFF !important;
    }

    .plot_pink {
        background: #FF7189 !important;
        color: #FFFFFF !important;
    }

    .box_available {
        background: #23B14D !important;
        color: #FFFFFF !important;
    }

    .box_token {
        background: #9AD9EA !important;
        color: #000000 !important;
    }

    .box_partpayment {
        background: #FEAEC9 !important;
        color: #000000 !important;
    }

    .box_booked {
        background: red !important;
        color: #FFFFFF !important;
    }

    .box_emi {
        background: #c4c4c4 !important;
        color: #000000 !important;
    }

    .box_register {
        background: #000000 !important;
        color: #ffffff !important;
    }


    /* Tooltip container */

    .plot_col .tooltip2 {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
        /* If you want dots under the hoverable text */
    }


    /* Tooltip text */

    .plot_col .tooltip2 .tooltiptext {
        visibility: hidden;
        width: 250px;
        box-shadow: 0 2px 20px rgba(65, 131, 215, 0.22), 0 2px 11px rgba(65, 131, 215, 0.15) !important;
        background: #FFFFFF;
        word-wrap: break-word;
        color: #000000;
        text-align: center;
        padding: 8px 12px;
        border-radius: 3px;
        top: 100%;
        left: 50%;
        margin-left: -60px;
        position: absolute;
        z-index: 1;
    }

    .plot_col .tooltip2 .tooltiptext p {
        margin-bottom: 3.5px !important;
    }

    .plot_col .tooltip2 .tooltiptext .tooltip_col1 {
        display: inline-block;
        text-align: left;
        width: 45%;
        margin-bottom: 3.5px !important;
        vertical-align: top;
    }

    .plot_col .tooltip2 .tooltiptext .tooltip_col2 {
        display: inline-block;
        text-align: left;
        width: 53%;
        margin-bottom: 3.5px !important;
        vertical-align: top;
    }


    /* Show the tooltip text when you mouse over the tooltip container */

    .plot_col .tooltip2:hover .tooltiptext {
        visibility: visible;
    }

    .multitextarea {
        max-height: 120px !important;
        height: 120px !important;
        background: none !important;
    }

    .bg-primary {
        --tw-bg-opacity: 1;
        background-color: rgb(1 100 80/var(--tw-bg-opacity)) !important;
    }

    a {
        text-decoration: none !important;
    }

    .text-primary {
    color: #26ae61 !important;
}
    select{
        min-width: 170px!important;
        margin-right: 10px;
    }
</style>
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
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Plots Inventory</span></li>
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
<section class="pt-[80px] lg:pt-[120px]">
    <div class="container">
        <div CLASS="row">

            <div CLASS="col-lg-12 mb-5">

                <h1 CLASS=" font-weight-bold mb-2" style="font-size: 2rem;text-align:center;">Plots Inventory</h1>

                <hr>

            </div>

        </div>



        <form name="form_actions" method="GET" action="<?PHP echo BASE_URL_WEB;?>plot_inventory.php" ENCTYPE="MULTIPART/FORM-DATA">

            <div class="row">

                <div class="col-sm-4 mb-0">

                    <div class="form-inline d-flex align-items-center">

                        <select NAME="projectid" CLASS="form-control mb_inline mb-2" ID="projectid" onChange="fetch_block();">

                            <option VALUE="">--select project--</option>

                            <?php

                            $projectResult = $db->view('projectid,title', 'mlm_projects', 'projectid', "and status='active'", 'title asc');

                            foreach ($projectResult['result'] as $projectRow) {

                            ?>

                                <option VALUE="<?php echo $validation->db_field_validate($projectRow['projectid']); ?>" <?php if ($projectRow['projectid'] == $projectid) echo "selected"; ?>><?php echo $validation->db_field_validate($projectRow['title']); ?></option>

                            <?php

                            }

                            ?>

                        </select>

                        <div id="block_area" class="ml-2" style=" margin-right: 10px;"></div>

                        <button type="submit" class="btn btn-primary bg-primary ml-2" style="margin-bottom: .5rem;">Apply</button>

                    </div>

                </div>

            </div>



            <div class="mt-4">

                <div class="row plot_block">

                    <?php

                    if ($plotResult['num_rows'] >= 1) {

                        foreach ($plotResult['result'] as $plotRow) {

                            $plotid = $plotRow['plotid'];

                            $inventoryhistoryResult = $db->view('payment_type,name', 'mlm_plots_inventory_history', 'historyid', "and inventoryid IN (select inventoryid from mlm_plots_inventory where plotid='$plotid' and status ='active')", "historyid desc", "1");

                            $inventoryhistoryRow = $inventoryhistoryResult['result'][0];

                            if ($inventoryhistoryRow['payment_type'] == "Token") {

                                $box_color = "box_token";

                                $booking_status = $inventoryhistoryRow['payment_type'];
                            } else if ($inventoryhistoryRow['payment_type'] == "Part Payment") {

                                $box_color = "box_partpayment";

                                $booking_status = $inventoryhistoryRow['payment_type'];
                            } else if ($inventoryhistoryRow['payment_type'] == "Booked") {

                                $box_color = "box_booked";

                                $booking_status = $inventoryhistoryRow['payment_type'];
                            } else if ($inventoryhistoryRow['payment_type'] == "EMI") {

                                $box_color = "box_emi";

                                $booking_status = $inventoryhistoryRow['payment_type'];
                            } else if ($inventoryhistoryRow['payment_type'] == "Registered") {

                                $box_color = "box_register";

                                $booking_status = $inventoryhistoryRow['payment_type'];
                            } else {

                                $box_color = "box_available";

                                $booking_status = "Available";
                            }



                            $projectid = $plotRow['projectid'];

                            $projectResult = $db->view("title,projectid", "mlm_projects", "projectid", "and projectid='{$projectid}'");

                            $projectRow = $projectResult['result'][0];



                            $blockid = $plotRow['blockid'];

                            $blockResult = $db->view("title,blockid", "mlm_blocks", "blockid", "and blockid='{$blockid}'");

                            $blockRow = $blockResult['result'][0];

                    ?>

                            <div class="plot_main_col col-2 col-sm-2 col-md-1 col-sm-1 mb-2 p-1">

                                <div class="plot_col <?php echo $box_color; ?>">

                                    <div class="tooltip2">

                                        <?php echo $validation->db_field_validate($plotRow['title']); ?>

                                        <span class="tooltiptext">

                                            <?php if ($plotRow['title'] != "") { ?>

                                                <div class="tooltip_col1">Plot No.</div>

                                                <div class="tooltip_col2"><?php echo $validation->db_field_validate($plotRow['title']); ?></div>

                                            <?php } ?>



                                            <?php if ($plotRow['plot_type'] != "") { ?>

                                                <div class="tooltip_col1">Type</div>

                                                <div class="tooltip_col2"><?php echo $validation->db_field_validate($plotRow['plot_type']); ?></div>

                                            <?php } ?>



                                            <?php if ($plotRow['amount_sqryard'] != "") { ?>

                                                <!-- <div class="tooltip_col1">Rate /SqYard</div>

                            <div class="tooltip_col2">&#8377;<?php echo $validation->price_format($plotRow['amount_sqryard']); ?></div> -->

                                            <?php } ?>



                                            <?php if ($plotRow['plot_size'] != "") { ?>

                                                <div class="tooltip_col1">Plot Size</div>

                                                <div class="tooltip_col2"><?php echo $validation->db_field_validate($plotRow['plot_size']); ?></div>

                                            <?php } ?>



                                            <?php if ($plotRow['amount'] != "") { ?>

                                                <!-- <div class="tooltip_col1">Plot Value</div>

                            <div class="tooltip_col2">&#8377;<?php echo $validation->price_format($plotRow['amount']); ?></div> -->

                                            <?php } ?>



                                            <?php if ($plotRow['dimensions'] != "") { ?>

                                                <div class="tooltip_col1">Dimensions</div>

                                                <div class="tooltip_col2"><?php echo $validation->db_field_validate($plotRow['dimensions']); ?></div>

                                            <?php } ?>



                                            <?php if ($booking_status != "") { ?>

                                                <div class="tooltip_col1">Booking Status</div>

                                                <div class="tooltip_col2"><?php echo $validation->db_field_validate($booking_status); ?></div>

                                            <?php } ?>





                                            <?php if ($inventoryhistoryRow['name'] != "" && $inventoryhistoryRow['payment_type'] != "Available") { ?>

                                                <div class="tooltip_col1">Name</div>

                                                <div class="tooltip_col2"><?php echo  $validation->db_field_validate($inventoryhistoryRow['name']); ?></div>

                                            <?php } ?>


                                            <?php if ($plotRow['registry_number'] != "") { ?>

                                                <div class="tooltip_col1">Registry No.</div>

                                                <div class="tooltip_col2"><?php echo $validation->db_field_validate($plotRow['registry_number']); ?></div>

                                            <?php } ?>

                                            <?php if ($plotRow['registry_date'] != "" && $plotRow['registry_date'] != "0000-00-00") { ?>

                                                <div class="tooltip_col1">Registry Date</div>

                                                <div class="tooltip_col2"><?php echo $validation->db_field_validate(date("d  m, Y", strtotime($plotRow['registry_date']))); ?></div>

                                            <?php } ?>

                                            <?php if ($plotRow['mutation'] != "") { ?>

                                                <div class="tooltip_col1">Mutation</div>

                                                <div class="tooltip_col2"><?php echo $validation->db_field_validate($plotRow['mutation']); ?></div>

                                            <?php } ?>


                                        </span>

                                    </div>

                                </div>

                            </div>

                        <?php

                        }
                    } else {

                        ?>

                        <h4 class="text-center">No Record is Available! </h4>

                    <?php

                    }

                    ?>

                </div>

            </div>

        </form>

    </div>
</section>
<!--=================================
Most popular places -->
<!--=================================
mobile app -->
<?php include('footer.php');?>
<?php include('inc_footer.php');?>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    })

    function fetch_block()

    {

        $.ajax({

            type: 'post',

            url: '<?php echo BASE_URL_WEB;?>mlm/admin/fetch_block2.php',

            data:

            {

                projectid: $("#projectid").val(),

                blockid: "<?php echo $blockid; ?>",


            },

            success: function(result)

            {

                $("#block_area").html(result);

            }

        });

    }
</script>
</body>

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/real-villa/index-slider.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jun 2022 07:53:50 GMT -->
</html>
