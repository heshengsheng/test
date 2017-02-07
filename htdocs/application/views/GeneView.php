<?php
require_once("templates/Common.php");

$common = new Common();
$jss = ["google.js","gene.js"];
echo $common->header();

?>
 <p id='geneTip'>Ranked by z-score: <?php echo $gene; ?></p>
 <div id="genePic">
    <br>
    <i>Tips:</i>&nbsp;&nbsp;<span class='searchTip'>to draw the expression histogram of gene, google search engine( <a href='http://www.google.com' target='_blank'>http://www.google.com.hk</a>) must be available.</span>
 </div>
 <div id="progressBar" class="progressBar" >Image Loading...</div> 
<?php
echo $common->footer($jss);