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
 * @since		Version 1.3.1
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * Unit Testing Class
 *
 * Simple testing class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	UnitTesting
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/uri.html
 */
class CI_Unit_test {

<<<<<<< HEAD
	/**
	 * Active flag
	 *
	 * @var	bool
	 */
	public $active			= TRUE;

	/**
	 * Test results
	 *
	 * @var	array
	 */
	public $results			= array();

	/**
	 * Strict comparison flag
	 *
	 * Whether to use === or == when comparing
	 *
	 * @var	bool
	 */
	public $strict			= FALSE;

	/**
	 * Template
	 *
	 * @var	string
	 */
	protected $_template		= NULL;

	/**
	 * Template rows
	 *
	 * @var	string
	 */
	protected $_template_rows	= NULL;

	/**
	 * List of visible test items
	 *
	 * @var	array
	 */
	protected $_test_items_visible	= array();
=======
	var $active					= TRUE;
	var $results				= array();
	var $strict					= FALSE;
	var $_template				= NULL;
	var $_template_rows			= NULL;
	var $_test_items_visible	= array();
>>>>>>> Kmom03 - Create a codeigniter guestbook

	// --------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		// These are the default items visible when a test is run.
		$this->_test_items_visible = array (
							'test_name',
							'test_datatype',
							'res_datatype',
							'result',
							'file',
							'line',
							'notes'
						);

