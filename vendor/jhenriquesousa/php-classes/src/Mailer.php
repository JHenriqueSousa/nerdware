<?php
namespace jhenriquesousa;

use Rain\Tpl;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    const USERNAME = "YOUR EMAIL";
    CONST PASSWORD = "YOUR PASSWORD";
    CONST NAME_FROM = "Nerdware";

    private $mail;
    public function __construct($toAddress, $toName, $subject, $tplName, $data= array())
    {

        $config = array(
            # para o raintpl funcionar é necessário uma pasta para ir buscar os arquivos html (tpl_dir) e outra para o cache (cache_dir)

            # utilização da variável ambiente server document root. Está variável ambiente vai buscar onde está o dirétorio root (dirétório inicial). Desta maneira o código fica mais inteligente e evita problemas futuros
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]. "/views/email/",
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]. "/views-cache/",
            "debug"         => false // set to false to improve the speed
        );

        Tpl::configure( $config );

        $tpl = new Tpl;

        foreach ($data as $key => $value){
            $tpl->assign($key, $value);
        }

        $html = $tpl->draw($tplName, true);

        $this ->mail = new PHPMailer(true);

            //Server settings
            //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this->mail->isSMTP();                                            //Send using SMTP
            $this->mail->Host       = 'mail.jhenriquesousa.com';                     //Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mail->Username   = Mailer::USERNAME;                     //SMTP username
            $this->mail->Password   = Mailer::PASSWORD;                               //SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);
            $this->mail->addAddress($toAddress, $toName);     //Add a recipient

                //Optional name

            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->msgHTML($html);
            $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }

    public function send(){
        return $this->mail->send();
    }
}

?>