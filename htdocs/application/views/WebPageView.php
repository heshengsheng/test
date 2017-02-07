<?php
require_once("templates/DocumentCommon.php");
require_once("templates/DataTable.php");
$common = new DocumentCommon();
$table = new DataTable();
echo $common->header();
?>
         «&#160;&#160;<a href="/help/dataSet">DataSet</a>
                  &#160;&#160;::&#160;&#160;
                  <a class="uplink" href="/help">Contents</a>
            </p>
        </div>
        <h3  class='headerTip docMenu'>Web interface</h3>
        <p class='docContent'>There are 5 main sections:</p>
        <ul>
            <li class="toctree-l2"><a href='/help/webPage#Home'>Home</a></li>
            <li class="toctree-l2"><a href='/help/webPage#Browse'>Browse</a></li>
            <li class="toctree-l2"><a href='/help/webPage#Search'>Search</a></li>
            <li class="toctree-l2"><a href='/help/webPage#HeatMap'>HeatMap</a></li>
            <li class="toctree-l2"><a href='/help/webPage#Documentation'>Documentation</a></li>
        </ul>
        <h4 class='headerTip docMenu' id='Home' name='Home'>Home</h4>
        <p class='docContent'>From the <strong>Home</strong> page the user can acquaintance the introduction and purpose of the database.
         Currently PDXliver contains 105 PDX mouse models from ? Chinese liver cancer patients,
        20 of which have drug response data. 65 models were curated from public papers and others came from in-house PDX platform.</p>
        <img src='/static/images/home.png' class='docImg'>
        
        <h4 class='headerTip docMenu' id='Browse' name='Browse'>Browse</h4>
        <p class='docContent'>The <strong>Browse</strong> page allows the user to glance the data in the database.
        There are five items that the user can browse and these conditions can also be conbination.
        
        After click the button 'Browse', a table contained the result will be returned. The meaning of each column described below.</p>
        <br>
<?php
        $table->browseTable();
?>
        <h4 class='headerTip docMenu' id='Search' name='Search'>Search</h4>
        <p class='docContent'>From the <strong>Search</strong> page the user can gain an detail understand of our data. Currently there are four items available.
        For each item there is a 'example' button to illustrate.</p>
        <div class='docSearchKey'>
            <p class='docContent'><i>key word: drug, result format showed right</i></p>
           <img src='/static/images/search1.png' class='docImg'>
        </div>
        <div class='docSearchResult'>
            <p class='docContent'><i>table column annotation</i></p>
        <?php
        $table->drugTable();
 ?>
        </div>
        <br>
        <div class='docSearchKey'>
            <p class='docContent'><i>key word: model key, result on the right show</i></p>
        <img src='/static/images/search2.png' class='docImg'>
        </div>
         <div class='docSearchResult'>
         <p class='docContent'><i>detail information of model</i></p>
         <img src='/static/images/pdx.png' class='docImg'>
        </div>
        <br>
        <div class='docSearchKey'>
            <p class='docContent'><i>key word: gene symbok,result on the right show</i></p>
        <img src='/static/images/search3.png' class='docImg'>
        </div>
        <div class='docSearchResult'>
         <p class='docContent'><i>a histogram which reflects the expression of gene in models.</i></p>
         <img src='/static/images/gene.png' class='docImg'>
        </div>
        <br>
         <div class='docSearchKey'>
            <p class='docContent'><i>key word: snp ID,result on the right show</i></p>
        <img src='/static/images/search4.png' class='docImg'>
        </div>
        <div class='docSearchResult'>
        
        <p class='docContent'><i>table column annotation.</i></p>
        <?php
        $table->snpTable();
?>
        </div>
         <h4 class='headerTip docMenu' id='HeatMap' name='HeatMap'>HeatMap</h4>
         <p class='docContent'>From the <strong>HeatMap</strong> page the user can draw different genomic profile by heatmap of each data set.</p>          
         <p>Firstly a data set should be choosed, then the type of profile is also needed. For each data set,
         the available profiles are displayed in right. The format of upload file was showed in next part.</p>
         <div class='docSearchKey'> 
         <img src='/static/images/heatmap1.png' class='docImg'>
        </div>
        <div class='docSearchResult'>
         <img src='/static/images/heatmap2.png' class='docImg'>
         <br><br> <br><br>
         <p class='docContent'><i>heatmap of different profiles</i></p>
          <img src='/static/images/heatmap3.png' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <img src='/static/images/heatmap4.png'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <img src='/static/images/heatmap5.png'>
          <br> <br>
        </div>
        
         <h4  class='headerTip docMenu' id='inputFile' name='inputFile'>Input file format</h4>
         <p class='docContent'>To draw the profile of expression or copy number variation you can choose to input a list of gene symbols.
         The input can be provided in two formats(comma,space).</p>
         <p class='docContent'><i>Example:  ARL5C,ARL6IP1 ARL6IP4 ARL6IP5 ARL6IP6 ARL8A ARL8B</i></p>
         
         
          
          <h4 class='headerTip docMenu' id='Documentation' name='Documentation'>Documentation</h4>
          <p class='docContent'>The <strong>documentation</strong> page contains this help documentation.</p>
<?php
?>
        