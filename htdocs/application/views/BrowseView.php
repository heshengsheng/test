<?php
require_once("templates/Common.php");

$common = new Common();

$css = ["zTreeStyle.css"];
$jss = ["jquery.ztree.core.min.js","jquery.ztree.excheck.min.js","browse.js"];
echo $common->header($css);
?>
    <div id="browsePage">
           <div id="bMenu">
              <button>Browse</button> 
              <ul id="tree" class="ztree"></ul>
              <button>Browse</button>             
         </div> 
         <div id="bTip">
               <h5>Read Me:</h5>
                <p>
                    In this page, you can browse data stored in the database with five items including of
                    histopathologic subtype, tumor grade, TNM stage, virus infection or data resource. You can choose any items that you are interested in.                                    
                </p>
                <p>
                  After clicking the 'Browse' button, you will obtain a table showing the basic information of
                  models which meet all the checked conditions.
                </p>
         </div>
     <div class='clear'></div>
    </div>
<?php
echo $common->footer($jss);