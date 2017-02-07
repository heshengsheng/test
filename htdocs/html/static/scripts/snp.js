$(document).ready(function(){
      var para = "/api/SR?" + window.location.href.split("?")[1];
      $.ajax({
	       	url: para,
	       	 type: 'post',
	       	 dataType:'JSON',
             success:show
	    });
});

function show(msg) {
    var result = eval(msg);
    var title = result[0];
    var tablesInfo = eval(result[1]);   
    //alert(tablesInfo);
    
    var text = "<b>ref.gene:</b> "+title.symbol+
    "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" +
 	"<b>ref.gene function:</b>    " + title.func +
 	"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" +
 	"<b>chrom:</b>   chr"+ title.chrom +
 	"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" +
 	"<b>position:</b>    "+ title.pos +
 	"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" +
 	"<b>ref:</b>   "+ title.ref +
 	"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" +
 	"<b>alt:</b>    "+ title.alt +"";
    $("#snpInfo").html(text);
    $("#sResult").DataTable({
                    data:tablesInfo,
                    "columns":[
                        {'data':'pdxKey'},
                        {'data':'geneType'},                      
                        {'data':'passage'},
                        {'data':'method'},
                        {'data':'tissue'},
                        {'data':'TNMstage'},
                        {'data':'differentiation'},
                        {'data':'HBV'},
                        {'data':'HCV'},
                        {'data':'subtype'},
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
                "sScrollX":"80%"
     });
}