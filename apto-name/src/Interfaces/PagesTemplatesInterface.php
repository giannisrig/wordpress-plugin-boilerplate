<?php

namespace AptoName\Interfaces;

Interface PagesTemplatesInterface {

	/**
	 * Folder with the page templates
	 */
	const TEMPLATES_FOLDER  = 'templates/public/pages/';


	/**
	 * The array of templates that this plugin tracks.
	 * Set the array key as the page template file and
	 * set as value value the name of the template
	 */
	const PAGE_TEMPLATES    = array(
		'apto-name-custom.php'   => 'Apto Name Custom Template',
	);


}
