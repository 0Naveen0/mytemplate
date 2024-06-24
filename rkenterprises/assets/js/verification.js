/*
function sendOTP() {
	$(".error").html("").hide();
	var number = $("#mobile").val();
	if (number.length == 10 && (number !== null)) {
		var input = {
			"mobile_number" : number,
			"action" : "send_otp"
		};
		$.ajax({
			url : '/apoorvatraders/index.php/otp',
			type : 'POST',
			data : input,
			success : function(response) {
			    $(".error").html(response);
				$(".error").html(response);
			    
			},
			failure : function(response) {
				$(".error").html("OTP send failed");
			}
		});
	} else {
		$(".error").html('Please enter a valid number!')
		$(".error").show();
	}
}

function verifyOTP() {
	$(".error").html("").hide();
	$(".success").html("").hide();
	var otp = $("#mobileOtp").val();
	var input = {
		"otp" : otp,
		"action" : "verify_otp"
	};
	if (otp.length == 6 && otp !== null) {
		$.ajax({
			url : '/apoorvatraders/index.php/otp',
			type : 'POST',
			dataType : "json",
			data : input,
			success : function(response) {
				$("." + response.type).html(response.message);
				$("." + response.type).show();
			},
			error : function() {
				alert("ss");
			}
		});
	} else {
		$(".error").html('You have entered wrong OTP.');
		$(".error").show();
	}
}


*/

 $(document).ready(function () {
     
      $('[name="sendOtp"]').on('click', function (e) {

 e.preventDefault();
 $(".error").html("").hide();
	var number = $("#mobile").val();
	if (number.length == 10 && (number !== null)) {
		var input = {
			"mobile_number" : number,
			"action" : "send_otp"
		};
        //var selection = ($('#examlist').val());
        var url = '/apoorvatraders/index.php/otp';
        $.ajax({
            type: 'POST',
            url: url,cache:false,
            timeout: 5000,
            beforeSend: function () {
                $('.error').html('<div  class="text-center loading"><img src="/apoorvatraders/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('.loading').remove();
            },
           	success : function(response) {
			    $(".error").html(response);
            }

        });
	} else {
		$(".error").html('Please enter a valid number!');
		$(".error").show();
	}
      });     
        

$('[name="verifyOtp"]').on('click', function (e) {

 e.preventDefault();
        //var selection = ($('#examlist').val());
        $(".error").html("").hide();
	$(".success").html("").hide();
	var otp = $("#mobileOtp").val();
	var input = {
		"otp" : otp,
		"action" : "verify_otp"
	};
	if (otp.length == 5 && otp !== null) {
        var url = '/apoorvatraders/index.php/otp';
        $.ajax({
            type: 'POST',
            url: url,cache:false,
            timeout: 5000,
            beforeSend: function () {
                $('.error').html('<div  class="text-center loading"><img src="/apoorvatraders/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('.loading').remove();
            },
           	success : function(response) {
			    $(".error").html(response);
            }

        });
	} else {
		$(".error").html('You have entered wrong OTP.');
		$(".error").show();
	}

 });
 
 
 
 
 
 });











