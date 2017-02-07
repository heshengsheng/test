<?php
require_once("templates/Common.php");

$common = new Common();

$css = ['jheatmap.css'];
//$jss = ['jquery.jheatmap.js'];
$jss = ['jheatmap-1.0.0.js'];
$scripts = "<script>
   
    $(document).ready(function(){
             //alert('dasdsaf');
            var tempWidth = $('#grid').width();
            if (tempWidth>961){
                var len = ((tempWidth - 961)/2+10);
                  
                 len = len + 'px';
                    $('#legends').css({'margin-left':len});
            }else
            {
                     $('#legends').css({'margin-left':'60px'});
            }
            $(window).resize(function() {
               //alert($('#grid').width());
               var width = $(window).width();
               if(width > 961){
                  var len = (($('#grid').width() - 961)/2 + 10) + 'px';
                  //alert(len);
                 $('#legends').css({'margin-left':len});
               }else{
                  $('#legends').css({'margin-left':'60px'});
               }
            });
            var para = '/api/HR/profileData/?' + window.location.href.split('?')[1];
            var profile = window.location.href.split('?')[1].split('&')[1].split('=')[1];
            $('#map').heatmap({
                     data: {
                            values: new jheatmap.readers.TableHeatmapReader({ url: para})
                      },
                     init:function(heatmap){
                        heatmap.cells.decorators['Expression'] = new jheatmap.decorators.Heat({
                           minValue: -5,
                           midValue: 0,
                           maxValue: 5,
                          minColor: [85, 0, 136],
                           nullColor: [255,255,255],
                           maxColor: [255, 204, 0],
                           midColor: [240,240,240]
                        });
                         heatmap.cells.decorators['CNV'] = new jheatmap.decorators.Heat({
                           minValue: -2,
                           midValue: 0,
                           maxValue: 2,
                          minColor:[0,0,255],
                           nullColor: [255,255,255],
                           maxColor: [255,0,0],
                           midColor:  [255,255,255]
                       });
                         heatmap.cells.decorators['Mutation'] = new jheatmap.decorators.Heat({
                           minValue: 0,
                           midValue: 1,
                           maxValue: 2,
                           minColor: [41,226,147],
                           nullColor: [255,255,255],
                           maxColor: [43,87,206],
                           midColor: [229,45,71]                       
                       });
                        if(profile == 'Expression'){
                           $('#legends img:first').attr('src','/static/images/expression_legend.png');
                           $('#legends p:first').html('-5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5');
                        }else if(profile == 'Mutation'){
                            $('#legends img:first').attr('src','/static/images/mutation_legend.png');
                        }else{
                           $('#legends img:first').attr('src','/static/images/cnv_legend.png');
                            $('#legends p:first').html('-2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2');
                        }
                      }
             });
            

      });
 </script>
";
echo $common->header($css,$scripts);
?>
         <script>
            $(document).ready(function(){
      
               
            });
         </script>
            <div id='legends'>
               <img/>
               <p></p>
            </div>
               <div id='map'></div>
            
            
<?php
echo $common->footer($jss);