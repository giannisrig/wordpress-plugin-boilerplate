<?php

namespace AptoName\Service\User;

class UserCapabilities {

    /**
     * An associative array where the key is the 'capability' name
     * Value is an array of user roles slugs
     */
    const CUSTOM_USER_CAPABILITIES = array(
        'example_capability' => array( 'example_role' )
    );


    /**
     * This function is responsible for adding custom capabilities
     * to the user roles define in the constant @see UserCapabilities::CUSTOM_USER_CAPABILITIES
     */
    public function registerUserCapabilities(){

        foreach( self::CUSTOM_USER_CAPABILITIES as $capability => $userRoles ){

            foreach( $userRoles as $userRoleSlug ){

                // gets the user role object based on the $userRoleSlug
                $role = get_role( $userRoleSlug );

                // add the custom capability to the user role
                $role->add_cap( $capability, true);

            }

        }

    }

}
