<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utils\Lib;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return Lib::formatResponse( 'error', "Correct API Usage: call /user/{id} with an API Key");
    }

    public function catchAllAction(Request $request, $req )
    {
        return Lib::formatResponse( 'error', "Resource '$req' is not supported. Try querying for 'user' instead");
    }
}
