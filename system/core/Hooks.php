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
 * Hooks Class
 *
 * Provides a mechanism to extend the base system without hacking.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/encryption.html
 */
class CI_Hooks {

	/**
	 * Determines wether hooks are enabled
	 *
	 * @var	bool
	 */
<<<<<<< HEAD
	public $enabled = FALSE;

=======
	var $enabled		= FALSE;
>>>>>>> Kmom03 - Create a codeigniter guestbook
	/**
	 * List of all hooks set in config/hooks.php
	 *
	 * @var	array
	 */
	var $hooks			= array();
	/**
<<<<<<< HEAD
	 * In progress flag
	 *
	 * Determines whether hook is in progress, used to prevent infinte loops
=======
	 * Determines wether hook is in progress, used to prevent infinte loops
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 *
	 * @var	bool
	 */
<<<<<<< HEAD
	protected $_in_progress = FALSE;
=======
	var $in_progress	= FALSE;

	/**
	 * Constructor
	 *
	 */
	function __construct()
	{
		$this->_initialize();
		log_message('debug', "Hooks Class Initialized");
	}

	// --------------------------------------------------------------------
>>>>>>> Kmom03 - Create a codeigniter guestbook

	/**
	 * Class constructor
	 *
	 * @access	private
	 * @return	void
	 */
	function _initialize()
	{
		$CFG =& load_class('Config', 'core');

		// If hooks are not enabled in the config file
		// there is nothing else to do

		if ($CFG->item('enable_hooks') == FALSE)
		{
			return;
		}

		// Grab the "hooks" definition file.
		// If there are no hooks, we're done.

		if (defined('ENVIRONMENT') AND is_file(APPPATH.'config/'.ENVIRONMENT.'/hooks.php'))
		{
		    include(APPPATH.'config/'.ENVIRONMENT.'/hooks.php');
		}
		elseif (is_file(APPPATH.'config/hooks.php'))
		{
			include(APPPATH.'config/hooks.php');
		}


		if ( ! isset($hook) OR ! is_array($hook))
		{
			return;
		}

		$this->hooks =& $hook;
		$this->enabled = TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Call Hook
	 *
	 * Calls a particular hook
	 *
<<<<<<< HEAD
	 * @uses	CI_Hooks::_run_hook()
	 *
	 * @param	string	$which	Hook name
	 * @return	bool	TRUE on success or FALSE on failure
=======
	 * @access	private
	 * @param	string	the hook name
	 * @return	mixed
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function _call_hook($which = '')
	{
		if ( ! $this->enabled OR ! isset($this->hooks[$which]))
		{
			return FALSE;
		}

		if (isset($this->hooks[$which][0]) AND is_array($this->hooks[$which][0]))
		{
			foreach ($this->hooks[$which] as $val)
			{
				$this->_run_hook($val);
			}
		}
		else
		{
			$this->_run_hook($this->hooks[$which]);
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Run Hook
	 *
	 * Runs a particular hook
	 *
<<<<<<< HEAD
	 * @param	array	$data	Hook details
	 * @return	bool	TRUE on success or FALSE on failure
=======
	 * @access	private
	 * @param	array	the hook details
	 * @return	bool
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function _run_hook($data)
	{
		if ( ! is_array($data))
		{
			return FALSE;
		}

		// -----------------------------------
		// Safety - Prevents run-away loops
		// -----------------------------------

		// If the script being called happens to have the same
		// hook call within it a loop can happen
<<<<<<< HEAD
		if ($this->_in_progress === TRUE)
=======

		if ($this->in_progress == TRUE)
>>>>>>> Kmom03 - Create a codeigniter guestbook
		{
			return;
		}

		// -----------------------------------
		// Set file path
		// -----------------------------------

		if ( ! isset($data['filepath']) OR ! isset($data['filename']))
		{
			return FALSE;
		}

		$filepath = APPPATH.$data['filepath'].'/'.$data['filename'];

		if ( ! file_exists($filepath))
		{
			return FALSE;
		}

<<<<<<< HEAD
		// Determine and class and/or function names
		$class		= empty($data['class']) ? FALSE : $data['class'];
		$function	= empty($data['function']) ? FALSE : $data['function'];
		$params		= isset($data['params']) ? $data['params'] : '';
=======
		// -----------------------------------
		// Set class/function name
		// -----------------------------------

		$class		= FALSE;
		$function	= FALSE;
		$params		= '';

		if (isset($data['class']) AND $data['class'] != '')
		{
			$class = $data['class'];
		}

		if (isset($data['function']))
		{
			$function = $data['function'];
		}

		if (isset($data['params']))
		{
			$params = $data['params'];
		}
>>>>>>> Kmom03 - Create a codeigniter guestbook

		if ($class === FALSE AND $function === FALSE)
		{
			return FALSE;
		}

		// Set the _in_progress flag
		$this->_in_progress = TRUE;

		// Call the requested class and/or function
		if ($class !== FALSE)
		{
			if ( ! class_exists($class))
			{
				require($filepath);
			}

			$HOOK = new $class();
			$HOOK->$function($params);
		}
		else
		{
			if ( ! function_exists($function))
			{
				require($filepath);
			}

			$function($params);
		}

		$this->_in_progress = FALSE;
		return TRUE;
	}

}

// END CI_Hooks class

/* End of file Hooks.php */
/* Location: ./system/core/Hooks.php */