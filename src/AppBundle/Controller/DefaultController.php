<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utils\Lib;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, EntityManagerInterface $em)
    {
        $status = 'error';
        $message = 'Correct API Usage: call /user/{id} with an API Key';
        Lib::logRequest( $em, $request, $status, $data );
        return Lib::formatResponse( $status, $data );
    }

    public function catchAllAction(Request $request, $req , EntityManagerInterface $em)
    {
        $status = 'error';
        $data = "Resource '$req' is not supported. Try querying for 'user' instead";
        Lib::logRequest( $em, $request, $status, $data );
        return Lib::formatResponse( $status, $data );
    }
}
