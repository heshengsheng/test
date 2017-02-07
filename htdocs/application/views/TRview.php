<?php
require_once("templates/Common.php");

$common = new Common();

$css = [];
$jss = [];
echo $common->header($css);
$index = "D:/xampp/htdocs/html/static/images/prediction/";
$file = file($index.str_replace("\"","",$filePath));
$head = explode("\t",$file[0]);
$value = explode("\t",$file[1]);
?>
<p class="prediction">predictive TGI (Tumor Growth Inhibition) value of sorafenib for each sample:</p>
<table class="prediction">
    <tr>
    <?php
         foreach($head as $sample){
     ?>
     <th>
     <?php
        echo $sample;
     ?>
          </th>
     <?php
         }
    ?>  
    </tr>
     <tr>
    <?php
         foreach($value as $preValue){
     ?>
     <th>
     <?php
        echo sprintf("%.5f", $preValue);
     ?>
          </th>
     <?php
         }
    ?>  
    </tr>
</table>
<p class="predictTip">Tips: according to the criteria of the Division of Cancer Treatment (NCI),
we defined a response as 0-20% TGI; stability, 21-50% TGI; and tumor
progression >50% TGI. Below showed the barplot of predictive TGI value.</p>
<?php
$pic = "/static/images/prediction/".str_replace(".txt",".png",str_replace("\"","",$filePath));
?>
<img class="prediction" src=<?php echo $pic?>>
<script>
</script>

<?php
echo $common->footer($jss);



