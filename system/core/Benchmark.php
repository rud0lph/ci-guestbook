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
 * Benchmark Class
 *
 * This class enables you to mark points and calculate the time difference
 * between them.  Memory consumption can also be displayed.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/benchmark.html
 */
class CI_Benchmark {

	/**
	 * List of all benchmark markers
	 *
	 * @var	array
	 */
<<<<<<< HEAD
	public $marker = array();
=======
	var $marker = array();

	// --------------------------------------------------------------------
>>>>>>> Kmom03 - Create a codeigniter guestbook

	/**
	 * Set a benchmark marker
	 *
	 * Multiple calls to this function can be made so that several
	 * execution points can be timed.
	 *
<<<<<<< HEAD
	 * @param	string	$name	Marker name
=======
	 * @access	public
	 * @param	string	$name	name of the marker
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	void
	 */
	function mark($name)
	{
		$this->marker[$name] = microtime();
	}

	// --------------------------------------------------------------------

	/**
	 * Elapsed time
	 *
	 * Calculates the time difference between two marked points.
	 *
	 * If the first parameter is empty this function instead returns the
	 * {elapsed_time} pseudo-variable. This permits the full system
	 * execution time to be shown in a template. The output class will
	 * swap the real value for this variable.
	 *
<<<<<<< HEAD
	 * @param	string	$point1		A particular marked point
	 * @param	string	$point2		A particular marked point
	 * @param	int	$decimals	Number of decimal places
	 *
	 * @return	string	Calculated elapsed time on success,
	 *			an '{elapsed_string}' if $point1 is empty
	 *			or an empty string if $point1 is not found.
=======
	 * @access	public
	 * @param	string	a particular marked point
	 * @param	string	a particular marked point
	 * @param	integer	the number of decimal places
	 * @return	mixed
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function elapsed_time($point1 = '', $point2 = '', $decimals = 4)
	{
		if ($point1 == '')
		{
			return '{elapsed_time}';
		}

		if ( ! isset($this->marker[$point1]))
		{
			return '';
		}

		if ( ! isset($this->marker[$point2]))
		{
			$this->marker[$point2] = microtime();
		}

		list($sm, $ss) = explode(' ', $this->marker[$point1]);
		list($em, $es) = explode(' ', $this->marker[$point2]);

		return number_format(($em + $es) - ($sm + $ss), $decimals);
	}

	// --------------------------------------------------------------------

	/**
	 * Memory Usage
	 *
	 * Simply returns the {memory_usage} marker.
	 *
	 * This permits it to be put it anywhere in a template
	 * without the memory being calculated until the end.
	 * The output class will swap the real value for this variable.
	 *
<<<<<<< HEAD
	 * @return	string	'{memory_usage}'
=======
	 * @access	public
	 * @return	string
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function memory_usage()
	{
		return '{memory_usage}';
	}

}

// END CI_Benchmark class

/* End of file Benchmark.php */
/* Location: ./system/core/Benchmark.php */