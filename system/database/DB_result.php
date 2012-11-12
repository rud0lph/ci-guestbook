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
 * Database Result Class
 *
 * This is the platform-independent result class.
 * This class will not be called directly. Rather, the adapter
 * class for the specific database will extend and instantiate it.
 *
 * @category	Database
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_result {

<<<<<<< HEAD
	/**
	 * Connection ID
	 *
	 * @var	resource|object
	 */
	public $conn_id;

	/**
	 * Result ID
	 *
	 * @var	resource|object
	 */
	public $result_id;

	/**
	 * Result Array
	 *
	 * @var	array[]
	 */
	public $result_array			= array();

	/**
	 * Result Object
	 *
	 * @var	object[]
	 */
	public $result_object			= array();

	/**
	 * Custom Result Object
	 *
	 * @var	object[]
	 */
	public $custom_result_object		= array();

	/**
	 * Current Row index
	 *
	 * @var	int
	 */
	public $current_row			= 0;

	/**
	 * Number of rows
	 *
	 * @var	int
	 */
	public $num_rows;

	/**
	 * Row data
	 *
	 * @var	array
	 */
	public $row_data;

	// --------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @param	object	$driver_object
	 * @return	void
	 */
	public function __construct(&$driver_object)
	{
		$this->conn_id = $driver_object->conn_id;
		$this->result_id = $driver_object->result_id;
	}

	// --------------------------------------------------------------------
=======
	var $conn_id				= NULL;
	var $result_id				= NULL;
	var $result_array			= array();
	var $result_object			= array();
	var $custom_result_object	= array();
	var $current_row			= 0;
	var $num_rows				= 0;
	var $row_data				= NULL;

>>>>>>> Kmom03 - Create a codeigniter guestbook

	/**
	 * Query result.  Acts as a wrapper function for the following functions.
	 *
<<<<<<< HEAD
	 * @param	string	$type	'object', 'array' or a custom class name
	 * @return	array
=======
	 * @access	public
	 * @param	string	can be "object" or "array"
	 * @return	mixed	either a result object or array
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function result($type = 'object')
	{
		if ($type == 'array') return $this->result_array();
		else if ($type == 'object') return $this->result_object();
		else return $this->custom_result_object($type);
	}

	// --------------------------------------------------------------------

	/**
	 * Custom query result.
	 *
<<<<<<< HEAD
	 * @param	string	$class_name
	 * @return	array
=======
	 * @param class_name A string that represents the type of object you want back
	 * @return array of objects
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function custom_result_object($class_name)
	{
		if (array_key_exists($class_name, $this->custom_result_object))
		{
			return $this->custom_result_object[$class_name];
		}

		if ($this->result_id === FALSE OR $this->num_rows() == 0)
		{
			return array();
		}

		// add the data to the object
		$this->_data_seek(0);
		$result_object = array();

		while ($row = $this->_fetch_object())
		{
			$object = new $class_name();

			foreach ($row as $key => $value)
			{
				$object->$key = $value;
			}

			$result_object[] = $object;
		}

		// return the array
		return $this->custom_result_object[$class_name] = $result_object;
	}

	// --------------------------------------------------------------------

	/**
	 * Query result.  "object" version.
	 *
	 * @access	public
	 * @return	object
	 */
	public function result_object()
	{
		if (count($this->result_object) > 0)
		{
			return $this->result_object;
		}

		// In the event that query caching is on the result_id variable
		// will return FALSE since there isn't a valid SQL resource so
		// we'll simply return an empty array.
		if ($this->result_id === FALSE OR $this->num_rows() == 0)
		{
			return array();
		}

		$this->_data_seek(0);
		while ($row = $this->_fetch_object())
		{
			$this->result_object[] = $row;
		}

		return $this->result_object;
	}

	// --------------------------------------------------------------------

	/**
	 * Query result.  "array" version.
	 *
	 * @access	public
	 * @return	array
	 */
	public function result_array()
	{
		if (count($this->result_array) > 0)
		{
			return $this->result_array;
		}

		// In the event that query caching is on the result_id variable
		// will return FALSE since there isn't a valid SQL resource so
		// we'll simply return an empty array.
		if ($this->result_id === FALSE OR $this->num_rows() == 0)
		{
			return array();
		}

		$this->_data_seek(0);
		while ($row = $this->_fetch_assoc())
		{
			$this->result_array[] = $row;
		}

		return $this->result_array;
	}

	// --------------------------------------------------------------------

	/**
	 * Row
	 *
	 * A wrapper method.
	 *
<<<<<<< HEAD
	 * @param	mixed	$n
	 * @param	string	$type	'object' or 'array'
	 * @return	mixed
=======
	 * @access	public
	 * @param	string
	 * @param	string	can be "object" or "array"
	 * @return	mixed	either a result object or array
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function row($n = 0, $type = 'object')
	{
		if ( ! is_numeric($n))
		{
			// We cache the row data for subsequent uses
			is_array($this->row_data) OR $this->row_data = $this->row_array(0);

			// array_key_exists() instead of isset() to allow for NULL values
			if (empty($this->row_data) OR ! array_key_exists($n, $this->row_data))
			{
				return NULL;
			}

			return $this->row_data[$n];
		}

		if ($type == 'object') return $this->row_object($n);
		else if ($type == 'array') return $this->row_array($n);
		else return $this->custom_row_object($n, $type);
	}

	// --------------------------------------------------------------------

	/**
	 * Assigns an item into a particular column slot
	 *
<<<<<<< HEAD
	 * @param	mixed	$key
	 * @param	mixed	$value
	 * @return	void
=======
	 * @access	public
	 * @return	object
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function set_row($key, $value = NULL)
	{
		// We cache the row data for subsequent uses
		if ( ! is_array($this->row_data))
		{
			$this->row_data = $this->row_array(0);
		}

		if (is_array($key))
		{
			foreach ($key as $k => $v)
			{
				$this->row_data[$k] = $v;
			}

			return;
		}

		if ($key != '' AND ! is_null($value))
		{
			$this->row_data[$key] = $value;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Returns a single result row - custom object version
	 *
<<<<<<< HEAD
	 * @param	int	$n
	 * @param	string	$type
=======
	 * @access	public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	object
	 */
	public function custom_row_object($n, $type)
	{
		$result = $this->custom_result_object($type);

		if (count($result) == 0)
		{
			return $result;
		}

		if ($n != $this->current_row AND isset($result[$n]))
		{
			$this->current_row = $n;
		}

		return $result[$this->current_row];
	}

	/**
	 * Returns a single result row - object version
	 *
<<<<<<< HEAD
	 * @param	int	$n
=======
	 * @access	public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	object
	 */
	public function row_object($n = 0)
	{
		$result = $this->result_object();

		if (count($result) == 0)
		{
			return $result;
		}

		if ($n != $this->current_row AND isset($result[$n]))
		{
			$this->current_row = $n;
		}

		return $result[$this->current_row];
	}

	// --------------------------------------------------------------------

	/**
	 * Returns a single result row - array version
	 *
<<<<<<< HEAD
	 * @param	int	$n
=======
	 * @access	public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	array
	 */
	public function row_array($n = 0)
	{
		$result = $this->result_array();

		if (count($result) == 0)
		{
			return $result;
		}

		if ($n != $this->current_row AND isset($result[$n]))
		{
			$this->current_row = $n;
		}

		return $result[$this->current_row];
	}


	// --------------------------------------------------------------------

	/**
	 * Returns the "first" row
	 *
<<<<<<< HEAD
	 * @param	string	$type
	 * @return	mixed
=======
	 * @access	public
	 * @return	object
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function first_row($type = 'object')
	{
		$result = $this->result($type);

		if (count($result) == 0)
		{
			return $result;
		}
		return $result[0];
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the "last" row
	 *
<<<<<<< HEAD
	 * @param	string	$type
	 * @return	mixed
=======
	 * @access	public
	 * @return	object
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function last_row($type = 'object')
	{
		$result = $this->result($type);

		if (count($result) == 0)
		{
			return $result;
		}
		return $result[count($result) -1];
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the "next" row
	 *
<<<<<<< HEAD
	 * @param	string	$type
	 * @return	mixed
=======
	 * @access	public
	 * @return	object
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function next_row($type = 'object')
	{
		$result = $this->result($type);

		if (count($result) == 0)
		{
			return $result;
		}

		if (isset($result[$this->current_row + 1]))
		{
			++$this->current_row;
		}

		return $result[$this->current_row];
	}

	// --------------------------------------------------------------------

	/**
	 * Returns the "previous" row
	 *
<<<<<<< HEAD
	 * @param	string	$type
	 * @return	mixed
=======
	 * @access	public
	 * @return	object
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function previous_row($type = 'object')
	{
		$result = $this->result($type);

		if (count($result) == 0)
		{
			return $result;
		}

		if (isset($result[$this->current_row - 1]))
		{
			--$this->current_row;
		}
		return $result[$this->current_row];
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Returns an unbuffered row and move pointer to next row
	 *
	 * @param	string	$type	'array', 'object' or a custom class name
	 * @return	mixed
	 */
	public function unbuffered_row($type = 'object')
	{
		if ($type === 'array')
		{
			return $this->_fetch_assoc();
		}
		elseif ($type === 'object')
		{
			return $this->_fetch_object();
		}

		return $this->_fetch_object($type);
	}

	// --------------------------------------------------------------------

	/**
	 * The following methods are normally overloaded by the identically named
=======
	 * The following functions are normally overloaded by the identically named
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * methods in the platform-specific driver -- except when query caching
	 * is used.  When caching is enabled we do not load the other driver.
	 * These functions are primarily here to prevent undefined function errors
	 * when a cached result object is in use.  They are not otherwise fully
	 * operational due to the unavailability of the database resource IDs with
	 * cached results.
	 */
<<<<<<< HEAD

	// --------------------------------------------------------------------

	/**
	 * Number of fields in the result set
	 *
	 * Overriden by driver result classes.
	 *
	 * @return	int
	 */
	public function num_fields()
	{
		return 0;
	}

	// --------------------------------------------------------------------

	/**
	 * Fetch Field Names
	 *
	 * Generates an array of column names.
	 *
	 * Overriden by driver result classes.
	 *
	 * @return	array
	 */
	public function list_fields()
	{
		return array();
	}

	// --------------------------------------------------------------------

	/**
	 * Field data
	 *
	 * Generates an array of objects containing field meta-data.
	 *
	 * Overriden by driver result classes.
	 *
	 * @return	array
	 */
	public function field_data()
	{
		return array();
	}

	// --------------------------------------------------------------------

	/**
	 * Free the result
	 *
	 * Overriden by driver result classes.
	 *
	 * @return	void
	 */
	public function free_result()
	{
		$this->result_id = FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Data Seek
	 *
	 * Moves the internal pointer to the desired offset. We call
	 * this internally before fetching results to make sure the
	 * result set starts at zero.
	 *
	 * Overriden by driver result classes.
	 *
	 * @param	int	$n
	 * @return	bool
	 */
	protected function _data_seek($n = 0)
	{
		return FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Result - associative array
	 *
	 * Returns the result set as an array.
	 *
	 * Overriden by driver result classes.
	 *
	 * @return	array
	 */
	protected function _fetch_assoc()
	{
		return array();
	}

	// --------------------------------------------------------------------

	/**
	 * Result - object
	 *
	 * Returns the result set as an object.
	 *
	 * Overriden by driver result classes.
	 *
	 * @param	string	$class_name
	 * @return	object
	 */
	protected function _fetch_object($class_name = 'stdClass')
	{
		return array();
	}
=======
	public function num_rows() { return $this->num_rows; }
	public function num_fields() { return 0; }
	public function list_fields() { return array(); }
	public function field_data() { return array(); }
	public function free_result() { return TRUE; }
	protected function _data_seek() { return TRUE; }
	protected function _fetch_assoc() { return array(); }
	protected function _fetch_object() { return array(); }
>>>>>>> Kmom03 - Create a codeigniter guestbook

}
// END DB_result class

/* End of file DB_result.php */
/* Location: ./system/database/DB_result.php */
