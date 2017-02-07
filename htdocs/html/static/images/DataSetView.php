<?php
require_once("templates/DocumentCommon.php");
$common = new DocumentCommon();
echo $common->header();
?>
         «&#160;&#160;<a href="/help/introduction">PDXLiver</a>
                  &#160;&#160;::&#160;&#160;
                  <a class="uplink" href="/help">Contents</a>
                  &#160;&#160;::&#160;&#160;
                  <a href="/help/webPage">Web interface</a>&#160;&#160;»
            </p>
        </div>
        <h3 class='headerTip docMenu'>Data Set</h3>
        <p class='docContent'>Up to present, there are two dataset in our database Respectively from ZhongShan Hospital and WuXi AppTech.
            Available data type of each dataset are showed in the table below.
        </p>
        <img src='/static/images/docTable.png'>
<?php
echo $common->footer();