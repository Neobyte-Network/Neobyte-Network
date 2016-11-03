
$(document).ready(function() {
	
	setTimeout(function(){
		$('body').addClass('loaded');
		$('h1').css('color','#222222');
	}, 3000);
	
});

window.onbeforeunload = function (e) {

    setTimeout(function(){
        document.getElementById('myLink').className = 'animated fadeOut';
    }, 2000);