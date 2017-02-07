<?php
require_once("templates/Common.php");

$common = new Common();
$css = ['jquery-ui.css'];
$jss = ["jquery-ui.js","search.js"]; 
echo $common->header($css);

?>
          <form method="post" id="searchBox">
             <div id="drug">
              <h5>search by drug name</h5>
              <p>Return: a table which contains drug information of relative models. </p>
              <input type="text" placeholder='Drug name' type='submit'>
              <button class="example">example</button>
              <button class="submit">submit</button>
              <button class="reset">reset</button>
              
             </div>
             <div id="model">
              <h5>search by model key</h5>
              <p>Return: a table which contains details information of model.</p>
              <input type="text" placeholder="Model key">
              <button class="example">example</button>
              <button class="submit">submit</button>
              <button class="reset">reset</button>
              
             </div>
             <div id="gene">
               <h5>search by gene symbol</h5>
               <p>Return: a histogram which reflects the expression of gene in models.</p>        
               <input type="text" placeholder="Gene symbol">
               <button class="example">example</button>
               <button class="submit">submit</button>
               <button class="reset">reset</button>
               
             </div>
             <div id="snp">
               <h5>search by SNP ID</h5>
               <p>Return: a table which contains genotype of site in all models.</p>
               <input name="rs848991" type="text" placeholder="SNP ID">
               <button class="example">example</button>
               <button class="submit">submit</button>
               <button class="reset">reset</button>
             </div>
             <div class='clear'></div>
          </form>     


<?php
echo $common->footer($jss);