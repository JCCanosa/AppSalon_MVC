<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email{
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'db4b9f82dcc7bb';
        $mail->Password = '88be986cd89cb4';
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en AppSalon, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token ."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Enviar el email
        $mail->send();
    }

    public function enviarInstrucciones(){
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'db4b9f82dcc7bb';
        $mail->Password = '88be986cd89cb4';
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Reestablece tu Password';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token ."'>Reestablecer Password</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Enviar el email
        $mail->send();
    }
}