$(document).ready(function(){
    layOut();
    javascript:window.history.forward(1); 
    var zTreeObj;
	var setting = {
			check: {
				enable: true,
				autoCheckTrigger: true
			},
			view: {
                 showLine: false
            },
            callback:{
                beforeChech:isCheckable,
                onCheck:checkMutation
            }
		};
		zTreeNodes = [
		{"id":1,"name":"Expression",open:true,checked:false},
		{"id":2,"name":"Copy-number alterations",open:true,chkDisabled:true},
		{"id":3,"name":"Mutations in driver genes",open:false,chkDisabled:false,children:[
                    {"name":"ACVR2A",chkDisabled:false},
                    {"name":"ADH1B",chkDisabled:false},
                    {"name":"ALB",chkDisabled:false},
                    {"name":"APOB",chkDisabled:false},
                    {"name":"ARID1A",chkDisabled:false},
                    {"name":"ARID2",chkDisabled:false},
                    {"name":"AXIN1",chkDisabled:false},
                    {"name":"BAP1",chkDisabled:false},
                    {"name":"BRD7",chkDisabled:false},
                    {"name":"CCND1",chkDisabled:false},
                    {"name":"CDKN1A",chkDisabled:false},
                    {"name":"CDKN2A",chkDisabled:false},
                    {"name":"CDKN2B",chkDisabled:false},
                    {"name":"CTNNB1",chkDisabled:false},
                    {"name":"CYP2E1",chkDisabled:false},
                    {"name":"EEF1A1",chkDisabled:false},
                    {"name":"FCRL1",chkDisabled:false},
                    {"name":"FGF19",chkDisabled:false},
                    {"name":"G6PC",chkDisabled:false},
                    {"name":"GALNT11",chkDisabled:false},
                    {"name":"GRXCR1",chkDisabled:false},
                    {"name":"HIST1H1C",chkDisabled:false},
                    {"name":"HNF1A",chkDisabled:false},
                    {"name":"HNRNPA2B1",chkDisabled:false},
                    {"name":"IDH1",chkDisabled:false},
                    {"name":"IL6ST",chkDisabled:false},
                    {"name":"IRX1",chkDisabled:false},
                    {"name":"KIF19",chkDisabled:false},
                    {"name":"LCE1E",chkDisabled:false},
                    {"name":"MAP2K3",chkDisabled:false},
                    {"name":"MEN1",chkDisabled:false},
                    {"name":"NCOR1",chkDisabled:false},
                    {"name":"NFE2L2",chkDisabled:false},
                    {"name":"PDX1",chkDisabled:false},
                    {"name":"PTEN",chkDisabled:false},
                    {"name":"RB1",chkDisabled:false},
                    {"name":"RPS6KA3",chkDisabled:false},
                    {"name":"SOCS6",chkDisabled:false},
                    {"name":"SRCAP",chkDisabled:false},
                    {"name":"TERT",chkDisabled:false},
                    {"name":"TMEM99",chkDisabled:false},
                    {"name":"TP53",chkDisabled:false},
                    {"name":"TRPA1",chkDisabled:false},
                    {"name":"TSC1",chkDisabled:false},
                    {"name":"TSC2",chkDisabled:false}
            ]}
			
		];
    
     zTreeObj = $.fn.zTree.init($("#selectProfile"), setting, zTreeNodes);
     chooseNode(zTreeObj);
     clickExample(zTreeObj);
    
});

