<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class TestController
{
    public function index(LoggerInterface $logger): Response
    {
        $number = random_int(0, 100);

        $vars = print_r($_SERVER);

        return new Response(
            '<html><body>Server Vars: <pre>'.$vars.'</pre></body></html>'
        );
    }

    public function mailer(MailerInterface $mailer, LoggerInterface $logger): Response
    {
        $email = (new Email())
            ->from('no-reply@zoeller.biz')
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