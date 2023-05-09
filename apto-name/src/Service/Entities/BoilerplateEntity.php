<?php

namespace AptoName\Service\Entities;

use AptoName\Service\PostType\BoilerplatePost;
use AptoName\Traits\Core\PostEntity;

class BoilerplateEntity {

    use PostEntity;

    public $episodes;

    public function __construct( $id ) {

        $this->ID         = $id;
        $this->post       = get_post( $this->ID );
        $this->metaSlugs  = BoilerplatePost::META_FIELDS_SLUG;
        $this->postMeta   = get_post_meta( $this->ID );
        $this->setProperties();

    }

}
