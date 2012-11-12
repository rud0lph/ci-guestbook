<<<<<<< HEAD
<?php
=======
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
>>>>>>> Kmom03 - Create a codeigniter guestbook
/**
 * Code Igniter
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
 * Database Utility Class
 *
 * @category	Database
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
<<<<<<< HEAD
abstract class CI_DB_utility {

	/**
	 * Database object
	 *
	 * @var	object
	 */
	protected $db;

	// --------------------------------------------------------------------

	/**
	 * List databases statement
	 *
	 * @var	string
	 */
	protected $_list_databases		= FALSE;

	/**
	 * OPTIMIZE TABLE statement
	 *
	 * @var	string
	 */
	protected $_optimize_table	= FALSE;

	/**
	 * REPAIR TABLE statement
	 *
	 * @var	string
	 */
	protected $_repair_table	= FALSE;

	// --------------------------------------------------------------------

	/**
	 * Class constructor
	 *
	 * @param	object	&$db	Database object
	 * @return	void
	 */
	public function __construct(&$db)
	{
		$this->db =& $db;
		log_message('debug', 'Database Utility Class Initialized');
=======
class CI_DB_utility extends CI_DB_forge {

	var $db;
	var $data_cache		= array();

	/**
	 * Constructor
	 *
	 * Grabs the CI super object instance so we can access it.
	 *
	 */
	function __construct()
	{
		// Assign the main database object to $this->db
		$CI =& get_instance();
		$this->db =& $CI->db;

		log_message('debug', "Database Utility Class Initialized");
>>>>>>> Kmom03 - Create a codeigniter guestbook
	}

	// --------------------------------------------------------------------

	/**
	 * List databases
	 *
	 * @access	public
	 * @return	bool
	 */
	function list_databases()
	{
		// Is there a cached result?
<<<<<<< HEAD
		if (isset($this->db->data_cache['db_names']))
		{
			return $this->db->data_cache['db_names'];
		}
		elseif ($this->_list_databases === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}

		$this->db->data_cache['db_names'] = array();

		$query = $this->db->query($this->_list_databases);
		if ($query === FALSE)
=======
		if (isset($this->data_cache['db_names']))
>>>>>>> Kmom03 - Create a codeigniter guestbook
		{
			return $this->data_cache['db_names'];
		}

		$query = $this->db->query($this->_list_databases());
		$dbs = array();
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$dbs[] = current($row);
			}
		}

		$this->data_cache['db_names'] = $dbs;
		return $this->data_cache['db_names'];
	}

	// --------------------------------------------------------------------

	/**
	 * Determine if a particular database exists
	 *
<<<<<<< HEAD
	 * @param	string	$database_name
	 * @return	bool
=======
	 * @access	public
	 * @param	string
	 * @return	boolean
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function database_exists($database_name)
	{
		// Some databases won't have access to the list_databases() function, so
		// this is intended to allow them to override with their own functions as
		// defined in $driver_utility.php
		if (method_exists($this, '_database_exists'))
		{
			return $this->_database_exists($database_name);
		}
		else
		{
			return ( ! in_array($database_name, $this->list_databases())) ? FALSE : TRUE;
		}
	}


	// --------------------------------------------------------------------

	/**
	 * Optimize Table
	 *
<<<<<<< HEAD
	 * @param	string	$table_name
	 * @return	mixed
=======
	 * @access	public
	 * @param	string	the table name
	 * @return	bool
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function optimize_table($table_name)
	{
<<<<<<< HEAD
		if ($this->_optimize_table === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}
=======
		$sql = $this->_optimize_table($table_name);
>>>>>>> Kmom03 - Create a codeigniter guestbook

		if (is_bool($sql))
		{
				show_error('db_must_use_set');
		}

		$query = $this->db->query($sql);
		$res = $query->result_array();

		// Note: Due to a bug in current() that affects some versions
		// of PHP we can not pass function call directly into it
		return current($res);
	}

	// --------------------------------------------------------------------

	/**
	 * Optimize Database
	 *
	 * @access	public
	 * @return	array
	 */
	function optimize_database()
	{
<<<<<<< HEAD
		if ($this->_optimize_table === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}

=======
>>>>>>> Kmom03 - Create a codeigniter guestbook
		$result = array();
		foreach ($this->db->list_tables() as $table_name)
		{
			$sql = $this->_optimize_table($table_name);

			if (is_bool($sql))
			{
				return $sql;
			}

			$query = $this->db->query($sql);

			// Build the result array...
			// Note: Due to a bug in current() that affects some versions
			// of PHP we can not pass function call directly into it
			$res = $query->result_array();
			$res = current($res);
			$key = str_replace($this->db->database.'.', '', current($res));
			$keys = array_keys($res);
			unset($res[$keys[0]]);

			$result[$key] = $res;
		}

		return $result;
	}

	// --------------------------------------------------------------------

	/**
	 * Repair Table
	 *
<<<<<<< HEAD
	 * @param	string	$table_name
	 * @return	mixed
=======
	 * @access	public
	 * @param	string	the table name
	 * @return	bool
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function repair_table($table_name)
	{
<<<<<<< HEAD
		if ($this->_repair_table === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}
=======
		$sql = $this->_repair_table($table_name);
>>>>>>> Kmom03 - Create a codeigniter guestbook

		if (is_bool($sql))
		{
			return $sql;
		}

		$query = $this->db->query($sql);

		// Note: Due to a bug in current() that affects some versions
		// of PHP we can not pass function call directly into it
		$res = $query->result_array();
		return current($res);
	}

	// --------------------------------------------------------------------

	/**
	 * Generate CSV from a query result object
	 *
<<<<<<< HEAD
	 * @param	object	$query		Query result object
	 * @param	string	$delim		Delimiter (default: ,)
	 * @param	string	$newline	Newline character (default: \n)
	 * @param	string	$enclosure	Enclosure (default: ")
=======
	 * @access	public
	 * @param	object	The query result object
	 * @param	string	The delimiter - comma by default
	 * @param	string	The newline character - \n by default
	 * @param	string	The enclosure - double quote by default
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	string
	 */
	function csv_from_result($query, $delim = ",", $newline = "\n", $enclosure = '"')
	{
		if ( ! is_object($query) OR ! method_exists($query, 'list_fields'))
		{
			show_error('You must submit a valid result object');
		}

		$out = '';

		// First generate the headings from the table column names
		foreach ($query->list_fields() as $name)
		{
			$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $name).$enclosure.$delim;
		}

		$out = rtrim($out);
		$out .= $newline;

		// Next blast through the result array and build out the rows
		foreach ($query->result_array() as $row)
		{
			foreach ($row as $item)
			{
				$out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $item).$enclosure.$delim;
			}
			$out = rtrim($out);
			$out .= $newline;
		}

		return $out;
	}

	// --------------------------------------------------------------------

	/**
	 * Generate XML data from a query result object
	 *
<<<<<<< HEAD
	 * @param	object	$query	Query result object
	 * @param	array	$params	Any preferences
=======
	 * @access	public
	 * @param	object	The query result object
	 * @param	array	Any preferences
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	string
	 */
	function xml_from_result($query, $params = array())
	{
		if ( ! is_object($query) OR ! method_exists($query, 'list_fields'))
		{
			show_error('You must submit a valid result object');
		}

		// Set our default values
		foreach (array('root' => 'root', 'element' => 'element', 'newline' => "\n", 'tab' => "\t") as $key => $val)
		{
			if ( ! isset($params[$key]))
			{
				$params[$key] = $val;
			}
		}

		// Create variables for convenience
		extract($params);

		// Load the xml helper
		$CI =& get_instance();
		$CI->load->helper('xml');

		// Generate the result
		$xml = "<{$root}>".$newline;
		foreach ($query->result_array() as $row)
		{
			$xml .= $tab."<{$element}>".$newline;

			foreach ($row as $key => $val)
			{
				$xml .= $tab.$tab."<{$key}>".xml_convert($val)."</{$key}>".$newline;
			}
			$xml .= $tab."</{$element}>".$newline;
		}
		$xml .= "</$root>".$newline;

		return $xml;
	}

	// --------------------------------------------------------------------

	/**
	 * Database Backup
	 *
<<<<<<< HEAD
	 * @param	array	$params
=======
	 * @access	public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	void
	 */
	function backup($params = array())
	{
		// If the parameters have not been submitted as an
		// array then we know that it is simply the table
		// name, which is a valid short cut.
		if (is_string($params))
		{
			$params = array('tables' => $params);
		}

		// Set up our default preferences
		$prefs = array(
							'tables'		=> array(),
							'ignore'		=> array(),
							'filename'		=> '',
							'format'		=> 'gzip', // gzip, zip, txt
							'add_drop'		=> TRUE,
							'add_insert'	=> TRUE,
							'newline'		=> "\n"
						);

		// Did the user submit any preferences? If so set them....
		if (count($params) > 0)
		{
			foreach ($prefs as $key => $val)
			{
				if (isset($params[$key]))
				{
					$prefs[$key] = $params[$key];
				}
			}
		}

		// ------------------------------------------------------

		// Are we backing up a complete database or individual tables?
		// If no table names were submitted we'll fetch the entire table list
		if (count($prefs['tables']) == 0)
		{
			$prefs['tables'] = $this->db->list_tables();
		}

		// ------------------------------------------------------

		// Validate the format
		if ( ! in_array($prefs['format'], array('gzip', 'zip', 'txt'), TRUE))
		{
			$prefs['format'] = 'txt';
		}

		// ------------------------------------------------------

		// Is the encoder supported?  If not, we'll either issue an
		// error or use plain text depending on the debug settings
		if (($prefs['format'] == 'gzip' AND ! @function_exists('gzencode'))
		OR ($prefs['format'] == 'zip'  AND ! @function_exists('gzcompress')))
		{
			if ($this->db->db_debug)
			{
				return $this->db->display_error('db_unsupported_compression');
			}

			$prefs['format'] = 'txt';
		}

		// ------------------------------------------------------

		// Set the filename if not provided - Only needed with Zip files
		if ($prefs['filename'] == '' AND $prefs['format'] == 'zip')
		{
			$prefs['filename'] = (count($prefs['tables']) == 1) ? $prefs['tables'] : $this->db->database;
			$prefs['filename'] .= '_'.date('Y-m-d_H-i', time());
		}

		// ------------------------------------------------------

		// Was a Gzip file requested?
		if ($prefs['format'] == 'gzip')
		{
			return gzencode($this->_backup($prefs));
		}

		// ------------------------------------------------------

		// Was a text file requested?
		if ($prefs['format'] == 'txt')
		{
			return $this->_backup($prefs);
		}

		// ------------------------------------------------------

		// Was a Zip file requested?
		if ($prefs['format'] == 'zip')
		{
			// If they included the .zip file extension we'll remove it
			if (preg_match("|.+?\.zip$|", $prefs['filename']))
			{
				$prefs['filename'] = str_replace('.zip', '', $prefs['filename']);
			}

			// Tack on the ".sql" file extension if needed
			if ( ! preg_match("|.+?\.sql$|", $prefs['filename']))
			{
				$prefs['filename'] .= '.sql';
			}

			// Load the Zip class and output it

			$CI =& get_instance();
			$CI->load->library('zip');
			$CI->zip->add_data($prefs['filename'], $this->_backup($prefs));
			return $CI->zip->get_zip();
		}

	}

}


/* End of file DB_utility.php */
/* Location: ./system/database/DB_utility.php */