function isCheckable(e,treeID,treeNode) {
   var treeObj = $.fn.zTree.getZTreeObj(treeID);
    var value = $("#selectDataset select:first").val();
    alert(value);
    if (value == 'DataSet1') {
        treeObj.getNodeByParam("id", 2, null).chkDisabled = true;
    }else if (value == 'DataSet2') {
        treeObj.getNodeByParam("id", 2, null).chkDisabled = false;
        treeObj.getNodeByParam("id", 3, null).chkDisabled = false;
    }else if (value == 'DataSet3') {
        treeObj.getNodeByParam("id", 1, null).chkDisabled = false;
        treeObj.getNodeByParam("id", 3, null).chkDisabled = true;
        treeObj.getNodeByParam("id", 3, null).chkDisabled = true;
    }
}
function checkMutation(e,treeID,treeNode) {
    var parentN = treeNode.getParentNode();   
   if (parentN) {   //判断是否为mutation，如果是mutation，则不能选择输入基因或者上传文件
         if (parentN.checked) {
            $("#heatMapPage textarea:first").val('');
             $("#heatMapPage #file1").val('');
            $("#heatMapPage textarea:first").attr("disabled","disabled");
            $("#example1").attr("disabled","disabled");
            $("#heatMapPage #file1").attr("disabled","disabled");
         }
         else{
            $("#heatMapPage textarea:first").attr("disabled",false);
            $("#example1").attr("disabled",false);
            $("#heatMapPage #file1").attr("disabled",false);
         }        
   }else{//每次只能选择一个dataset
      var treeObj = $.fn.zTree.getZTreeObj(treeID);
       var nodeStatus = treeNode.checked;
       var ID = treeNode.id;
       for(var i=1;i<4;i++){
         if (i != ID) {
             treeObj.checkNode(treeObj.getNodeByParam("id", i, null), false, true);
            //$(i).prop('checked', false); 
         }
       }
   }
   
}
function chooseNode(zTreeObj){
	var node1 = zTreeObj.getNodeByParam("id", 1, null);
	var node2 = zTreeObj.getNodeByParam("id", 2, null);
	var node3 = zTreeObj.getNodeByParam("id", 3, null);
    var childNodes = node3.children;
    var len = childNodes.length;
	$("#selectDataset select:first").change(function(){
		   var value = $(this).val();
		   if(value == 'DataSet1'){
		   	   zTreeObj.checkAllNodes(false);
                node1.chkDisabled = false;
		   	   //zTreeObj.checkNode(node1, true, true);
		       node2.chkDisabled = true;
		       node3.chkDisabled = false;
               for(var i=0;i<len;i++){
                   childNodes[i].chkDisabled = false;
               }
		   }else if(value == 'DataSet2'){	
		   	   //alert(node3.name);
               zTreeObj.checkAllNodes(false);
                node1.chkDisabled = false;
		       node2.chkDisabled = false;
		       node3.chkDisabled = false;
               for(var i=0;i<len;i++){
                   childNodes[i].chkDisabled = false;
               }
		      // zTreeObj.checkAllNodes(true);		       
		   }else if(value == 'DataSet3'){
                zTreeObj.checkAllNodes(false);
                 node1.chkDisabled = false;
                 node2.chkDisabled = true;
                 node3.chkDisabled = true;
                 for(var i=0;i<len;i++){
                   childNodes[i].chkDisabled = true;
               }
           }
     });    
}

