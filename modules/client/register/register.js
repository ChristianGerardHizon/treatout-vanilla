var verified = false

$(document).on('submit', '#register', function(event) {
    event.preventDefault();
    const password = document.getElementById('password').value
	const confirmPassword = document.getElementById('confirmPassword').value
	
	if(!verified){
		alert('Please Verify you are not a bot')
		return
	}

	console.log( password, confirmPassword)
    if( password !== confirmPassword ){
        alert('Passwords does not match')
        return
    }
    
	$.ajax({
		url: '/treatout/modules/client/register/register.php',
		method: 'POST',
		data: new FormData(this),
		contentType: false,
		processData: false,
		dataType: 'JSON',
		success: data =>  {
			if (data.response) {
				var link = 'index.php'
				window.location.href = link
			}else{
                alert(data)
            }
		},
	})
})


function captchaCallback(){
	verified = true
	console.log('You are Verified')
}
