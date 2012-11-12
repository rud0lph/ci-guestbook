<<<<<<< HEAD
<?php
=======
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
>>>>>>> Kmom03 - Create a codeigniter guestbook
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * Router Class
 *
 * Parses URIs and determines routing
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @author		ExpressionEngine Dev Team
 * @category	Libraries
 * @link		http://codeigniter.com/user_guide/general/routing.html
 */
class CI_Router {

	/**
	 * CI_Config class object
	 *
<<<<<<< HEAD
	 * @var	object
=======
	 * @var object
	 * @access public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	var $config;
	/**
	 * List of routes
	 *
<<<<<<< HEAD
	 * @var	array
=======
	 * @var array
	 * @access public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	var $routes			= array();
	/**
<<<<<<< HEAD
	 * Current class name
	 *
	 * @var	string
=======
	 * List of error routes
	 *
	 * @var array
	 * @access public
	 */
	var $error_routes	= array();
	/**
	 * Current class name
	 *
	 * @var string
	 * @access public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	var $class			= '';
	/**
	 * Current method name
	 *
<<<<<<< HEAD
	 * @var	string
=======
	 * @var string
	 * @access public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	var $method			= 'index';
	/**
	 * Sub-directory that contains the requested controller class
	 *
<<<<<<< HEAD
	 * @var	string
=======
	 * @var string
	 * @access public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	var $directory		= '';
	/**
	 * Default controller (and method if specific)
	 *
<<<<<<< HEAD
	 * @var	string
=======
	 * @var string
	 * @access public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	var $default_controller;

	/**
	 * Class constructor
	 *
	 * Runs the route mapping function.
	 */
	function __construct()
	{
		$this->config =& load_class('Config', 'core');
		$this->uri =& load_class('URI', 'core');
		log_message('debug', "Router Class Initialized");
	}

	// --------------------------------------------------------------------

	/**
	 * Set route mapping
	 *
	 * Determines what should be served based on the URI request,
	 * as well as any "routes" that have been set in the routing config file.
	 *
	 * @access	private
	 * @return	void
	 */
	function _set_routing()
	{
		// Are query strings enabled in the config file?  Normally CI doesn't utilize query strings
		// since URI segments are more search-engine friendly, but they can optionally be used.
		// If this feature is enabled, we will gather the directory/class/method a little differently
		$segments = array();
		if ($this->config->item('enable_query_strings') === TRUE AND isset($_GET[$this->config->item('controller_trigger')]))
		{
			if (isset($_GET[$this->config->item('directory_trigger')]))
			{
				$this->set_directory(trim($this->uri->_filter_uri($_GET[$this->config->item('directory_trigger')])));
				$segments[] = $this->fetch_directory();
			}

			if (isset($_GET[$this->config->item('controller_trigger')]))
			{
				$this->set_class(trim($this->uri->_filter_uri($_GET[$this->config->item('controller_trigger')])));
				$segments[] = $this->fetch_class();
			}

			if (isset($_GET[$this->config->item('function_trigger')]))
			{
				$this->set_method(trim($this->uri->_filter_uri($_GET[$this->config->item('function_trigger')])));
				$segments[] = $this->fetch_method();
			}
		}

		// Load the routes.php file.
		if (defined('ENVIRONMENT') AND is_file(APPPATH.'config/'.ENVIRONMENT.'/routes.php'))
		{
			include(APPPATH.'config/'.ENVIRONMENT.'/routes.php');
		}
		elseif (is_file(APPPATH.'config/routes.php'))
		{
			include(APPPATH.'config/routes.php');
		}

		$this->routes = (isset($route) && is_array($route)) ? $route : array();
		unset($route);

		// Set the default controller so we can display it in the event
		// the URI doesn't correlated to a valid controller.
<<<<<<< HEAD
		$this->default_controller = empty($this->routes['default_controller']) ? FALSE : $this->routes['default_controller'];
=======
		$this->default_controller = ( ! isset($this->routes['default_controller']) OR $this->routes['default_controller'] == '') ? FALSE : strtolower($this->routes['default_controller']);
>>>>>>> Kmom03 - Create a codeigniter guestbook

		// Were there any query string segments?  If so, we'll validate them and bail out since we're done.
		if (count($segments) > 0)
		{
			return $this->_validate_request($segments);
		}

		// Fetch the complete URI string
		$this->uri->_fetch_uri_string();

		// Is there a URI string? If not, the default controller specified in the "routes" file will be shown.
		if ($this->uri->uri_string == '')
		{
			return $this->_set_default_controller();
		}

		// Do we need to remove the URL suffix?
		$this->uri->_remove_url_suffix();

		// Compile the segments into an array
		$this->uri->_explode_segments();

		// Parse any custom routing that may exist
		$this->_parse_routes();

		// Re-index the segment array so that it starts with 1 rather than 0
		$this->uri->_reindex_segments();
	}

	// --------------------------------------------------------------------

