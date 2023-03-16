<?php

namespace App\Services;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function sendEmail(
        $to = 'bagadorvez44@gmail.com',
        $subject = 'This is the Mail subject !',
        $content = '',
        $text = ''
    ): void {
        $email = (new Email())
            ->from('contact@bagadorvez.bzh')
            ->to($to)
            ->subject($subject)
            ->text($text)
            ->html($content);
        $this->mailer->send($email);
    }

    // public function send($email) {
    //     $this->mailer->send($email);
    // }
}