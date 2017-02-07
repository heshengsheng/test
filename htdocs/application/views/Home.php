<?php
require_once("templates/Common.php");
require_once("templates/DataTable.php");

$common = new Common();
echo $common->header();
$table = new DataTable();
?>
  <div id="homePage">
       <h2>Welcome to Visit the Patient-Derived Liver Cancer Xenograft Database</h2>
       <p>
          Liver cancer is the second leading cause of cancer-related deaths and endeavor to develop new drugs have failed in clinic.
          One of the factors restricting the drug development is the lack of preclinical animal models that accurately evaluate potential
          anticancer agents. Patient-Derived tumor Xenograft(PDX) models are based on the transfer of primary tumors directly from the
          patient into an immuno-deficient mouse.Because PDX mice are derived from human tumors, they offer a tool for developing
          anticancer therapies and personalized medicine for patients with cancer. In addition, these models can be used to study metastasis 
    and tumor genetic evolution. This database collected numerous liver cancer PDX models to provide comprehensively resources for liver cancer
    drug development. Table Below showed the type of data in the database.</p>
     <br><br>
     
     <div class='test'>
        <h2>Data Landscape</h2>
     <?php
        $table->dataInfoTable();
     ?>
       <p>numbers in parentheses: the number of PDX models whose matched patient data are available.</p>
   
     </div>
      <p style="text-align: center;">Recommended browser: Chrome && Firefox && Safari</p>
</div>
<?php
echo $common->footer();