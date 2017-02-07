<?php
require_once("templates/Common.php");

$common = new Common();

$css = ["zTreeStyle.css"];
$jss = ["jquery.ztree.core.min.js","jquery.ztree.excheck.min.js","ajaxfileupload.js","heatmap2.js"];
echo $common->header($css);
?>
<div id="heatMapPage">
     
        <div id="hms">
             <div id="selectDataset">
                <h5>Select DataSet:</h5>
                <select>
                  <option selected>DataSet1</option>
                  <option>DataSet2</option>
                  <option>DataSet3</option>
                </select>      
                <h4>Select Data Type:</h4>            
                <div id="selectProfile"  class="ztree">             
               </div>                                  
             </div>     
             <h5>Enter Multiple Gene Symbol</h5>
             <button id='example1'>example</button>
             <textarea placeholder="gene symbol (division by comma or space)"></textarea>        
             <h5>or Upload a File </h5>
            <p>according to <a>this format</a></p>
             <input type="file" id="file1" name="file1"/>
              
             <br>
             <button>submit</button>
             <button>reset</button>
        </div>
        <div id="hmResult">
            <h1>Read Me</h1>  
            <p>
                In this page, you can view data with heatMap. Firstly, you should 
                choose a data set such as ZhongShan Hospital. The type of 
                heatMap that each data set can draw is different. For example, the 
                data set from ZhongShan Hospital can only draw expression heatmap, 
                and the data set from WuXi AppTech can draw copy number variants and 
                mutation addition.
                </p><p>            
                After choosing a data set, then you should provide some genes you are 
                interested in, or upload a file, where gene symbols should separate by
                 Tab. If you want to  draw a mutation heatmap, the list of
                 gene symbols which are significant mutation in liver cancer is given.
            </p>
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
            
        </div>
      </div>
<?php
echo $common->footer($jss);