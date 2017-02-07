<?php
require_once("templates/Common.php");
$common = new Common();
echo $common->header();
?>
<div class="text-center" style="margin-bottom: 80px;">
			<h1 style="font-size: 200px; margin-top: 40px;">404</h1>
			<h3>Page Not Found</h3>
			<p style="margin-bottom: 0;">Sorry, the page you requested was not found.</p>
			<p>Change a few things up and try submitting again.</p>
</div>
<?php
echo $common->footer();