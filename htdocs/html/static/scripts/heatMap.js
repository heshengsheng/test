$(document).ready(function(){
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
		{"id":3,"name":"Mutation",open:false,chkDisabled:true,children:[
		    {"name":"ACVR2A",chkDisabled:true},
            {"name":"ADH1B",chkDisabled:true},
            {"name":"ALB",chkDisabled:true},
            {"name":"APOB",chkDisabled:true},
            {"name":"ARID1A",chkDisabled:true},
            {"name":"ARID2",chkDisabled:true},
            {"name":"AXIN1",chkDisabled:true},
            {"name":"BAP1",chkDisabled:true},
            {"name":"BRD7",chkDisabled:true},
            {"name":"CCND1",chkDisabled:true},
            {"name":"CDKN1A",chkDisabled:true},
            {"name":"CDKN2A",chkDisabled:true},
            {"name":"CDKN2B",chkDisabled:true},
            {"name":"CTNNB1",chkDisabled:true},
            {"name":"CYP2E1",chkDisabled:true},
            {"name":"EEF1A1",chkDisabled:true},
            {"name":"FCRL1",chkDisabled:true},
            {"name":"FGF19",chkDisabled:true},
            {"name":"G6PC",chkDisabled:true},
            {"name":"GALNT11",chkDisabled:true},
            {"name":"GRXCR1",chkDisabled:true},
            {"name":"HIST1H1C",chkDisabled:true},
            {"name":"HNF1A",chkDisabled:true},
            {"name":"HNRNPA2B1",chkDisabled:true},
            {"name":"IDH1",chkDisabled:true},
            {"name":"IL6ST",chkDisabled:true},
            {"name":"IRX1",chkDisabled:true},
            {"name":"KIF19",chkDisabled:true},
            {"name":"LCE1E",chkDisabled:true},
            {"name":"MAP2K3",chkDisabled:true},
            {"name":"MEN1",chkDisabled:true},
            {"name":"NCOR1",chkDisabled:true},
            {"name":"NFE2L2",chkDisabled:true},
            {"name":"PDX1",chkDisabled:true},
            {"name":"PTEN",chkDisabled:true},
            {"name":"RB1",chkDisabled:true},
            {"name":"RPS6KA3",chkDisabled:true},
            {"name":"SOCS6",chkDisabled:true},
            {"name":"SRCAP",chkDisabled:true},
            {"name":"TERT",chkDisabled:true},
            {"name":"TMEM99",chkDisabled:true},
            {"name":"TP53",chkDisabled:true},
            {"name":"TRPA1",chkDisabled:true},
            {"name":"TSC1",chkDisabled:true},
            {"name":"TSC2",chkDisabled:true}
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
    if (value == 'Data Set1') {
        treeObj.getNodeByParam("id", 2, null).chkDisabled = true;
        treeObj.getNodeByParam("id", 3, null).chkDisabled = true;
    }else if (value == 'Data Set2') {
        treeObj.getNodeByParam("id", 2, null).chkDisabled = false;
        treeObj.getNodeByParam("id", 3, null).chkDisabled = false;
    }else if (value == 'Data Set3') {
        treeObj.getNodeByParam("id", 1, null).chkDisabled = false;
        treeObj.getNodeByParam("id", 2, null).chkDisabled = false;
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
		   if(value == 'Data Set1'){
		   	   zTreeObj.checkAllNodes(false);
                node1.chkDisabled = false;
		   	   //zTreeObj.checkNode(node1, true, true);
		       node2.chkDisabled = true;
		       node3.chkDisabled = true;
               for(var i=0;i<len;i++){
                   childNodes[i].chkDisabled = true;
               }
		   }else if(value == 'Data Set2'){	
		   	   //alert(node3.name);
               zTreeObj.checkAllNodes(false);
                node1.chkDisabled = false;
		       node2.chkDisabled = false;
		       node3.chkDisabled = false;
               for(var i=0;i<len;i++){
                   childNodes[i].chkDisabled = false;
               }
		      // zTreeObj.checkAllNodes(true);		       
		   }else if(value == 'Data Set3'){
               zTreeObj.checkAllNodes(false);
                node1.chkDisabled = true;
		       node2.chkDisabled = true;
               node3.chkDisabled = false;
               for(var i=0;i<len;i++){
                   childNodes[i].chkDisabled = false;
               }       
		   }	       
     });    
}

function clickExample(zTreeObj) {
    $("#example1").click(function(){
        if ($("#heatMapPage #file1").val() == '') {
            var text = "ARL5C ARL6 ARL6IP1 ARL6IP4 ARL6IP5 ARL6IP6 ARL8A ARL8B ARL9 ARMC1 ARMC10 ARMC12 ARMC2 ARMC3 ARMC4 ARMC5 ARMC6 ARMC7 ARMC8 ARMC9 ARMCX1 ARMCX2 ARMCX3 ARMCX4 ARMCX5 ARMCX6 ARNT ARNT2";
            $(this).next().val(text);
        }
        else{
            alert("You had choosen a file");
        }  
    });
    $("#hms p a:first").click(function(){
       window.open ('/help/webPage#inputFile', 'newwindow', 'height=600,toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no,status=no')
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
                alert("Please check a profile at least!");
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
                           alert("Please enter some gene symbol or upload a file firstlt");
                        }
                        else{
                                if($("#heatMapPage textarea:first").val() != '') {
                                  genes= $("#heatMapPage textarea:first").val();
                                  // window.location.href
                                  var url ="/HeatMap/profile?dataset="+dataSet+"&profile="+profile+"&mutationGene="+mutationGene+"&genes="+genes;                                         
                                  //window.open( url ,'_blank')
                                  window.location.href = url;
                                   }
                                else{
                                   $.ajaxFileUpload({
                                        url: '/api/HR/fileUpload', //用于文件上传的服务器端请求地址
                                        cache: false,
                                        async: false,
                                        type: 'post',
                                        secureuri: false, //是否需要安全协议，一般设置为false
                                        fileElementId: 'file1', //文件上传域的ID
                                        dataType: 'json', //返回值类型 一般设置为json
                                        success: function (data)  //服务器成功响应处理函数
                                        {
                                            //console.log(data);
                                            genes =  JSON.stringify(data.file_infor);
                                            //console.info(genes);
                                           // alert(data.file_infor);
                                           window.location.href ="/HeatMap/profile?dataset="+dataSet+"&profile="+profile+"&mutationGene="+mutationGene+"&genes="+genes; 
                                        }
                                   });
                                }
                         //window.location.href ="/HeatMap/profile?dataset="+dataSet+"&profile="+profile+"&mutationGene="+mutationGene+"&genes="+genes; 
                        }
                }else{
                    window.location.href ="/HeatMap/profile?dataset="+dataSet+"&profile="+profile+"&mutationGene="+mutationGene+"&genes="+genes; 
                }
             }                      
        }else if ($(this).text() == 'reset') {
            $("#heatMapPage select:first").val('Data Set1');
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


