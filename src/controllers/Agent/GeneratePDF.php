<?php

namespace Application\Controller;
use Application\Interface\Controller\Controller;


class GeneratePDF implements Controller
{
    public function execute()
    {
            require_once("templates/GeneretePDF.php");
    }

}