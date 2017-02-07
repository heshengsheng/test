<?php
require_once("templates/Common.php");

$common = new Common();
$css = ["jquery.dataTables.css"];
$jss = ["jquery.dataTables.min.js",'snp.js'];
echo $common->header($css);

?>
    <p class='tableTip'>Search result: <?php echo $name?></p>
    <p id='snpInfo'></p>
    <table id="sResult" class="display" >
        <thead>
            <th title='the unique key of model in the database'>Model</th>
            <th title='genotype of model'>Genotype</th>          
            <th title='generation of model'>Passage</th>
            <th title='model of transplantation'>Method</th>
            <th title='location of primary patient tumor'>Tissue</th>
            <th title='clinical TNM stage of primary patient tumor'>TNM</th>
            <th title='tumor grade of primary patient tumor'>Grade</th>
            <th title='if primary patient was infected with HBV'>HBV</th>
            <th title='if primary patient was infected with HCV'>HCV</th>
            <th title='histopathologic subtype of primary patient tumor'>Subtype</th>
             <th title='data set that model came from'>Resource</th>
        </thead>
    </table>
<?php
echo $common->footer($jss);