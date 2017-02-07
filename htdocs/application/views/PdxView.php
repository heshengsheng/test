<?php
require_once("templates/Common.php");
$jss = ['pdx.js'];
$common = new Common();
echo $common->header();
$data = $result2[0];

?>
<table id="pdxTable">
    <tr>
             <th colspan="2">PDX model details</th>
             
      </tr>
      <tr>
             <td class="title">Model</td>
             <td><?php
               echo "model key: ".$data['pdxKey'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "original key: ".$data['ID'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "primary site: ".$data['tissue'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "resource: ".$data['resource'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               ?></td>
      </tr>
      <tr>
             <td class="title">Patient</td>
             <td><?php
                echo "age: ".$data['age'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "gender: ".$data['gender'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "histopathologic subtype:: ".$data['subtype'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>';
                echo "grade: ".$data['differentiation'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "TNM stage: ".$data['TNMstage'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "HBV:: ".$data['HBV'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "HCV:: ".$data['HCV'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
             ?></td>
      </tr>
      <tr>
             <td class="title">Engraftment</td>
             <td><?php
               echo "location: ".$data['method'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "isFreezing: ".$data['freezing'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
             ?></td>
      </tr>
<?php
if(!empty($result1))
{
     if(count($result1) > 1)
     {
?>
      <tr>
             <td class="title">Drug</td>
             <td>
                <table class='pdxDrugInfo'>
                   <?php
                        $num = 0;
                        foreach($result1 as $drugInfo)
                        {
                            $num = $num + 1;
                    ?>
                         <tr>
                            <td>
                                 <?php
                                    if($drugInfo['TGI'] == 0){
                                       $drugInfo['TGI'] = 'unknown';
                                    }
                                    echo " <strong>drug$num:</strong> ".$drugInfo['drug'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                    echo "model passage: ".$drugInfo['passage'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                    echo "TGI(%): ".$drugInfo['TGI'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                    echo "modes: ".$drugInfo['modes'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>';
                                    echo "dose: ".$drugInfo['unit'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                    echo "frequency: ".$drugInfo['unitInterval'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                    echo "duration of treating: ".$drugInfo['duration'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                 ?>
                            </td>
                         </tr>
                    <?php
                        }
                   ?>
                </table>
             </td>           
      </tr>      

      <?php
      }else{
           $drugInfo = $result1[0];
?>
      <tr>
             <td class="title">Drug</td>
             <td><?php
               echo " drug name: ".$drugInfo['drug'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "model passage: ".$drugInfo['passage'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "TGI(%): ".$drugInfo['TGI'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "modes: ".$drugInfo['modes'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>';
               echo "dose: ".$drugInfo['unit'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "frequency: ".$drugInfo['unitInterval'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
               echo "duration of treating: ".$drugInfo['duration'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
             ?></td>
      </tr>
<?php

      }
}
$passage = substr($data['ID'],3);
$relativePath = "/static/images/histologyPic/".$passage."/";
$dir = "D:/xampp/htdocs/html/static/images/histologyPic/".$passage."/";

if(file_exists($dir))
{
   ?>
   <tr>
        <td class="title">Model characterization</td>
        <td>
        <p>Histology map:</p>
   <?php
    $files = scandir($dir);
    for($num=2;$num<count($files);$num++)
    {
        $temp = $relativePath.$files[$num];
        $urls = $temp.'/'.scandir($dir.$files[$num])[2];
        if($files[$num] != 0)
        {
            $titles = "F$files[$num] tumor";
        }else
        {
             $titles = "Patient tumor";
        }
    ?>
        <div class="pdxMap">
          <a href='<?php echo $urls?>' target='_blank'><img src='<?php echo $urls?>'></a>
          <p><?php echo $titles?></p>  
        </div>
        
    <?php     
    }
    ?>
        <div class='clear'></div>
        <p>Tumor growth curve:</p>
        <img src='/static/images/curve/Sheet <?php echo $passage?>.png' class="curve">
        </td>
   </tr>
    <?php 
}   //以上if语句为判断是否有病理图片以及生长曲线图


?>
      
</table>


<?php
echo $common->footer($jss);