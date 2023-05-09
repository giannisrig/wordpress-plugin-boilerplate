<?php

namespace AptoName\Controller\Ajax;

use AptoName\Interfaces\AjaxInterface;

class AjaxController implements AjaxInterface {


    /**
     * Gets the array that will be merged with the options
     * of the localized script defined on the @see \AptoName\Controller\Front\PublicController
     * @return array
     */
    public function getJSAjaxActions(){

        $actions = array();
        foreach( self::AJAX_ACTIONS as $ajaxAction => $ajaxData ){
            $actions[ $ajaxAction ] = $ajaxAction;
        }

        return $actions;

    }


    public function ajaxCustomAction(){

        $params = array();
        parse_str( $_POST['data'], $params );

        $result = array(
            'html' => 'test',
            'form' => $params,
        );

        wp_send_json( $result );
        wp_die();

    }

}
