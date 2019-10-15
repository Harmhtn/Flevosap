<?php

declare(strict_types=1);

class MailService
{
    /**
     * @var Swift_Mailer
     */
    private $mailer;

    public function __construct()
    {
        $transport = (new Swift_SmtpTransport($_ENV['mailer']['host'], $_ENV['mailer']['port'], $_ENV['mailer']['encryption']))
            ->setUsername($_ENV['mailer']['username'])
            ->setPassword($_ENV['mailer']['password']);

        $this->mailer = new Swift_Mailer($transport);
    }

    public function sendMail(string $to, string $subject, string $body): bool
    {
        $message = (new Swift_Message($subject))
            ->setFrom([$_ENV['mailer']['fromEmail'] => $_ENV['mailer']['fromName']])
            ->setTo($to)
            ->setBody($body);

        $responseCode = $this->mailer->send($message);

        if ($responseCode === 0) {
            return false;
        }

        return true;
    }
}