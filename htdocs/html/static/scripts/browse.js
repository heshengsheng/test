$(document).ready(function(){
    layOut();
    var zTreeObj;
	var setting = {
			check: {
				enable: true,
				autoCheckTrigger: true
			}
		};
		zTreeNodes = [
		{"name":"subtype",open:true,checked:true,children: [
		   { "name":"Hepatocellular carcinoma",checked:true},
		   { "name":"Cholangiocarcinoma"},
		   { "name":"Carcinosarcoma"},
		   { "name":"Hepatoid adenocarcinoma"},
		   { "name":"Gastric hepatoid cancer"},
		   { "name":"Mixed cancer"}
		]},
		{"name":"virus",open:true,children: [
		   { "name":"HBV"},
		   { "name":"HCV"},
		   { "name":"no HBV/HCV infect"}
		]},
		{"name":"TNM stage",open:true,children: [
		   { "name":"I"},
		   { "name":"II"},
		   { "name":"III"},
		   { "name":"IIIA"},
		   { "name":"IIIB"},
		   { "name":"IIIC"},
		   { "name":"IVA"},		   
		   { "name":"IVB"},
		]},
        {"name":"grade",open:true,children: [
		   { "name":"I"},
		   { "name":"II"},
		   { "name":"III"},
		   { "name":"II-III"},
		   { "name":"III-IV"},
		   { "name":"IV"},
		]},
		{"name":"resource",open:true,children: [
		   { "name":"ZhongShan hospital"},
		   { "name":"WuXi AppTech"}
		]}		
		];
        zTreeObj = $.fn.zTree.init($("#tree"), setting, zTreeNodes);
        
        browse(zTreeObj);
});

function browse(zTreeObj)
{
     $("#bMenu button").click(function()
     {
        var checked = zTreeObj.getCheckedNodes();
        if(checked.length == 0)
        {
              alert("Please choose a type firstly");             
        }else
        {
            var subtype="";
            var resource="";
            var virus="";
            var TNMstage="";
            var grade="";
            for(var i=0;i<checked.length;i++)
            {
                if(!checked[i].isParent)
                {
                    var temp = checked[i].getParentNode().name;  //obtain name of parent node
                    if(temp == "subtype")    //judge the type of node
                    {
                        subtype = subtype +"+,\'"+ checked[i].name +"\'";
                    }
                    else if(temp == "virus")
                    {
                        virus = virus + "+," + checked[i].name;
                    }
                    else if(temp == "resource")
                    {
                        resource = resource + "+,\'"+ checked[i].name  + "\'";
                    }
                    else if(temp == "TNM stage")
                    {
        		        TNMstage = TNMstage +"+,\'"+ checked[i].name +"\'";
        		    }
                    else if(temp == "grade")
                    {
        		        grade = grade +"+,\'"+ checked[i].name +"\'";
        		    }
                }
            }
            subtype = subtype.substring(2);      
            resource = resource.substring(2);
            virus = virus.substring(2);
            TNMstage = TNMstage.substring(2);
            grade = grade.substring(2);
            //alert(subtype+"\n"+resource+"\n"+virus+"\n"+TNMstage);
            window.location.href = "BR?subtype="+subtype+"&resource="+resource+"&virus="+virus+"&TNMstage="+TNMstage+"&grade="+grade;
           //  $.ajax({
	       	// url: 'Browse/bSearch',
	       	 //type: 'post',
	       	// dataType:'JSON',
	       //	 data: {"subtype":subtype,"resource":resource,"virus":virus,"TNMstage":TNMstage},
	       //});
        }
     });
}


function show(msg)
{
    $("#example").DataTable({
        data:msg,
        "columns":[
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
        ]
    });	     	
}

function layOut() {
     var tempWidth = $('#grid').width();
           var bTipWidth = (tempWidth - 380)+'px';
           $('#bTip').css({'width':bTipWidth});
            $(window).resize(function() {
               //alert($('#grid').width());
               var bTipWidthV = ($('#grid').width() - 380) + 'px';
               $('#bTip').css({'width':bTipWidthV});
            });
}