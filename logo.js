
		$(document).ready(function(){
			$("#logo1").mouseover(function(){
				$("#logo1").fadeOut(1000).fadeIn(600);	
			});		
		
			$("#logo2").mouseover(function(){
				$("#logo2").fadeOut(1000).fadeIn(600);	
			});
			
			$("#logo3").mouseover(function(){
				$("#logo3").fadeOut(1000).fadeIn(600);		
			});	
		
			$("#air_name").mouseover(function(){
				$("#air_name").animate({opacity: '0.1'},1000)
							  .animate({opacity: '1'},1000);					
			});
			
			$("#ht").mouseover(function(){
				$("#ht").animate({opacity: '0.1'},1000)
						.animate({opacity: '1'},1000);					
			});
			
			$("#add1").mouseover(function(){
				$("#add1").animate({opacity: '0.1'},500)
						  .animate({opacity: '1'},500);					
			});
			
			$("#add2").mouseover(function(){
				$("#add2").animate({opacity: '0.1'},500)
						  .animate({opacity: '1'},500);					
			});
			
			$("#add3").mouseover(function(){
				$("#add3").animate({opacity: '0.1'},500)
						  .animate({opacity: '1'},500);					
			});
			
			$("#add4").mouseover(function(){
				$("#add4").animate({opacity: '0.1'},500)
						  .animate({opacity: '1'},500);					
			});
			
			$("#add5").mouseover(function(){
				$("#add5").animate({opacity: '0.1'},500)
						  .animate({opacity: '1'},500);					
			});
			
			$("#add6").mouseover(function(){
				$("#add6").animate({opacity: '0.1'},500)
						  .animate({opacity: '1'},500);					
			});

			$("#r11").on("click",function(){
					$("#res").fadeOut(1000);
			});
			
			$("#r12").on("click",function(){
					$("#res").fadeIn(1000);
			});
			
		});
