<?php 
$errors = '';
$myemail = 'jennifer@randjadvisorygroup.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Sorry! \n All fields are required.";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Please enter a valid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
	
	// $headers = "From: $myemail\n"; 
	// $headers .= "Reply-To: $email_address";
	
	// mail($to,$email_subject,$email_body,$headers);
	
	mail($to,$email_subject,$email_body);

	//redirect to the 'thank you' page
	header('Location: thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
	<link rel="stylesheet" href="/css/styles.css">
	<style>
body {
    background-color: rgba(59,26,94,1)  ;
    padding-left: 3rem;
    padding-top: 3rem;
    color: white;
    font-size:1.5rem;
}

button {
background-color: white);
color: rgba(0,0,0,.8);
font-size; 2rem;
padding: 10px;
border: none;
border-radius: 5px;
margin-top; 2rem;
}

img {
display: block;
width: 80%;
margin: 1rem auto;
}


</style>
</head>

<body>

<img src="/images/RJLogo.svg" /> 
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>

<br>
<br>

<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>





</body>
</html>