<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>histogramme</title>
	<link rel="stylesheet" type="text/css" href="chart/chart.min.css">
	<script type="text/javascript" src="chart/chart.min.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
  <h1>Histogramme de la location par mois de l'année <?php echo date('Y') ?></h1>
 <div id="chart-container" style="width: 500px;height: 400px;"> 
    <canvas id="mycanvas"  style="width: 450px;height: 350px;"></canvas> 
 </div> 
<script type="text/javascript"  language="javascript"> 
$(document).ready(function(){ 
$.ajax({      
   url:"sary2.php", 
   type:"GET",
   //dataType:'json', 
  success:function(data) 
  { 
 	//console.log(data);
    var location = []; 
   // var mois = [];
    var json_obj = JSON.parse(data); //parse JSON 
              for(var i in json_obj)
                { 
                   location.push(json_obj[i].nombre); 
                   //mois.push(json_obj[i].mois);
                } 
var chartdata= 
{ 
       labels:["janvier","fevrier","mars","avril","mai","juin","juillet","aout","septembre","octobre","novembre","decembre"],
       datasets:
	    [
	     {
	  label:"Contrat: ",
	   backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#DE3163","#E73E01","#800080","#1B4F08","#00FF00","#370028","#9E0E40"],
	   data:location
         } 
        ] 
};
   var options= { 
            legend:{ display: false },      
             title:{ display: true,         
              text: 'Nombre de contrat par mois'}} ;
   var canvas=$("#mycanvas"); 
   var barGraph = new Chart(canvas,{type:'bar',data:chartdata,options:options});
  }, 
  error: function(data) 
  { 
  	console.log('il y a un erreur');
  } 
 }); 
 
}); 
</script> 
</body>
</html>