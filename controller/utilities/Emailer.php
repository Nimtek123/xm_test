<?php

class Emailer {

    private $smtp;
    ## Opex Test Mail Server :
    private $host = 'smtp.gmail.com';                   // mail.opexdev.co.za
    private $port = '465';                              // 465
    private $scheme = 'ssl';                            // ssl
    private $user = 'kmolotsi.opex@gmail.com';          // test@opexdev.net
    private $password = 'Gmail9014';                    // Golive300

    public function __construct($recipient, $subject) {

        $this->smtp = new SMTP($this->host, $this->port, $this->scheme, $this->user, $this->password);

        echo $this->smtp->set('Errors-to', '<kmolotsi.opex@gmail.com>');
        echo $this->smtp->set('To', '"User" <'.$recipient.'>');
        echo $this->smtp->set('From', '"RMS IRS Global" <info@irsglobal.net>');
        echo $this->smtp->set('Subject', $subject);
    }

    public function send($message)
    {
        try{
            $email = $this->smtp->send($message);

            return $email;
        }catch(Exception $exception){
            throw new Error('Error sending email');
        }
    }
}
