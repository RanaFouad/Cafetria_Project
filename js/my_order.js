$(function(){
	console.log("hy");
	var spanmark=document.getElementsByClassName('glyphicon glyphicon-plus');
	$(".glyphicon glyphicon-plus").click(function(){
		//$("spanmark").removeClass("glyphicon glyphicon-plus");
		//$("spanmark").addClass("glyphicon glyphicon-minus");
		   $("spanmark").toggleClass("glyphicon glyphicon-plus","glyphicon glyphicon-minus");  

		
	});
});