	/**
	 * Set default controller
	 *
	 * @access	private
	 * @return	void
	 */
	function _set_default_controller()
	{
		if (empty($this->default_controller))
		{
			show_error("Unable to determine what should be displayed. A default route has not been specified in the routing file.");
		}

		// Is the method being specified?
		if (sscanf($this->default_controller, '%[^/]/%s', $class, $method) !== 2)
		{
<<<<<<< HEAD
			$method = 'index';
=======
			$x = explode('/', $this->default_controller);

			$this->set_class($x[0]);
			$this->set_method($x[1]);
			$this->_set_request($x);
		}
		else
		{
			$this->set_class($this->default_controller);
			$this->set_method('index');
			$this->_set_request(array($this->default_controller, 'index'));
>>>>>>> Kmom03 - Create a codeigniter guestbook
		}

		$this->set_class($class);
		$this->set_method($method);
		$this->_set_request(array($class, $method));

		// re-index the routed segments array so it starts with 1 rather than 0
		$this->uri->_reindex_segments();

		log_message('debug', "No URI present. Default controller set.");
	}

	// --------------------------------------------------------------------

	/**
	 * Set request route
	 *
	 * Takes an array of URI segments as input and sets the class/method
	 * to be called.
	 *
<<<<<<< HEAD
	 * @param	array	$segments	URI segments
=======
	 * @access	private
	 * @param	array
	 * @param	bool
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	void
	 */
	function _set_request($segments = array())
	{
		$segments = $this->_validate_request($segments);

		if (count($segments) == 0)
		{
			return $this->_set_default_controller();
		}

		$this->set_class($segments[0]);

		isset($segments[1]) OR $segments[1] = 'index';
		$this->set_method($segments[1]);

		// Update our "routed" segment array to contain the segments.
		// Note: If there is no custom routing, this array will be
		// identical to $this->uri->segments
		$this->uri->rsegments = $segments;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Validate request
	 *
	 * Attempts validate the URI request and determine the controller path.
	 *
	 * @param	array	$segments	URI segments
	 * @return	array	URI segments
=======
	 * Validates the supplied segments.  Attempts to determine the path to
	 * the controller.
	 *
	 * @access	private
	 * @param	array
	 * @return	array
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function _validate_request($segments)
	{
		if (count($segments) == 0)
		{
			return $segments;
		}

		$temp = str_replace('-', '_', $segments[0]);

		// Does the requested controller exist in the root folder?
		if (file_exists(APPPATH.'controllers/'.$temp.'.php'))
		{
			$segments[0] = $temp;
			empty($segments[1]) OR $segments[1] = str_replace('-', '_', $segments[1]);
			return $segments;
		}

		// Is the controller in a sub-folder?
		if (is_dir(APPPATH.'controllers/'.$segments[0]))
		{
			// Set the directory and remove it from the segment array
			$this->set_directory(array_shift($segments));
			if (count($segments) > 0)
			{
				$segments[0] = str_replace('-', '_', $segments[0]);
				empty($segments[1]) OR $segments[1] = str_replace('-', '_', $segments[1]);

				// Does the requested controller exist in the sub-folder?
				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$segments[0].'.php'))
				{
					if ( ! empty($this->routes['404_override']))
					{
<<<<<<< HEAD
						$this->directory = '';
						return explode('/', $this->routes['404_override'], 2);
=======
						$x = explode('/', $this->routes['404_override']);

						$this->set_directory('');
						$this->set_class($x[0]);
						$this->set_method(isset($x[1]) ? $x[1] : 'index');

						return $x;
>>>>>>> Kmom03 - Create a codeigniter guestbook
					}
					else
					{
						show_404($this->fetch_directory().$segments[0]);
					}
				}
			}
			else
			{
				// Is the method being specified in the route?
<<<<<<< HEAD
				$segments = explode('/', $this->default_controller);
				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$segments[0].'.php'))
=======
				if (strpos($this->default_controller, '/') !== FALSE)
				{
					$x = explode('/', $this->default_controller);

					$this->set_class($x[0]);
					$this->set_method($x[1]);
				}
				else
				{
					$this->set_class($this->default_controller);
					$this->set_method('index');
				}

				// Does the default controller exist in the sub-folder?
				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$this->default_controller.'.php'))
