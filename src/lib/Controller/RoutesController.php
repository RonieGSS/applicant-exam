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
	 * @var controllers array, holds all Controller classes
	 */
	private $controllers = [];

	/**
	 * @var actions array, holds all functions 
	 * of each Controller classes
	 */
	private $actions = [];

	/**
	 * @var controller_dir string, directory of controller classes
	 */
	private $controller_dir = 'app/Controller/';

	/**
	 * @var Lib\Controller\ViewController object
	 */
	private $viewTemplateSetting;

	public function __construct(ViewController $viewTemplateSetting)
	{
		$this->viewTemplateSetting = $viewTemplateSetting;
		$this->setCreatedControllers();
		$this->setCreatedActions();
	}

	/**
	 * Sets all created Controller classes
	 * in app/Controller directory to controllers array
	 *
	 * @param null
	 * @return null
	 */
	private function setCreatedControllers()
	{
		try {
			if (is_dir($this->controller_dir)) {
				if ($dir = opendir($this->controller_dir)) {
					while(($file = readdir($dir)) !== false) {
						if (!preg_match('/^\.+/',$file)) {
							$this->controllers[] = strtolower(str_replace('Controller.php','',$file));
						} // end of innermost if statement
					} // end of while loop
				} // end of inner if statement
			} // end of outermost if statement
		} catch (Exception $e) {
			echo '<h3>Oh man got this error -> </h3>' . $e->getMessage();
		}
	}

	/**
	 * Sets all created Controller classes' functions
	 * in app/Controller directory to actions array
	 * with controller name as key
	 *
	 * @param null
	 * @return null
	 */
	private function setCreatedActions()
	{
		try {
			foreach ($this->controllers as $controller) {
				$file_to_open = $this->controller_dir . ucfirst($controller) . 'Controller.php';
				$file_to_read = fopen($file_to_open, "r") or die('Unable to open file');
				$file = htmlentities(fread($file_to_read, filesize($file_to_open)));
				preg_match_all('/public function .+(?='. preg_quote('(').')/', $file, $matches);
				foreach ($matches[0] as $match) {
					$action = trim(str_replace('public function ', '', $match));
					if ($action != '__construct') {
						$this->actions[$controller][] = $action;
					}
				} // end of inner foreach lopp
				fclose($file_to_read);
			} // end of outer foreach loop
		} catch (Exception $e) {
			echo '<h3>Oh man got this error -> </h3>' . $e->getMessage();
		}
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
			echo '<div class="col-md-4 offset-md-4 text-center">'.
				  '<h2>WAZZAP MAN!!!</h2>'.
				  '<h4>URL '.$url.' is invalid</h4>'.
				  '<h2>404 PAGE NOT FOUND YOW</h2>'.
				 '<h4>Check app/Config/routes.php file</h4></div>';
		}
		require_once("app/View/Common/{$this->viewTemplateSetting->getFooter()}");
	}
}