<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Leave Feedback</title>
</head>
<body>

<style>
*,::after,::before {
    box-sizing: border-box
}
html, body{
	height: 100%;
}
body{
	font-family: 'PT-Sans', arial;
	background-image: url('/images/cover-90d.jpg');
	background-position: center;
	color: #333;
	margin: 0;
	padding: 16px;
}
.form-title{
	text-align: center;
	margin: -5px 0 30px;
}

.form-wrapper{
	margin-top: 100px;
/*    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;*/
/*    padding: 16px;*/
}

.feedback-form{
    background: #fff;
    max-width: 400px;
    padding: 50px 20px;
    border-radius: 12px;
    box-shadow: 0 0 20px #555;
    width: 100%;
    margin: auto;
}

.text-input, textarea{
	margin-bottom: 20px;
    display: block;
    width: 100%;
    background: #ffffff47;
    color: #444;
    padding: 10px;
    font-size: 18px;
    border: 0;
    border-radius: 4px;
    outline: 1px solid #ababab;
    font-family: 'PT-Sans', arial;
}

.text-input::placeholder,
textarea::placeholder{
    color: #ccc;
}

.text-input:focus-visible,
textarea:focus-visible{
    outline: 1px solid #eee;
    box-shadow: 0 0 0 0.25rem rgba(13,110,253,.25);
}

.text-input{
	
}

textarea{
	resize: vertical;
}

.submit-button{
	margin-top: 50px;
    font-size: 18px;
    display: block;
    width: 100%;
    padding: 12px;
    border-radius: 4px;
    border: 0;
    background: #5666f9;
    color: #fff;
    text-decoration: none;
}
.d-none{
	display: none;
}
.d-block{
	display: block;
}
.thank-you{
	text-align: center;
}
.thank-you p{
	display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
}
.thank-you svg{
	color: #63c97a;
    width: 50px;
    height: 50px;
}
.is-invalid{
    box-shadow: 0 0 0 0.25rem rgba(253,13,13,.25);
}
</style>

<div class="form-wrapper">
	<form class="feedback-form" action="{{ route('cafe.save-feedback', $company->slug) }}" onsubmit="leave_feedback_submit(this, event)">
		<h3 class="form-title">Leave feedback</h3>
		<div class="inputs d-block">
			<input class="text-input" type="text" name="email" placeholder="Email">
			<input class="text-input" type="text" name="phone" placeholder="Phone">
			<textarea name="message" rows="4" placeholder="Message">a</textarea>
			<button class="submit-button">Send</button>
		</div>
		<div class="thank-you d-none">
			<p>
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
				  <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
				  <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
				</svg>
				Thank You!
			</p>
			<a href="{{ $company->cafeLink() }}" class="submit-button">Back to Menu</a>
		</div>
	</form>
</div>

<script>
var log = console.log
var inputs = document.querySelector('.inputs')
var thank_you = document.querySelector('.thank-you')

document.querySelectorAll('.inputs>*').forEach(el => el.onfocus = e => e.target.classList.remove('is-invalid'))

function leave_feedback_submit(form, event){
	event.preventDefault()
	document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'))
	var formData = new URLSearchParams(new FormData(form)); // why is it work?
	form.querySelectorAll('.inputs>*').forEach(el => el.disabled = true)
	postData(form.action, formData)
		.then(data => data.json())
		.then(data => {
			data.status && data.status === 'success' && show_thank_you()
			if(data.errors) {
				form.querySelectorAll('.inputs>*').forEach(el => el.disabled = false)
			}
			for (var error_name in data.errors) {
				document.querySelector(`[name="${error_name}"]`).classList.add('is-invalid')
			}
		}).catch(error => {
			console.log('Request failed', error); // not workunkg if server error
		})
}

function show_thank_you(){
	inputs.classList.toggle('d-none')
	inputs.classList.toggle('d-block')
	thank_you.classList.toggle('d-none')
	thank_you.classList.toggle('d-block')
}
function postData(url = "", data = {}) {
  // Default options are marked with *
  const response = fetch(url, {
    method: "POST", // *GET, POST, PUT, DELETE, etc.
    headers: {
      "Accept": "application/json",
      // "Content-Type": "application/json",
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: data, // body data type must match "Content-Type" header
  });
  return response; // parses JSON response into native JavaScript objects
}


</script>

</body>
</html>