>>>>>>> Kmom03 - Create a codeigniter guestbook
				{
					$this->directory = '';
				}
			}

			return $segments;
		}

		// If we've gotten this far it means that the URI does not correlate to a valid
		// controller class.  We will now see if there is an override
		if ( ! empty($this->routes['404_override']))
		{
<<<<<<< HEAD
			if (sscanf($this->routes['404_override'], '%[^/]/%s', $class, $method) !== 2)
			{
				$method = 'index';
			}
=======
			$x = explode('/', $this->routes['404_override']);

			$this->set_class($x[0]);
			$this->set_method(isset($x[1]) ? $x[1] : 'index');
>>>>>>> Kmom03 - Create a codeigniter guestbook

			return array($class, $method);
		}


		// Nothing else to do at this point but show a 404
		show_404($segments[0]);
	}

	// --------------------------------------------------------------------

	/**
	 *  Parse Routes
	 *
	 * Matches any routes that may exist in the config/routes.php file
	 * against the URI to determine if the class/method need to be remapped.
	 *
	 * @access	private
	 * @return	void
	 */
	function _parse_routes()
	{
		// Turn the segment array into a URI string
		$uri = implode('/', $this->uri->segments);

		// Is there a literal match?  If so we're done
		if (isset($this->routes[$uri]) && is_string($this->routes[$uri]))
		{
			return $this->_set_request(explode('/', $this->routes[$uri]));
		}

		// Loop through the route array looking for wild-cards
		foreach ($this->routes as $key => $val)
		{
			// Convert wild-cards to RegEx
<<<<<<< HEAD
			$key = str_replace(array(':any', ':num'), array('[^/]+', '[0-9]+'), $key);
=======
			$key = str_replace(':any', '.+', str_replace(':num', '[0-9]+', $key));
>>>>>>> Kmom03 - Create a codeigniter guestbook

			// Does the RegEx match?
			if (preg_match('#^'.$key.'$#', $uri, $matches))
			{
<<<<<<< HEAD
				// Are we using callbacks to process back-references?
				if ( ! is_string($val) && is_callable($val))
				{
					// Remove the original string from the matches array.
					array_shift($matches);

					// Get the match count.
					$match_count = count($matches);

					// Determine how many parameters the callback has.
					$reflection = new ReflectionFunction($val);
					$param_count = $reflection->getNumberOfParameters();

					// Are there more parameters than matches?
					if ($param_count > $match_count)
					{
						// Any params without matches will be set to an empty string.
						$matches = array_merge($matches, array_fill($match_count, $param_count - $match_count, ''));

						$match_count = $param_count;
					}

					// Get the parameters so we can use their default values.
					$params = $reflection->getParameters();

					for ($m = 0; $m < $match_count; $m++)
					{
						// Is the match empty and does a default value exist?
						if (empty($matches[$m]) && $params[$m]->isDefaultValueAvailable())
						{
							// Substitute the empty match for the default value.
							$matches[$m] = $params[$m]->getDefaultValue();
						}
					}

					// Execute the callback using the values in matches as its parameters.
					$val = call_user_func_array($val, $matches);
				}
				// Are we using the default routing method for back-references?
				elseif (strpos($val, '$') !== FALSE && strpos($key, '(') !== FALSE)
=======
				// Do we have a back-reference?
				if (strpos($val, '$') !== FALSE AND strpos($key, '(') !== FALSE)
>>>>>>> Kmom03 - Create a codeigniter guestbook
				{
					$val = preg_replace('#^'.$key.'$#', $val, $uri);
				}

				return $this->_set_request(explode('/', $val));
			}
		}

		// If we got this far it means we didn't encounter a
		// matching route so we'll set the site default route
		$this->_set_request($this->uri->segments);
	}

	// --------------------------------------------------------------------

	/**
	 * Set class name
	 *
<<<<<<< HEAD
	 * @param	string	$class	Class name
=======
	 * @access	public
	 * @param	string
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	void
	 */
	function set_class($class)
	{
		$this->class = str_replace(array('/', '.'), '', $class);
	}

	// --------------------------------------------------------------------

	/**
	 * Fetch the current class
	 *
	 * @access	public
	 * @return	string
	 */
	function fetch_class()
	{
		return $this->class;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Set method name
	 *
	 * @param	string	$method	Method name
=======
	 *  Set the method name
	 *
	 * @access	public
	 * @param	string
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	void
	 */
	function set_method($method)
	{
		$this->method = $method;
	}

	// --------------------------------------------------------------------

	/**
	 *  Fetch the current method
	 *
	 * @access	public
	 * @return	string
	 */
	function fetch_method()
	{
		if ($this->method == $this->fetch_class())
		{
			return 'index';
		}

		return $this->method;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Set directory name
	 *
	 * @param	string	$dir	Directory name
=======
	 *  Set the directory name
	 *
	 * @access	public
	 * @param	string
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	void
	 */
	function set_directory($dir)
	{
		$this->directory = str_replace(array('/', '.'), '', $dir).'/';
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Fetch directory
	 *
	 * Feches the sub-directory (if any) that contains the requested
	 * controller class.
=======
	 *  Fetch the sub-directory (if any) that contains the requested controller class
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 *
	 * @access	public
	 * @return	string
	 */
	function fetch_directory()
	{
		return $this->directory;
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Set controller overrides
	 *
	 * @param	array	$routing	Route overrides
	 * @return	void
=======
	 *  Set the controller overrides
	 *
	 * @access	public
	 * @param	array
	 * @return	null
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function _set_overrides($routing)
	{
		if ( ! is_array($routing))
		{
			return;
		}

		if (isset($routing['directory']))
		{
			$this->set_directory($routing['directory']);
		}

		if (isset($routing['controller']) AND $routing['controller'] != '')
		{
			$this->set_class($routing['controller']);
		}

		if (isset($routing['function']))
		{
			$routing['function'] = empty($routing['function']) ? 'index' : $routing['function'];
			$this->set_method($routing['function']);
		}
	}


}
// END Router Class

/* End of file Router.php */
/* Location: ./system/core/Router.php */