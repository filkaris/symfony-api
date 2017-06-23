<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Utils\Lib;


class UserController extends Controller
{
    /**
     * @Route("/user", name="user")
     * @Route("/user/{id}", name="user")
     */
    public function showAction( Request $request, $id = null, EntityManagerInterface $em )
    {
        if (!$id) 
            return Lib::formatResponse( 'error', 'No User Id provided. Try /user/{id}' );

        $user = $em->getRepository('AppBundle:User')->find($id);

        if (!$user) 
            return Lib::formatResponse( 'error', "No User found with Id: $id" );

        $api_key = $request->headers->get('X-symfony-api-key');
        if (!$api_key) 
            return Lib::formatResponse( 'error', 'No API Key provided. Please use the header X-symofny-api-key in your request');

        if ( $user->getApiKey() != $api_key ) 
            return Lib::formatResponse( 'error', "Wrong API Key provided for user $id");

        return Lib::formatResponse( 'success', $user->getData() );
    }
}
