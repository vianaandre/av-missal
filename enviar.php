<?php

// documentos necessarios para poder funcionar o envio de emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// arquivos necessarios para o envio de emails
require "./PHPMailer/src/Exception.php";
require "./PHPMailer/src/PHPMailer.php";
require "./PHPMailer/src/SMTP.php";
  
// Mudar Aqui o e-mail
$email_envio = "contato@avmissal.com.br"; // E-mail do site (ex: contato@seusite.com)
$email_pass = "avmissal@123"; // Senha do e-mail

$site_name = "AV-MISSAL"; // Nome do Site
$site_url = "www.avmissal.com.br"; // URL do Site

$host_smtp = "smtp.umbler.com"; // HOST SMTP Ex: smtp.domain.com.br
$host_port = "587"; // Porta do Host, geralmente 465 ou 587


// Não mudar abaixo:
$email = $_POST["email"]; // email que foi atribuido ao formulario
$nome = $_POST["nome"]; // nome que foi atribuido ao formulario

// resto das informações que foram atribuidas ao formulario 
// Loop por cada field do formulário
$body_content = "";
foreach( $_POST as $field => $value) {
  if( $field !== "leaveblank" && $field !== "dontchange" && $field !== "enviar") {
    $sanitize_value = filter_var($value, FILTER_SANITIZE_STRING);
    $body_content .= "$field: $value \n";
  }
}

// Verifica se não é bot
$notbot = ($_POST["leaveblank"] === "") || ($_POST["dontchange"] === "http://");

if ($notbot) {

// Inicia o objeto PHPMailer
$mail = new PHPMailer(true);

try {
  $mail->CharSet = "UTF-8";
  
  //$mail->SMTPDebug = 3; // Tire do comentário para debugar
  $mail->isSMTP();
  $mail->Host = $host_smtp;
  $mail->SMTPAuth = true;
  $mail->Username = $email_envio;
  $mail->Password = $email_pass;
  $mail->Port = $host_port; 
  $mail->SMTPSecure = "tsl"; //Se não tiver SSL use assim, com SSL coloque no SMTPSecure
  
  $mail->setFrom($email_envio, "Formulário - ". $nome);
  $mail->addAddress($email_envio, $site_name);
  $mail->addReplyTo($email, $nome);
  
  $mail->WordWrap = 70;
  $mail->Subject = "Formulário - " . $site_name . " - " . $nome;
  $mail->Body = $body_content;
  
  $mail->send();
?>

  <html>
    <head>
      <title>Formulário enviado</title>
      <meta http-equiv="refresh" content="10;URL="./"">
    </head>
    <body>
      <!-- Mensagem de sucesso -->
      <div class="form-content" id="form-send">
        <h2>Formulário enviado!</h2>
        <p>Em breve entraremos em contato com você!!!</p>
      </div>
    </body>
  </html>

<?php } catch (Exception $e) { ?>

  <html>
    <head>
      <title>Erro no envio do Formulário!!!</title>
      <!-- dá um refresh na página -->
      <meta http-equiv="refresh" content="10;URL="./"">
    </head>
    <body>
      <!-- Mensagem de erro -->
      <div class="form-content" id="form-erro">
        <h2>Um Erro ocurreu no envio do seu Formulário!!!</h2>
        <p>Você pode tentar novamente ou enviar direto para <?php echo $email_envio; ?></p>
      </div>
    </body>
  </html>

<?php
  }}
?>