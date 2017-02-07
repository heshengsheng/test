<?php
require_once("templates/Common.php");

$common = new Common();
$jss = ["echarts.min.js"];
echo $common->header();
?>
   <p id="heatmapHead"><i>Data Set</i>: &nbsp:&nbsp;<?php echo $dataSet?> &nbsp:&nbsp;&nbsp; <i>Profile</i>: &nbsp:&nbsp;<?php echo $profile?></p>
<?php
if(strlen($gene) != 0){  
?>
  <p id="heatMapTip">No result for genes: <?php echo $gene?></p>
<?php
}
?>
<img id="heatMapR" src="<?php echo $path?>" >
<?php
echo $common->footer($jss);