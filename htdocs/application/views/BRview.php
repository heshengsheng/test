<?php
require_once("templates/Common.php");

$common = new Common();
$css = ["zTreeStyle.css", "jquery.dataTables.css"];
$jss = ["jquery.ztree.core.min.js","jquery.ztree.excheck.min.js","jquery.dataTables.min.js","browse.js"];
$scripts = "<script>
               var para = 'api/BR?' + window.location.href.split('?')[1];
		//alert(para);
		 $.ajax({
			 url: para,
			  type: 'post',
			  dataType:'JSON',
			  data: {action: 'query'},
			  success:function(msg){
				 //alert(msg);
				 $('#bResult').DataTable({
					 data:msg,
					 'columns':[
						   {'data':'pdxKey'},         	              
						   {'data':'subtype'},
						   {'data':'TNMstage'},
						   {'data':'differentiation'},
						   {'data':'type'},
						   {'data':'HBV'},
						   {'data':'HCV'},
						   {'data':'gender'},
						   {'data':'age'},
						   {'data':'resource'},
						   {'data':'method'},
						   {'data':'tissue'}
				  ],
				   'columnDefs': [
                    {
                       'targets': [0],
                       'data': 'pdxKey',
                       'render': function(data, type, full) {
					   //alert(data);
                       return '<a href=\'/search/model?para='+data+'\'>'+data+'</a>';
                        }
                    }],
				 'sScrollX':'80%'
				 });
			 }
		 });
      </script>
";
echo $common->header($css,$scripts);
?>
    <table id="bResult" class="display" >
        <thead>
			<tr>
				<th title='the unique key of model in the database'>Model</th>
				<th title='histopathologic subtype of primary patient tumor'>Subtype</th>
				<th title='subtypeclinical TNM stage of primary patient tumor'>TNM</th>
				<th title='tumor grade of primary patient tumor'>Grade</th>
				<th title='primary patient tumor was primary or metastatic or recurrence'>Type</th>
				<th title='if primary patient was infected with HBV'>HBV</th>
				<th title='if primary patient was infected with HCV'>HCV</th>
				<th title='gender of primary patient'>Gender</th>
				<th title='age of primary patient'>Age</th>
				<th title='data set that model came from'>Resource</th>
				<th title='model of transplantation'>Method</th>
				<th title='location of primary patient tumor'>Tissue</th>
			</tr>
        </thead>
    </table>
<?php
echo $common->footer($jss);
