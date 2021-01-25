<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

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

    public function mailer(LoggerInterface $logger): Response
    {
        $logger->info('Test mailer');

        return new Response(
            '<html><body>Test mailer</body></html>'
        );
    }
}