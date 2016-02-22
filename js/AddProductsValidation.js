$(document).ready(function(){
		// Initialize Tooltip
		$('[data-toggle="tooltip"]').tooltip(); 


	$('#save').on("click",function(){

			if($('#product').val() == null || $('#product').val() ==""){
					alert("Please Enter product name");
					return false;
			}
			else if($('#product').val().length < 6 || $('#product').val().length > 20 ){
					alert("please enter name between 6 and 20 charachter");
					return false;
			}
			if($('#price').val() == null || $('#price').val() == ""){
				if($('#price').val() < 0){
					//please fill price
					alert("Please Enter valide product price hint:'greater than 0'");
					return false;
				}else{
					alert("Please Enter product price");
					return false;
				}
			}
			
			if($('#category').val() == null || $('#category').val() == ""){
				alert("Please Enter product category");
				return false;
			}
			
			if($('#product-picture').val() == null || $('#product-picture').val() == ""){
				alert("Please Enter product picture");
				return false;
			} 
		
			});
		});
