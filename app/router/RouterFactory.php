<?php

use Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return Nette\Application\IRouter
	 */
	public function createRouter()
	{
		$router = new RouteList();
                                $router[] = new Route('admin/<lang [a-z]{2}>/<presenter>/<action>[/<id>]',  array(
				'module' => 'admin',
				'presenter' => 'Homepage',
				'action' => 'default',
				'id' => NULL,
				'item' => NULL,
                                 'lang'=> 'cs'
		));

                $router[] = new Route('admin/<presenter>/<action>[/<id>]',  array(
				'module' => 'admin',
				'presenter' => 'Template',
				'action' => 'createTemplate',
		));                                
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');

		return $router;
	}

}
