<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class TestController
{
    public function mailer(MailerInterface $mailer, LoggerInterface $logger): Response
    {
        $fromAddress = $_SERVER['MAILER_FROM'];

        $email = (new Email())
            ->from($fromAddress)
            ->to('mischa.zoeller@gmail.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            $logger->error($e->getMessage());
        }

        return new Response(
            '<html><body>Test mailer</body></html>'
        );
    }
}