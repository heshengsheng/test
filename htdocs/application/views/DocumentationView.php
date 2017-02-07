<?php
require_once("templates/Common.php");
require_once("templates/DataTable.php");
$table = new DataTable();
$common = new Common();
$scripts = "
       <script>
           $(document).ready(function(){
                      var content = '<a class=\'uplink\' href=\'/documentation#content\'>Contents</a>'
                     var introduction = '<a href=\'/documentation#introduction\'>Introduction</a>';
                     var dataSet = '<a href=\'/documentation#dataSet\'>Data Set</a>';
                     var webPage = '<a href=\'/documentation#webPage\'>Web interface</a>';
                     var forwards = '«&#160;&#160;';
                     var backs = '&#160;&#160;»';
                  $('#doc a').click(function(){
                     var current = '';
                     if ($(this).parent().attr('class') == 'toctree-l2') {
                           current = $(this).parent().parent().parent().children().attr('href').split('#')[1];
                     }else{
                            current = $(this).attr('href').split('#')[1];
                     }          
                     var temp = '';
                     if (current == 'introduction') {
                            temp = '<p>'+content+'&#160;&#160;::&#160;&#160;'+dataSet+backs+'</p>';
                     }else if (current == 'dataSet') {
                            temp = '<p>'+forwards+introduction+'&#160;&#160;::&#160;&#160;'+content+'&#160;&#160;::&#160;&#160;'+webPage+backs+'</p>';
                         
                     }else if (current == 'webPage') {
                             temp = '<p>'+forwards+dataSet+'&#160;&#160;::&#160;&#160;'+content+'&#160;&#160;'+'</p>';
                     }
                        $('.contentsTip:first').html(temp);
                   });
                  
              });
               function contentClick(which){
                            var content = '<a class=\'uplink\' href=\'/documentation#content\' onclick=\'contentClick(this);\'>Contents</a>'
                            var introduction = '<a href=\'/documentation#introduction\' onclick=\'contentClick(this);\'>Introduction</a>';
                            var dataSet = '<a href=\'/documentation#dataSet\' onclick=\'contentClick(this);\'>Data Set</a>';
                            var webPage = '<a href=\'/documentation#webPage\' onclick=\'contentClick(this);\'>Web interface</a>';
                            var forwards = '«&#160;&#160;';
                            var backs = '&#160;&#160;»';
                          var temp = '';
                          var link = $(which).attr('href').split('#')[1];
                          
                          if (link == 'content') {
                              temp = '<p>'+content+'&#160;&#160;::&#160;&#160;'+introduction+backs+'</p>';
                          }else if (link == 'introduction') {
                             temp = '<p>'+content+'&#160;&#160;::&#160;&#160;'+dataSet+backs+'</p>';
                          }else if (link == 'dataSet') {
                             temp = '<p>'+forwards+introduction+'&#160;&#160;::&#160;&#160;'+content+'&#160;&#160;::&#160;&#160;'+webPage+backs+'</p>';
                          }else if (link == 'webPage') {
                             temp = '<p>'+forwards+dataSet+'&#160;&#160;::&#160;&#160;'+content+'&#160;&#160;::&#160;&#160;'+'</p>';
                          }
                           $('.contentsTip:first').html(temp);
                   }
       </script>
";
echo $common->header([],$scripts);
?>
     <div class='contentsTip'>
            <p>
               <a class="uplink" href="/documentation#content" onclick='contentClick(this);'>Contents</a>
                   &#160;&#160;::&#160;&#160;
               <a href='/documentation#introduction' onclick='contentClick(this);'>Introduction</a>&#160;&#160;»
            </p>
    </div>
    <div id='doc'>
        <p>
             To achieve a better performance, we recommend you to use a latest browser. 
