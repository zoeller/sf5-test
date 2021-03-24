<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class FrontPageController
{
    private $params;

    /**
     * FrontPageController constructor.
     */
    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public function index(LoggerInterface $logger): Response
    {
        $title = $this->params->get('app.title');

        return new Response("<html><body><h1>" . $title . "</h1></body></html>");
    }
}