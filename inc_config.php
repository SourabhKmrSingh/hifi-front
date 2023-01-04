<?php
include_once("./mlm/admin/classes/includes.php");

define("BASE_URL", $validation->db_field_validate($configRow['site_url']));
define("BASE_URL_WEB", $validation->db_field_validate($configRow['site_url_web']));
define("SUFFIX", $validation->db_field_validate($configRow['site_url_extension']));
define("FILE_LOC", "content/");
define("IMG_MAIN_LOC", "content/");
define("IMG_THUMB_LOC", "content/thumb/");
define("IMG_LOC", "uploads/");

$base_url = BASE_URL;
$suffix = SUFFIX;
$_SESSION['image_maxsize'] = $validation->db_field_validate($configRow['image_maxsize']);
$regid = @$_SESSION['regid'];

$badlinkQueryResult = $db->view('badlinkid,url_redirect_to', 'rb_badlinks', 'badlinkid', "and url_redirect_from='$full_url' and status='active'", "badlinkid desc");
if($badlinkQueryResult['num_rows'] >= 1)
{
	$badlinkRow = $badlinkQueryResult['result'][0];
	$redirect_url = $badlinkRow['url_redirect_to'];
	header("Location: $redirect_url");
	exit();
}

$err_redirect_url = BASE_URL."error".SUFFIX;
if(strpos($full_url,'%3C') !== false)
{
	header("Location: $err_redirect_url");
	exit();
}
else if(strpos($full_url,'%3E') !== false)
{
	header("Location: $err_redirect_url");
	exit();
}
else if(strpos($full_url,'[') !== false)
{
	header("Location: $err_redirect_url");
	exit();
}
else if(strpos($full_url,']') !== false)
{
	header("Location: $err_redirect_url");
	exit();
}
else if(strpos($full_url,'%22') !== false)
{
	header("Location: $err_redirect_url");
	exit();
}
else if(strpos($full_url,'javascript') !== false)
{
	header("Location: $err_redirect_url");
	exit();
}
?>