Nevertheless, a browser with higher version than  Chrome 15,
Firefox 8,  Opera 12, Safari 8 will work fine.
        </p>
        
        <!-- content -->
        <div id="content" name='content'>
            <ul>
                <li class='toctree-l1'><a href='/documentation#introduction'>Introduction</a>
                  <ul>
                    <li class="toctree-l2"><a href='/documentation#license'>License</a></li>
                  </ul>
                </li>
                <li class='toctree-l1'><a href='/documentation#dataSet'>Data Set</a>
                </li>
                <li class='toctree-l1'><a href='/documentation#webPage'>Web interface</a>
                   <ul>
                    <li class="toctree-l2"><a href='/documentation#Home'>Home</a></li>
                    <li class="toctree-l2"><a href='/documentation#Browse'>Browse</a></li>
                    <li class="toctree-l2"><a href='/documentation#Search'>Search</a></li>
                    <li class="toctree-l2"><a href='/documentation#HeatMap'>HeatMap</a></li>
                    <li class="toctree-l2"><a href='/documentation#Documentation'>Documentation</a></li>
                   </ul>
                </li>
            </ul>
        </div>
        <br>
        
        <!-- introduction -->
        <h3 id='introduction' name='introduction'>Introduction</h3>
        <p>As preclinical models, patient-derived tumor xenograft (PDX) models in many ways represent a major
        advancement that conserve the original features of the patient tumor and have been shown to be predictive of patient
        drug response. Nevertheless, the current studies of liver cancer PDXs are scattered and the number of available
        PDX models are too small to represent the heterogeneity of human cancers. PDXliver provides comprehensively resources
        for liver cancer PDX models. Currently PDXliver contains 116 PDX mouse models from 116 Chinese liver cancer patients,
        26 of which have drug response data. 65 models were curated from public papers and others came from in-house PDX platform.
        </p>
        <h4 id='license' name='license'>License</h4>
        <p>Copyright@2015SIBS,PICB</p>
        
        <!-- data set -->
        <h3 id='dataSet' name='dataSet'>Data Set</h3>
        <p>PDXliver stores clinical information of patients, drug response of PDXs,
        genomic and transcriptomic data of PDXs. Data were collected from published
        papers or in-house PDX platform. Available datasets are listed in the following table:
        </p>
         <?php
        $table->dataInfoTable();
        ?>
        <p class='dataTableTip'>numbers in parentheses: the number of PDX models whose matched patient data are available.</p>
        <br>
        <ul class='dataProgress'>
              <li><p>
                  For in-house PDX models, raw data from different platforms were progressed by the following methods.
              </p>
                   <p>
                     1. Genome-Wide Human SNP 6.0 ArrayRaw data were stored in CEL files.
                     Genotypes were called by the the CRLMM algorithm in R package “oligo”.
                     SNP identifiers were mapped to dbSNP ID and gene symbols by R package “pd.genomewidesnp.6".
                  </p>
                   <p>
                     2. Exome sequencing: Raw data were stored in FASTQ files.
                     Low-quality reads were filtered, and then the remained reads were mapped to
                     hg19 by BWA algorithm. SNVs and indels were called by GATK based the GATK Best
                     Practices. Somatic mutations were identified by VarScan2.
                  </p>
                   <p>
                     3. Affymetrix gene expression array: Raw data were stored in CEL files.
                     Expression measures for probes were obtained by the Robust Multichip
                     Average algorithm in R package “affy”. For genes with mulitiple probes,
                     the average of all probes was used for gene expression.
                  </p>
                   <p>
                    4. RNA-Seq: Raw data were stored in FASTQ files.
                    Low-quality reads were filtered. Then high-quality
                    reads were mapped to hg19 and the gene expression levels were estimated by RSEM.
                    </p>                   
              </li>
              <li><p>The 65 PDX models data from WuXi AppTech (Data Set2) were obtained from
                  public papers (<a href='http://www.ncbi.nlm.nih.gov/pubmed/26062443' target=_blank>PMID: 26062443</a>).
        </p></li>
        </ul>
        
        <!-- web page -->
         <h3 id='webPage' name='webPage'>Web interface</h3>
        <p>There are 5 main sections:</p>
        <ul>
            <li class="toctree-l2"><a href='/documentation#Home'>Home</a></li>
            <li class="toctree-l2"><a href='/documentation#Browse'>Browse</a></li>
            <li class="toctree-l2"><a href='/documentation#Search'>Search</a></li>
            <li class="toctree-l2"><a href='/documentation#HeatMap'>HeatMap</a></li>
            <li class="toctree-l2"><a href='/documentation#Documentation'>Documentation</a></li>
        </ul>
        <h4 id='Home' name='Home'>Home</h4>
        <p >Liver cancer is the second leading cause of cancer-related deaths.
        FDA approved only sorafenib for the treatment of unresectable HCC, and
        only ?% patients benefit from sorafenib treatment. One of the factors
        restricting the drug development is the lack of preclinical animal models
        that accurately evaluate potential anticancer agents. Patient-derived xenograft (PDX)
        mouse models have been proved to conserve the original features of the patient tumor
        and are predictive for drug response. However, the current studies of liver cancer
        PDXs are scattered and the number of available PDX models are too small to represent
        the heterogeneity of human cancers. Our database PDXliver is designed to provide comprehensively
        resources for liver cancer PDX models.</p>
        
        <h4 id='Browse' name='Browse'>Browse</h4>
        <p>The <strong>Browse</strong> page allows users to glance the PDX models by tumor subtype,
        virus state, TNM stage, tumor grade, and data resources. After click the button 'Browse',
        a table will return the searching results. The meanings of each column are described below.
        
        <br>
