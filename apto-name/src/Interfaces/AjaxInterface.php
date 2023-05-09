<?php


namespace AptoName\Interfaces;


Interface AjaxInterface {

    const AJAX_ACTIONS = array(
        'ajaxCustomAction' => array(
            'callback' => 'ajaxCustomAction',
            'nopriv'   => false,
        ),
    );

}
