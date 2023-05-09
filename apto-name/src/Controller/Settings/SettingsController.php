<?php

namespace AptoName\Controller\Settings;

use AptoName\Includes\Settings;

class SettingsController
{

    public $options;

    public function __construct(){

        $settings = new \AptoName\Includes\Settings('apto-name');
        $this->options = $settings->getOptions();

    }

}
