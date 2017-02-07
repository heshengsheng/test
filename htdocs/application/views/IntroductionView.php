<?php
require_once("templates/DocumentCommon.php");

$common = new DocumentCommon();
echo $common->header();
?>
         «&#160;&#160;<a href="/help">PDXLiver</a>
                  &#160;&#160;::&#160;&#160;
                  <a class="uplink" href="/help">Contents</a>
                  &#160;&#160;::&#160;&#160;
                  <a href="/help/dataSet">Data Set</a>&#160;&#160;»
            </p>
        </div>
        <h3 class='headerTip docMenu'>Introduction</h3>
        <p class='docContent'>As preclinical models, patient-derived tumor xenograft (PDX) models in many ways represent a major
        advancement that conserve the original features of the patient tumor and have been shown to be predictive of patient
        drug response. Nevertheless, the current studies of liver cancer PDXs are scattered and the number of available
        PDX models are too small to represent the heterogeneity of human cancers. PDXliver provides comprehensively resources
        for liver cancer PDX models. Currently PDXliver contains 105 PDX mouse models from ? Chinese liver cancer patients,
        20 of which have drug response data. 65 models were curated from public papers and others came from in-house PDX platform.
        </p>
        <h4 id='license' name='license' class='headerTip'>License</h4>
        <p class='docContent'>Copyright@2015SIBS,PICB</p>
    <?php
    echo $common->footer();