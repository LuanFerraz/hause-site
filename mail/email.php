<?php

	
require __DIR__.'/phpmailer/PHPMailerAutoload.php';

// recebe as Variaveis
$nome     = $_POST["nome"];
$email    = $_POST["email"];
$assunto   = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hausegroup@gmail.com';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail->setLanguage('pt', 'phpmailer/language');

$mail->setFrom('hausegroup@gmail.com', $nome);
$mail->addAddress('hausegroup@gmail.com', 'Hause');     // Add a recipient  // Name is optional
$mail->addReplyTo($email, $nome);



$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $assunto;

if($mensagem == ""){
	$mail->Body	= "Usuário não digitou nada nada caixa de mensagem.";
}else{
	$mail->Body    = $mensagem;
	$mail->AltBody = $mensagem;
}



if(!$mail->send()) {
    echo 'Erro ao enviar o e-mail.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'E-mail enviado com sucesso.';
}
?>

