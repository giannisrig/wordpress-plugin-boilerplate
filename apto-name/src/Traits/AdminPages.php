<?php


namespace AptoName\Traits;

Trait AdminPages {

	protected $pages;

	public function setAdminPages(){

		$this->pages = array(
			'apto-name' => array(
				'page_title'    => 'Apto Name',
				'menu_title'    => 'Apto Name',
				'capability'    => 'manage_options',
				'icon_url'      => 'dashicons-migrate',
				'position'      => 10,
				'subpages'      => array(
					'apto-name-sub' => array(
						'page_title'    => 'Apto Name SubPage',
						'menu_title'    => 'Apto Name SubPage',
						'capability'    => 'manage_options',
					)
				)
			),
		);

	}


	public function getAdminPages(){

		return $this->pages;

	}

}
