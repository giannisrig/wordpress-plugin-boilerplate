<?php


namespace AptoName\Interfaces;


Interface TemplatesInterface {

    const PUBLIC_TEMPLATES_FOLDER = 'templates/public/';

    /**
     * Folder with the page templates
     */
    const ARCHIVE_TEMPLATES_FOLDER  = self::PUBLIC_TEMPLATES_FOLDER . 'archive/';
    const SINGLE_TEMPLATES_FOLDER   = self::PUBLIC_TEMPLATES_FOLDER . 'single/';
    const TAXONOMY_TEMPLATES_FOLDER = self::PUBLIC_TEMPLATES_FOLDER . 'taxonomy/';


}
