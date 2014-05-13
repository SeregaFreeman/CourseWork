$(document).ready(function(){
	$('#changeStyleButton').click(function(){
		
		$('body').each(function(){
			if ($(this).hasClass('first')){
				$('body').removeClass('first').addClass('second');
			}
			else{
				$('body').removeClass('second').addClass('first');
			}					
		});				
				
		$('#sendMessageArea p').each(function(){
			if ($(this).hasClass('first')){
				$('#sendMessageArea p').removeClass('first').addClass('second');
			}
			else{
				$('#sendMessageArea p').removeClass('second').addClass('first');
			}					
		});
				
		$('#nameArea').each(function(){
			if ($(this).hasClass('first')){
				$('#nameArea').removeClass('first').addClass('second');
			}
			else{
				$('#nameArea').removeClass('second').addClass('first');
			}					
		});
	});
});