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
	color: #fff;
	margin: 0;
}
.form-title{
	text-align: center;
	margin-bottom: 50px;
}

.wrapper{
	background: #000000b5;
	overflow: hidden;
	height: 100%;
}

.foram-wrapper{
/*	background: #000000b5;*/
    max-width: 400px;
    padding: 50px 20px;
    margin: 80px auto 0;
    border-radius: 6px;
}

.feedback-form{

}

.text-input, textarea{
	margin-bottom: 20px;
    display: block;
    width: 100%;
    background: #ffffff47;
    color: #fff;
    padding: 10px;
    font-size: 18px;
    border: 0;
    border-radius: 4px;
    outline: 1px solid #888;
}

.text-input::placeholder,
textarea::placeholder{
    color: #ccc;
}

.text-input:focus-visible,
textarea:focus-visible{
    outline: 1px solid #eee;
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
</style>

<div class="wrapper">
	<div class="foram-wrapper">
		<form class="feedback-form" action="{{ '#' }}" onsubmit="leave_feedback_submit(this, event)">
			<h2 class="form-title">Leave feedback</h2>
			<div class="inputs d-none">
				<input class="text-input" type="text" placeholder="Email">
				<input class="text-input" type="text" placeholder="Phone">
				<textarea name="" rows="4" placeholder="Message"></textarea>
				<button class="submit-button">Send</button>
			</div>
			<div class="thank-you d-block">
				<p>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
					  <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
					  <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
					</svg>
					Thank You!
				</p>
				<button class="submit-button">Back to Menu</button>
			</div>
		</form>
	</div>
</div>

<script>
var log = console.log
var inputs = document.querySelector('.inputs')
var thank_you = document.querySelector('.thank-you')
log(thank_you)
function leave_feedback_submit(form, event){
	event.preventDefault()
	log('asd')
	inputs.classList.toggle('d-none')
	inputs.classList.toggle('d-block')
	thank_you.classList.toggle('d-none')
	thank_you.classList.toggle('d-block')
}
</script>

</body>
</html>