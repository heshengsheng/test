<?php
require_once("templates/Common.php");

$common = new Common();
$css = ["jquery.dataTables.css"];
$jss = ["jquery.dataTables.min.js"];
$scripts = "<script>
              var para = '/api/DR?' + window.location.href.split('?')[1];
		//alert(para);
		 $.ajax({
			 url: para,
			  type: 'post',
			  dataType:'JSON',
			  success:function(msg){
				 $('#dResult').DataTable({
					 data:msg,
					 'columns':[
						   {'data':'pdxKey'},
						   {'data':'drug'},						  
						   {'data':'passage'},
						   {'data':'TGI'},					  
						   {'data':'modes'},
						    {'data':'unit'},
						   {'data':'unitInterval'},
						   {'data':'duration'},
						   {'data':'tissue'},
						   {'data':'differentiation'},
						   {'data':'subtype'},
						   {'data':'TNMstage'},
						   {'data':'HBV'},
						   {'data':'HCV'},
						   {'data':'resource'}
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
		<table id="dResult" class="display" >
		  <thead>
			<th title='the unique key of model in the database'>Model</th>
			<th title='name of drug'>Drug</th>		
			<th title="generation of mice with drug experiment">Passage</th>
			<th title='tumor growth inhibition: the ratio of tumor volume change'>TGI(%)</th>
			<th title='method of drug delivery'>Modes</th>
			<th title='Dosage of each administration'>Dose</th>		
			<th title='time of administration interval'>Frequency</th>
			<th title='duration of treatment'>Duration</th>
			<th title='location of primary patient tumor'>Tissue</th>
			<th class='tumor grade of primary patient tumor'>Grade</th>
			<th title='histopathologic subtype of primary patient tumor'>Subtype</th>
			<th title='clinical TNM stage of primary patient tumor'>TNM</th>
			<th title='if primary patient was infected with HBV'>HBV</th>
			<th title='if primary patient was infected with HCV'>HCV</th>
			<th title='>data set that model came from'>Resource</th>
		  </thead>
		</table>

<?php
echo $common->footer($jss);