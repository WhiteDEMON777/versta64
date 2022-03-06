$(document).ready(function(){
	$("#ajax-contact-form2").submit(function(){
		var str = $(this).serialize();
		$.ajax( { type: "POST", url: "contact2.php", data: str, success: function(msg){
				if(msg == 'OK') // Message Sent? Show the 'Thank You' message and hide the form
					{ result = '<div class="notification_ok2">Your message has been sent. Thank you!<br> <a href="#" onclick="freset2();return false;">send another mail</a></div>'; $("#fields2").hide(); }
				else
					{ result = msg; }
				$("#note2").html(result);
			}
		});
		return false;
	});
});

function freset2(){
	$("#note2").html('');
	document.getElementById('ajax-contact-form2').reset();
	$("#fields2").show();
};