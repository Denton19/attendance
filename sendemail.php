<?php

        require 'vendor/autoload.php';

        class sendEmail{
            public static function sendMail($to, $subject, $content){
                $key = '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';

                $email = new \SendGrid\mail\mail();
                $email->setFrom("dsmith_anthony@yahoo.com", "Denton Smith");
                $email->setSubject($subject);
                $email->addTo($to);
                //$email->addContent("text/plain", $content);
                $email->addContent("text/html", $content);

                $sendgrid = new \SendGrid($key);

                try {
                    
                    $response = $sendgrid->send($email);
                    return $response;

                } catch (Exception $e) {
                        
                        echo 'Email  exception Cought : '. $e->getMessage()  . "\a";
                        return false;

                }
            }

        }

?>