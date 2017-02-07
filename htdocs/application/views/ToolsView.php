<?php
require_once("templates/Common.php");

$common = new Common();

$css = [];
$jss = ["ajaxfileupload.js"];
echo $common->header($css);
?>
<script>
    $(document).ready(function(){
        $('input[id=lefile]').change(function() {  
              $('#photoCover').val($(this).val());  
         });
          $('#toolPage .submit').click(function(){
           window.location.href = "/Tools/PredictResult"
           /*   $.ajax({
			 url: '/Tools/fileUpload',
			  type: 'post',
			  dataType:'JSON',
              success:function(msg){
				   result = JSON.stringify(msg.file_infor);
                   window.location.href ="/Tools/PredictResult?result="+result; 
              }
			  })*/
                    
          });
    })
</script>
 <div id="toolPage">
	<h4 >Predict Drug Response by Expression Data</h4>
	<p class="toolTip">In this page, a tool to predict drug response detaily Tumor Growth Inhibition (TGI) was provided
	with the expression profile data of models. Currently there only sorafenib was available and more drug for liver cancer
	would be added. The format of upload file should follow some conditions: row represented genes; column represented samples (models);
	expression value separated by Tab.
	</p>
	<p class="toolTip">Tips: Considering the speed of calculation, the maximum number of samples (models) should be not more than 50.</p>
   <p>step 1: choose drug</p>
     <select>
        <option>sorafenib</option>
     </select>
     <br><br>
    <p>step 2: Upload file of expression profile</p>
     <input id="lefile" type="file" style="display:none" name="lefile">  
<div class="input-append">  
    <input id="photoCover" class="input-large" type="text" autocomplete="off" >  
    <a class="btn" onclick="$('input[id=lefile]').click();">Browse</a>  
</div>
    <br>
     <p>step 3: submit file</p>
     <button class="submit">submit</button><span><button class="reset">reset</button></span>
 </div>
<?php
echo $common->footer($jss);



