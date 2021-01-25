<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

class DebugController
{
    public function phpinfo(): void
    {
        phpinfo(); die();
    }
    
    public function vars(): void
    {
        echo "<pre>"; print_r($_SERVER); echo "</pre>"; die();
    }
}