$(document).ready(function(){
    var para = "/api/GR?" + window.location.href.split("?")[1];
    $.ajax({
	       	url: para,
	       	 type: 'post',
	       	 dataType:'JSON',
             success: show
	    });
});


function show(msg)
{
     var result = eval(msg);
     //alert(result);
    google.load('visualization', '1', {packages:['corechart'], callback:drawBarCharts});
     function drawBarCharts(){
	    data = google.visualization.arrayToDataTable(result); 
	    chart = new google.visualization.BarChart(document.getElementById('genePic'));
         rank();     
	}
    function rankSelectHandler(e){
           var selection = chart.getSelection();
           var item = selection[0];   //第几行第几列
           if (item.row != null){
               var model = data.getValue(item.row,0).split("_F")[0];
                window.location.href = "/search/model?para="+model;
      }  
    }
    function rank() { 
      if(data.getNumberOfRows()>0){
          data.sort(1);
          var rankView = new google.visualization.DataView(data);    
          if(data.getNumberOfColumns()==3){
              rankView.setColumns([0, 1]);
          }
          if(data.getNumberOfColumns() == 4){
               rankView.setColumns([0, 1, 3]);
          }
          var options = {
              fontSize:10,
              vAxis: {title: 'Model : Sample', titleTextStyle: {color: 'red'}},
             chartArea:{top:20,bottom:20},
              bar:{groupWidth:10}

          };
          google.visualization.events.addListener(chart, 'select', rankSelectHandler);
	     chart.draw(rankView, options);
         $('#progressBar').hide();
      }
    }
         
}