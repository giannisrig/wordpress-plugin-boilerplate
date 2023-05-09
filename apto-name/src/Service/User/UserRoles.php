<?php

namespace AptoName\Service\User;

class UserRoles {

    const CUSTOM_USER_ROLES = array(
        'example_role' => array(
            'display_name'          => 'example Role',
            'default_capabilities'  => array(
                'read'         => true,
                'edit_posts'   => true,
                'upload_files' => true,
            )
        )
    );



    /**
     * This function is responsible for adding custom user roles
     * User roles are defined in the constant @see UserRoles::CUSTOM_USER_ROLES
     */
    public function registerUserRoles(){

        foreach( self::CUSTOM_USER_ROLES as $userRoleSlug => $userRole ){

            add_role(
                $userRoleSlug,
                $userRole['display_name'],
                $userRole['default_capabilities']
            );

        }

    }

}
