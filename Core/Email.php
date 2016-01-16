<?php
    namespace Core;
    
    class Email {
        
        /**
         *      Send email
         *      @param $email - E-Mail пользователя
         *      @param $subject - Заголовок письма
         *      @param $text - Содержание письма
         *      @param $_to - если 0, то отправляем пользователю от админа, а если 1 - админу от пользователя
         */
        public static function send($subject, $message, $email = NULL, $files = array()) {
            $from = Config::get( 'mail.admin_email' );
            if( !$email ) {
                $to = $from;
            } else {
                $to = $email;
            }
            $mail = new \Plugins\phpMailer\PHPMailer;
            if (
                (boolean) Config::get('mail.smtp') &&
                Config::get('mail.host') && Config::get('mail.username') && Config::get('mail.password') &&
                Config::get('mail.secure') && Config::get('mail.port')
            ) {
                $mail->isSMTP();
                $mail->Host = Config::get('mail.host');
                $mail->SMTPAuth = true;
                $mail->Username = Config::get('mail.username');
                $mail->Password = Config::get('mail.password');
                $mail->SMTPSecure = Config::get('mail.secure');
                $mail->Port = Config::get('mail.port');
            }
            $mail->SetFrom($from, Config::get('mail.name'));
            $mail->addReplyTo($from, Config::get('mail.name'));
            $mail->Subject = $subject;
            $mail->MsgHTML($message);
            $mail->addAddress($to);

            if(is_array($files) && count($files)) {
                foreach ($files as $file) {
                    if( is_file($file) ) {
                        $mail->addAttachment($file);
                    }
                }
            }
            
            return $mail->Send();
        }

    }