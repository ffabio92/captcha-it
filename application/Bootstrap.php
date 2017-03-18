<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initRoutes()
	{
		$route = new Zend_Controller_Router_Route_Regex(
				'(.+)\-captcha',
				array(
						'controller' => 'captcha',
						'action'     => 'add'
				),
				array(
						1 => 'nicelink',
				),
				'%s.html'
				);
		

		
	}
	
}

