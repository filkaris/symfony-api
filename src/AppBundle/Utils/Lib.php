<?php

namespace AppBundle\Utils;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Log;
use AppBundle\Entity\User;


class Lib
{

    public static function formatResponse( $status, $data ) {
        $response = compact( 'status', 'data' );
        $encoded = json_encode( $response );

        return new Response( $encoded );
    }

    public static function logRequest( $em, $request, $status, $data, $user_id = null ) {
        $log = new Log();
        $log->setUserId( $user_id );
        $log->setTime( new \DateTime() );
        $log->setPath( $request->getPathInfo() );
        $log->setStatus( $status );
        if ( $status == 'error' )
            $log->setErrorMessage( $data );

        $em->persist($log);
        $em->flush();
    }

}

