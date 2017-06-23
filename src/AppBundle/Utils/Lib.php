<?php

namespace AppBundle\Utils;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;


class Lib
{

    public static function formatResponse( $status, $data ) {
        $response = compact( 'status', 'data' );
        $encoded = json_encode( $response );
        error_log( print_r( $encoded , true ) );

        return new Response( $encoded );
    }

}

