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
     * @Route("/user")
     * @Route("/user/{id}")
     */
    public function showAction( Request $request, $id = null, EntityManagerInterface $em )
    {
        $user_id = null;

        if (!$id) {
            $status = 'error';
            $data ='No User Id provided. Try /user/{id}' ;
        }
        else {

            $user = $em->getRepository('AppBundle:User')->find($id);
            $api_key = $request->headers->get('X-symfony-api-key');

            if (!$user) {
                $status = 'error';
                $data ="No User found with Id: $id" ;
            }
            else if (!$api_key) {
                $status = 'error';
                $data = 'No API Key provided. Please use the header X-symofny-api-key in your request';
            }
            else if ( $user->getApiKey() != $api_key ) {
                $status = 'error';
                $data = "Wrong API Key provided for user $id";
                $repo = $em->getRepository('AppBundle:User');
                $user = $repo->findOneBy( ['api_key'=>$api_key] );
                if ( $user )
                    $user_id = $user->getId();
            }
            else {
                $status = 'success';
                $data = $user->getData();
                $user_id = $id;
            }

        }

        Lib::logRequest( $em, $request, $status, $data, $user_id );
        return Lib::formatResponse( $status, $data );
    }
}
