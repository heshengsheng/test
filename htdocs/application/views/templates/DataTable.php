<?php
class DataTable extends CI_Controller
{
    public function dataInfoTable(){
?>
         <table class='dataInfoTable'>
          <tr>
               <th rowspan=2>Data Set</th>
               <th rowspan=2>#Model</th>
               <th colspan=2>Transcriptome</th>
               <th colspan=2>Genome</th>
               <th rowspan=2>Drug</th>
               <th rowspan=2>Resource</th>
               <th rowspan=2>Reference</th>
          </tr>
          <tr>
               <th>#sample</th>
               <th>platform</th>
               <th>#sample</th>
               <th>platform</th>
          </tr>
          <tr>
               <td rowspan=2>DataSet1</td>
               <td rowspan=2>46</td>
               <td rowspan=2>40(3)</td>
               <td rowspan=2>Affymetrix Human Genome U133 Plus 2.0 Array (GPL570)</td>
               <td>40(3)</td>
               <td>Affymetrix Genome-Wide Human SNP 6.0 Array</td>
               <td rowspan=2>21</td>
               <td rowspan=2>ZhongShan<br>Hospital</td>
               <td rowspan=2>unpublished</td>
          </tr>
          <tr>
               <td>13</td>
               <td>Exome sequencing</td>
          </tr>
          <tr>
               <td rowspan=2>DataSet2</td>
               <td rowspan=2>65</td>
               <td rowspan=2>43(9)</td>
               <td rowspan=2>Affymetrix Human Gene Expression Array (GPL15207)</td>
               <td>42</td>
               <td>Affymetrix Genome-Wide Human SNP 6.0 Array</td>
               <td rowspan=2>0</td>
                <td rowspan=2>WuXi AppTech</td>
                 <td rowspan=2><a href='http://www.ncbi.nlm.nih.gov/pubmed/26062443' target='_blank'>PMID: 26062443</a></td>
          </tr>
          <tr>
               
               <td>56</td>
               <td>Exome sequencing</td>
          </tr>
          <tr>
              <td>DataSet3</td>
              <td>5</td>
              <td>5</td>
              <td>RNA sequencing</td>
              <td colspan=2>/</td>
               <td>5</td>
              <td>ZhongShan<br>Hospital</td>
              <td>unpublished</td>
          </tr>
     </table>
<?php
    }
    
    public function browseTable()
    {
?>
        <center>
        <table class='docTable'>
            <tr>
                <th>Fields</td>
                <th>Description</td>
            </tr>
            <tr>
                <td>Model</td>
                <td>the unique key of model in the database</td>
            </tr>
            <tr>
                <td>Subtype</td>
                <td>histopathologic subtype of primary patient tumor</td>
            </tr>
            <tr>
                <td>TNM</td>
                <td>clinical TNM stage of primary patient tumor</td>
            </tr>
            <tr>
                <td>Grade</td>
                <td>tumor grade of primary patient tumor</td>
            </tr>
            <tr>
                <td>Type</td>
                <td>primary patient tumor was primary or metastatic or recurrence</td>
            </tr>
            <tr>
                <td>HBV</td>
                <td>if primary patient was infected with HBV</td>
            </tr>
            <tr>
                <td>HCV</td>
                <td>if primary patient was infected with HCV</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>gender of primary patient</td>
            </tr>
            <tr>
                <td>Age</td>
                <td>age of primary patient</td>
            </tr>
            <tr>
                <td>Resource</td>
                <td>data set that model came from</td>
            </tr>
            <tr>
                <td>Method</td>
                <td>model of transplantation</td>
            </tr>
            <tr>
                <td>Tissue</td>
                <td>location of primary patient tumor</td>
            </tr>
        </table>
        </center>
<?php
    }
    
    public function drugTable()
    {
?>
        <center>
        <table class='docTable'>
            <tr>
                <th>Fields</td>
                <th>Description</td>
            </tr>
            <tr>
                <td>Model</td>
                <td>the unique key of model in the database</td>
            </tr>
            <tr>
                <td>Drug</td>
                <td>name of drug</td>
            </tr>          
            <tr>
                <td>Passage</td>
                <td>generation of mice with drug experiment</td>
            </tr>
            <tr>
                <td>TGI</td>
                <td>tumor growth inhibition: the ratio of tumor volume change</td>
            </tr>
            <tr>
                <td>Unit</td>
                <td>Dosage of each administration</td>
            </tr>
            <tr>
                <td>Modes</td>
                <td>method of drug delivery</td>
            </tr>
            <tr>
                <td>UnitInterval</td>
                <td>time of administration interval</td>
            </tr>
            <tr>
                <td>Duration</td>
                <td>duration of treatment</td>
            </tr>
            <tr>
                <td>Tissue</td>
                <td>location of primary patient tumor</td>
            </tr>
            <tr>
                <td>Grade</td>
                <td>tumor grade of primary patient tumor</td>
            </tr>
            <tr>
                <td>Subtype</td>
                <td>histopathologic subtype of primary patient tumor</td>
            </tr>
            <tr>
                <td>TNM</td>
                <td>clinical TNM stage of primary patient tumor</td>
            </tr>
             <tr>
                <td>HBV</td>
                <td>if primary patient was infected with HBV</td>
            </tr>
            <tr>
                <td>HCV</td>
                <td>if primary patient was infected with HCV</td>
            </tr>
             <tr>
                <td>Resource</td>
                <td>data set that model came from</td>
            </tr>
        </table>
        </center>
<?php
    }   
    public function snpTable()
    {
?>       <center>
          <table class='docTable'>
            <tr>
                <th>Fields</td>
                <th>Description</td>
            </tr>
            <tr>
                <td>Model</td>
                <td>the unique key of model in the database</td>
            </tr>
            <tr>
                <td>GeneType</td>
                <td>genotype of model</td>
            </tr>            
            <tr>
                <td>Passage</td>
                <td>generation of model</td>
            </tr>
            <tr>
                <td>Method</td>
                <td>model of transplantation</td>
            </tr>
            <tr>
                <td>Tissue</td>
                <td>location of primary patient tumor</td>
            </tr>
             <tr>
                <td>TNM</td>
                <td>clinical TNM stage of primary patient tumor</td>
            </tr>
              <tr>
                <td>Grade</td>
                <td>tumor grade of primary patient tumor</td>
            </tr>
               <tr>
                <td>HBV</td>
                <td>if primary patient was infected with HBV</td>
            </tr>
            <tr>
                <td>HCV</td>
                <td>if primary patient was infected with HCV</td>
            </tr>
             <tr>
                <td>Subtype</td>
                <td>histopathologic subtype of primary patient tumor</td>
            </tr>
             <tr>
                <td>Resource</td>
                <td>data set that model came from</td>
            </tr>
          </table>
          </center>
<?php
    }
}