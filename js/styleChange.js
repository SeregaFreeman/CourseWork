$(document).ready(function(){
	$('#changeStyleButton').click(function(){
		
		$('body').each(function(){
			$(this).toggleClass('first').toggleClass('second');
		});				
				
		$('#sendMessageArea p').each(function(){
			$(this).toggleClass('first').toggleClass('second');				
		});
				
		$('#nameArea').each(function(){
			$(this).toggleClass('first').toggleClass('second');					
		});
	});
});