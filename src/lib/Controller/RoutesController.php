<?php declare(strict_types=1);

namespace Lib\Controller;

/**
 * Responsible for routing
 *
 */
class RoutesController
{
	/**
	 * @var route array, list of added routes
	 */
	private $route = [];

	/**
	 * @var Lib\Controller\ViewController object
	 */
	private $viewTemplateSetting;

	public function __construct(ViewController $viewTemplateSetting)
	{
		$this->viewTemplateSetting = $viewTemplateSetting;
	}

	/**
	 * Add routes
	 *
	 * @param $url string the route url to add
	 * @param $view string the view page to request for a given route
	 */
	public function addRoute(string $url, string $view = 'index')
	{
		$this->route[$url] = (preg_match('/\/$/', $url)) ? 
							 $url.$view : ($view != 'index') ? 
							 			  "/{$view}" : $url;
	}

	/**
	 * Gets the view page requested by the route url
	 *
	 * @param $url string the requested route url
	 */
	public function requireRoute(string $url)
	{
		require_once("app/View/Common/{$this->viewTemplateSetting->getHeader()}");
		if (isset($this->route[$url])) {
			require_once('app/View' . $this->route[$url] . '.php');
		} else {
			echo '<div class="col-md-4 offset-md-4 text-center">
				  <h2>WAZZAP MAN!!!</h2>
				  <h2>404 PAGE NOT FOUND YOW</h2>'.
				 '<h4>Check app/Config/routes.php file</h4></div>';
		}
		require_once("app/View/Common/{$this->viewTemplateSetting->getFooter()}");
	}
}