function clickExample(zTreeObj) {
    $("#example1").click(function(){
        if ($("#heatMapPage #file1").val() == '') {
            var text = "ARMC6,ARMC9 H2-DMb1 Mir6356  Xirp2  TRNA_Leu Triap1 Ddx19b Pyroxd2  Zfp53 Il2  Olfr12 Mir1187 Ttn Crnkl1 Spink13 Fgf5 Vwa5b2 Snora16a Evpl Tmem95 Gal3st4 Vmn2r108 Astn2 Rgs2 Prim2 Mthfd2l Rpusd3 TRNA_Lys Mief1 Mir124a-3";
            $(this).next().val(text);
        }
        else{
            alert("You had choosen a file");
        }  
    });
    $("#hms p a:first").click(function(){
       window.open ('/documentation#HeatMap', 'newwindow', 'height=600,toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no,status=no')
    });
    $("#heatMapPage textarea:first").focus(function(){
        if ($("#heatMapPage #file1").val() != '') {
            alert("You had choosen a file");
            $(this).blur();
            //event.preventDefault();
        }
    });
    $("#heatMapPage #file1").click(function(){
        if ($("#heatMapPage textarea:first").val() !='') {
           alert("You had entered some genes");
           event.preventDefault();
        }
    });
    $("#heatMapPage button").click(function(){
       if ($(this).text() == 'submit') {
        
             var dataSet = $("#heatMapPage select:first option:selected").text();
             var profile = '';
             var mutationGene = '';
             var genes = '';
             var nodes = zTreeObj.getCheckedNodes(true);
             if (nodes.length == 0) {
                alert("Please select at least one Data Type!");
             }else{
                for(var i=0;i<nodes.length;i++){
                    if (nodes[i].getParentNode()) {
                        mutationGene = mutationGene + "," + nodes[i].name;
                    }else{
                        profile = profile+","+nodes[i].name;                    
                    }
                }
                profile = profile.substr(1);
                mutationGene = mutationGene.substr(1);
                if (profile.indexOf('Expression')>-1 || profile.indexOf('Copy-number alterations')>-1) {
                        if ($("#heatMapPage textarea:first").val()==''&&$("#heatMapPage #file1").val()=='') {
                           alert("Please enter some gene symbol or upload a file firstly");
                        }
                        else{
                                if($("#heatMapPage textarea:first").val() != '') {
                                  genes= $("#heatMapPage textarea:first").val();
                                  // window.location.href
                                  //var url ="/HeatMap/profile?dataset="+dataSet+"&profile="+profile+"&mutationGene="+mutationGene+"&genes="+genes;                                         
                                  var url ="/test?dataset="+dataSet+"&profile="+profile+"&mutationGene="+mutationGene+"&genes="+genes;                                                                      
                                  //window.open( url ,'_blank')
                                  window.location.href = url;
                                   }
                                else{
                                   $.ajaxFileUpload({
                                        url: '/api/HR/fileUpload', //用于文件上传的服务器端请求地址
                                        cache: false,
                                        async: false,
                                        type: 'post',
                                        data: {action: 'query'},
                                        secureuri: false, //是否需要安全协议，一般设置为false
                                        fileElementId: 'file1', //文件上传域的ID
                                        dataType: 'json', //返回值类型 一般设置为json
                                        success: function (data)  //服务器成功响应处理函数
                                        {
                                            //console.log(data);
                                            genes =  JSON.stringify(data.file_infor);
                                            //console.info(genes);
                                           // alert(data.file_infor);
                                          //window.location.href ="/HeatMap/profile?dataset="+dataSet+"&profile="+profile+"&mutationGene="+mutationGene+"&genes="+genes; 
                                        window.location.href ="/Test?dataset="+dataSet+"&profile="+profile+"&mutationGene="+mutationGene+"&genes="+genes; 
                                        }
                                   });
                                }
                        }
                }else{
                   // window.location.href ="/HeatMap/profile?dataset="+dataSet+"&profile="+profile+"&mutationGene="+mutationGene+"&genes="+genes; 
                     window.location.href ="/Test?dataset="+dataSet+"&profile="+profile+"&mutationGene="+mutationGene+"&genes="+genes; 
                }
             }                      
        }else if ($(this).text() == 'reset') {
            $("#heatMapPage select:first").val('DataSet1');
             zTreeObj.checkAllNodes(false);
             $("#heatMapPage textarea:first").val('');
             $("#heatMapPage #file1").val('');
        }
           
    });
}

function  ajaxFileUpload(){
     $.ajaxFileUpload
            (
                {
                    url: '/api/HR/fileUpload', //用于文件上传的服务器端请求地址
                    async:false,
                    secureuri: false, //是否需要安全协议，一般设置为false
                    fileElementId: 'file1', //文件上传域的ID
                    dataType: 'json', //返回值类型 一般设置为json
                    success: function (data)  //服务器成功响应处理函数
                    {
                        genes =  data.file_infor;
                        
                       // alert(data.file_infor);
                    }
                }
            )
            console.info(genes);             
}

function layOut(){
     var tempWidth = $('#grid').width();
     var len = (tempWidth-380) + 'px';
     $("#hmResult").css({'width':len});
     $("#hmResult img").css({'width':'100%'})
      $(window).resize(function() {
            var tempWidth = $('#grid').width();
            var len = (tempWidth-380) + 'px';
            $("#hmResult").css({'width':len});
            $("#hmResult img").css({'width':'100%'})
    });
}