<?php
        $table->browseTable();
?>
        <h4 id='Search' name='Search'>Search</h4>
        <p>From the <strong>Search</strong> page, users can find PDX models by drug name
        or model identifier, get gene expression by gene symbol and get SNP genotypes by SNP IDs.</p>
        <img src='/static/images/search.png' class='docImg'>
            <ul class='searchTip'>
                <li>
                     <p>A table including detailed drug information will return if searching by keyword <i>'Drug'</i></p>
<?php
                     $table->drugTable();
?>
                </li>
                <li>
                     <p>A table including detailed model information will return if searching by keyword <i>'Model key'</i></p>
                     <img src='/static/images/pdx.png' class='docImg noBorder'>
                </li>
                <li>
                    <p >When searching by <i>'Gene symbol'</i>, a gene expression histogram
                    will be plotted. .Each bar means the expression value of gene in one PDX model.
                    The expression value is normalized by z-score with the formula: (raw_expression value - mean in the same dataset)/standard
                    deviation in the same dataset.</p>
                    <i>Tips:</i>&nbsp;&nbsp;<span><p class='searchTip'>To draw the map, google search engine must be available. </p></span>
                    <img src='/static/images/gene.png' class='docImg'>
                </li>
                <li>
                    <p>When searching by keyword <i>'SNP ID'</i>, a table will provide the genotypes
                    of germline mutation. </p>
<?php
                   $table->snpTable();
?>
                </li>
            </ul>         
           
         <h4 id='HeatMap' name='HeatMap'>HeatMap</h4>
         <p>From the <strong>HeatMap</strong> page, users can draw genomic
         or transcriptomic profiles of multiple genes. For each dataset, the
         available profiles are shown in the right table. </p>
          <table class='dataTypeTable'>
               <tr>
                    <th>Data Set</th>
                    <th>Expression</th>
                    <th>Copy-number alteration</th>
                    <th>Somativ mutation</th>  
               </tr>
               <tr class='dataTypeRow'>
                    <td>DataSet1</td>
                    <td>&radic;(43)</td>
                    <td>&times;</td>
                    <td>&radic;(13)</td>
               </tr>
               <tr class='dataTypeRow'>
                    <td>DataSet2</td>
                    <td>&radic;(52)</td>
                    <td>&radic;(42)</td>
                    <td>&radic;(56)</td>
               </tr>
               <tr class='dataTypeRow'>
                    <td>DataSet3</td>
                    <td>&radic;(5)</td>
                    <td>&times;</td>
                    <td>&times;</td>
               </tr>
            </table>    
         <span  id='inputFile' name='inputFile'>Gene list format:</span>
        <p>To draw the expression heatmap or copy number variation profile,
        users need to select their interested genes.  They can input gene symbols
        (separated by comma or space), or upload a file of gene list. For example,
        “ARL5C,ARL6IP1 ARL6IP4 ARL6IP5 ARL6IP6 ARL8A ARL8B”.  To better present somatic
        mutations, we only showed the significantly mutated genes in liver cancer.
        </p>
       
         <p>Heatmaps for different molecular types were showed below.</p>
         <img src='/static/images/heatmap.png' class='docImg'>
       
            <img src='/static/images/order1.png' class='orderPic'><span> profile: <i>Expression</i></span><br>
            <img src='/static/images/order2.png' class='orderPic'><span> profile: <i>Copy number variation</i></span><br>
            <img src='/static/images/order3.png' class='orderPic'><span> profile: <i>Mutation</i></span><br>                     
          <h4 id='Documentation' name='Documentation'>Documentation</h4>
          <p>The <strong>documentation</strong> page contains this help documentation.</p>
    </div>
<?php
echo $common->footer();