		log_message('debug', "Unit Testing Class Initialized");
	}

	// --------------------------------------------------------------------

	/**
	 * Run the tests
	 *
	 * Runs the supplied tests
	 *
	 * @access	public
	 * @param	array
	 * @return	void
	 */
	function set_test_items($items = array())
	{
		if ( ! empty($items) AND is_array($items))
		{
			$this->_test_items_visible = $items;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Run the tests
	 *
	 * Runs the supplied tests
	 *
<<<<<<< HEAD
	 * @param	mixed	$test
	 * @param	mixed	$expected
	 * @param	string	$test_name
	 * @param	string	$notes
=======
	 * @access	public
	 * @param	mixed
	 * @param	mixed
	 * @param	string
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	string
	 */
	function run($test, $expected = TRUE, $test_name = 'undefined', $notes = '')
	{
		if ($this->active == FALSE)
		{
			return FALSE;
		}

		if (in_array($expected, array('is_object', 'is_string', 'is_bool', 'is_true', 'is_false', 'is_int', 'is_numeric', 'is_float', 'is_double', 'is_array', 'is_null'), TRUE))
		{
			$expected = str_replace('is_float', 'is_double', $expected);
			$result = ($expected($test)) ? TRUE : FALSE;
			$extype = str_replace(array('true', 'false'), 'bool', str_replace('is_', '', $expected));
		}
		else
		{
<<<<<<< HEAD
			$result = ($this->strict === TRUE) ? ($test === $expected) : ($test == $expected);
=======
			if ($this->strict == TRUE)
				$result = ($test === $expected) ? TRUE : FALSE;
			else
				$result = ($test == $expected) ? TRUE : FALSE;

>>>>>>> Kmom03 - Create a codeigniter guestbook
			$extype = gettype($expected);
		}

		$back = $this->_backtrace();

		$report = array (
							'test_name'			=> $test_name,
							'test_datatype'		=> gettype($test),
							'res_datatype'		=> $extype,
							'result'			=> ($result === TRUE) ? 'passed' : 'failed',
							'file'				=> $back['file'],
							'line'				=> $back['line'],
							'notes'				=> $notes
						);

		$this->results[] = $report;

<<<<<<< HEAD
		return $this->report($this->result(array($report)));
=======
		return($this->report($this->result($report)));
>>>>>>> Kmom03 - Create a codeigniter guestbook
	}

	// --------------------------------------------------------------------

	/**
	 * Generate a report
	 *
	 * Displays a table with the test data
	 *
<<<<<<< HEAD
	 * @param	array	 $result
=======
	 * @access	public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	string
	 */
	function report($result = array())
	{
		if (count($result) == 0)
		{
			$result = $this->result();
		}

		$CI =& get_instance();
		$CI->load->language('unit_test');

		$this->_parse_template();

		$r = '';
		foreach ($result as $res)
		{
			$table = '';

			foreach ($res as $key => $val)
			{
				if ($key == $CI->lang->line('ut_result'))
				{
					if ($val == $CI->lang->line('ut_passed'))
					{
						$val = '<span style="color: #0C0;">'.$val.'</span>';
					}
					elseif ($val == $CI->lang->line('ut_failed'))
					{
						$val = '<span style="color: #C00;">'.$val.'</span>';
					}
				}

				$temp = $this->_template_rows;
				$temp = str_replace('{item}', $key, $temp);
				$temp = str_replace('{result}', $val, $temp);
				$table .= $temp;
			}

			$r .= str_replace('{rows}', $table, $this->_template);
		}

		return $r;
	}

	// --------------------------------------------------------------------

	/**
	 * Use strict comparison
	 *
	 * Causes the evaluation to use === rather than ==
	 *
	 * @access	public
	 * @param	bool
	 * @return	null
	 */
	function use_strict($state = TRUE)
	{
		$this->strict = ($state == FALSE) ? FALSE : TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Make Unit testing active
	 *
	 * Enables/disables unit testing
	 *
	 * @access	public
	 * @param	bool
	 * @return	null
	 */
	function active($state = TRUE)
	{
		$this->active = ($state == FALSE) ? FALSE : TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Result Array
	 *
	 * Returns the raw result data
	 *
<<<<<<< HEAD
	 * @param	array	$results
=======
	 * @access	public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	array
	 */
	function result($results = array())
	{
		$CI =& get_instance();
		$CI->load->language('unit_test');

		if (count($results) == 0)
		{
			$results = $this->results;
		}

		$retval = array();
		foreach ($results as $result)
		{
			$temp = array();
			foreach ($result as $key => $val)
			{
				if ( ! in_array($key, $this->_test_items_visible))
				{
					continue;
				}

				if (FALSE !== ($line = $CI->lang->line(strtolower('ut_'.$val))))
				{
<<<<<<< HEAD
					$val = $line;
=======
					foreach ($val as $k => $v)
					{
						if (FALSE !== ($line = $CI->lang->line(strtolower('ut_'.$v))))
						{
							$v = $line;
						}
						$temp[$CI->lang->line('ut_'.$k)] = $v;
					}
				}
				else
				{
					if (FALSE !== ($line = $CI->lang->line(strtolower('ut_'.$val))))
					{
						$val = $line;
					}
					$temp[$CI->lang->line('ut_'.$key)] = $val;
>>>>>>> Kmom03 - Create a codeigniter guestbook
				}
				$temp[$CI->lang->line('ut_'.$key)] = $val;
			}

			$retval[] = $temp;
		}

		return $retval;
	}

	// --------------------------------------------------------------------

	/**
	 * Set the template
	 *
	 * This lets us set the template to be used to display results
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function set_template($template)
	{
		$this->_template = $template;
	}

	// --------------------------------------------------------------------

	/**
	 * Generate a backtrace
	 *
	 * This lets us show file names and line numbers
	 *
	 * @access	private
	 * @return	array
	 */
	function _backtrace()
	{
		if (function_exists('debug_backtrace'))
		{
			$back = debug_backtrace();

			$file = ( ! isset($back['1']['file'])) ? '' : $back['1']['file'];
			$line = ( ! isset($back['1']['line'])) ? '' : $back['1']['line'];

			return array('file' => $file, 'line' => $line);
		}
		return array('file' => 'Unknown', 'line' => 'Unknown');
	}

	// --------------------------------------------------------------------

	/**
	 * Get Default Template
	 *
	 * @access	private
	 * @return	string
	 */
	function _default_template()
	{
		$this->_template = "\n".'<table style="width:100%; font-size:small; margin:10px 0; border-collapse:collapse; border:1px solid #CCC;">';
		$this->_template .= '{rows}';
		$this->_template .= "\n".'</table>';

		$this->_template_rows = "\n\t".'<tr>';
		$this->_template_rows .= "\n\t\t".'<th style="text-align: left; border-bottom:1px solid #CCC;">{item}</th>';
		$this->_template_rows .= "\n\t\t".'<td style="border-bottom:1px solid #CCC;">{result}</td>';
		$this->_template_rows .= "\n\t".'</tr>';
	}

	// --------------------------------------------------------------------

	/**
	 * Parse Template
	 *
	 * Harvests the data within the template {pseudo-variables}
	 *
	 * @access	private
	 * @return	void
	 */
	function _parse_template()
	{
		if ( ! is_null($this->_template_rows))
		{
			return;
		}

		if (is_null($this->_template))
		{
			$this->_default_template();
			return;
		}

		if ( ! preg_match("/\{rows\}(.*?)\{\/rows\}/si", $this->_template, $match))
		{
			$this->_default_template();
			return;
		}

		$this->_template_rows = $match['1'];
		$this->_template = str_replace($match['0'], '{rows}', $this->_template);
	}

}
// END Unit_test Class

/**
 * Helper function to test boolean TRUE
 *
<<<<<<< HEAD
 * @param	mixed	$test
=======
 *
 * @access	private
>>>>>>> Kmom03 - Create a codeigniter guestbook
 * @return	bool
 */
function is_true($test)
{
	return (is_bool($test) AND $test === TRUE) ? TRUE : FALSE;
}

/**
 * Helper function to test boolean FALSE
 *
 * @param	mixed	$test
 * @return	bool
 */
function is_false($test)
{
	return (is_bool($test) AND $test === FALSE) ? TRUE : FALSE;
}


/* End of file Unit_test.php */
/* Location: ./system/libraries/Unit_test.php */
