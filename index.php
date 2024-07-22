<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$con=mysqli_connect('localhost','root','','email');
//$q1="SELECT * FROM client";
$q1="SELECT * FROM client_yt where status=0";
	$run1=mysqli_query($con,$q1);
if(mysqli_num_rows($run1)>=1){
while($row1=mysqli_fetch_array($run1)){
	$email=$row1['email'];
$message="Hello Guys,<br>
I hope this email finds you well. I am writing to introduce you to Desyn Company, a dynamic and innovative team specializing in expert video editing services for various social media platforms.<br>
In today's digital landscape, captivating content is essential to engage and connect with your audience. At Desyn Company, we offer a wide range of services designed to transform your social media presence and help your content shine:<br>
<ul>
<li><B>Precision Color Grading:</b> Our skilled colorists use advanced techniques to enhance the visual aesthetics of your videos. Whether you're seeking vibrant and eye-catching tones or a specific mood, our color grading expertise ensures your content stands out.</li>
<li><b>Immersive Sound Design:</b> Audio plays a crucial role in creating an impactful viewing experience. Our talented sound designers elevate your videos with meticulously crafted soundscapes, enhancing engagement and emotional resonance.</li>
<li><b>Creative Text Animation:</b> Capture your audience's attention with dynamic and captivating text animations. Our team specializes in creating engaging text overlays that effectively convey your message and add a unique flair to your content.</li>
<li><b>Seamless Transitions and Effects:</b> Smooth transitions and expertly applied effects maintain the flow of your videos, keeping viewers engaged and enhancing the overall viewing experience.</li>
<li><b>Tailored Platform Optimization:</b> We understand that each social media platform has its own nuances. Our editing techniques are customized to fit the specific requirements of Instagram, YouTube, Facebook, Twitter, and more.</li>
</ul>
We believe that Desyn Company can be a valuable partner in enhancing your social media presence. Our passion for storytelling and commitment to excellence drive us to deliver content that captures attention and resonates with your audience.<br>
If you're interested in exploring how our services can add a professional touch to your content, we'd love to connect. Please share your availability for a brief call or meeting, and we'll be happy to discuss how Desyn Company can contribute to your creative journey.<br>
Thank you for considering Desyn Company as your trusted video editing partner. We look forward to the opportunity to collaborate and elevate your social media content to new heights.<br><br>
Best regards,<br>
<b>Desyn Company ,<br>
Name : Shivam Singh<br>
Email: business@desyn.in<br>
Phone : +91 9696515244</b>";
	$subject="Elevate Your Social Media Content with Desyn Company's Video Editing Services";
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 0;
	$mail->isHTML(true);
	$mail->Host = 'smtp.hostinger.com';
	$mail->Port = 587;
	$mail->SMTPAuth = true;
	$mail->Username = 'business@desyn.in';
	//$mail->Username = 'temp@desyn.in';
	//$mail->Password = 'fsd34*&jKL';
	$mail->Password = 'dj337^&&#GWEE';
	$mail->setFrom('business@desyn.in', 'Desyn.in');
	$mail->addAddress($email);
	$mail->Subject = $subject;
	$mail->Body = $message;
if($mail->send()){
	echo"msg sent to <b style='color:green'>$email</b> successfully<br>";
	$q2="UPDATE `client_yt` SET `status`='1' WHERE id={$row1['id']}";
	$run2=mysqli_query($con,$q2);
}else{
	echo"msg sent failed to email <b style='color:green'>$email</b><br>";
}
}
}else{
		echo"you have no email to send message";
	}

?>