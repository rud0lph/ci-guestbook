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
 * Postgre Database Adapter Class
 *
 * Note: _DB is an extender class that the app controller
 * creates dynamically based on whether the active record
 * class is being used or not.
 *
 * @package		CodeIgniter
 * @subpackage	Drivers
 * @category	Database
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_postgre_driver extends CI_DB {

<<<<<<< HEAD
	/**
	 * Database driver
	 *
	 * @var	string
	 */
	public $dbdriver = 'postgre';

	/**
	 * Database schema
	 *
	 * @var	string
	 */
	public $schema = 'public';

	// --------------------------------------------------------------------

	/**
	 * ORDER BY random keyword
	 *
	 * @var	string
	 */
	protected $_random_keyword = ' RANDOM()'; // database specific random keyword
=======
	var $dbdriver = 'postgre';

	var $_escape_char = '"';

	// clause and character used for LIKE escape sequences
	var $_like_escape_str = " ESCAPE '%s' ";
	var $_like_escape_chr = '!';
>>>>>>> Kmom03 - Create a codeigniter guestbook

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Class constructor
	 *
	 * Creates a DSN string to be used for db_connect() and db_pconnect()
	 *
	 * @param	array	$params
	 * @return	void
=======
	 * The syntax to count rows is slightly different across different
	 * database engines, so this string appears in each driver and is
	 * used for the count_all() and count_all_results() functions.
	 */
	var $_count_string = "SELECT COUNT(*) AS ";
	var $_random_keyword = ' RANDOM()'; // database specific random keyword

	/**
	 * Connection String
	 *
	 * @access	private
	 * @return	string
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function _connect_string()
	{
		$components = array(
								'hostname'	=> 'host',
								'port'		=> 'port',
								'database'	=> 'dbname',
								'username'	=> 'user',
								'password'	=> 'password'
							);

		$connect_string = "";
		foreach ($components as $key => $val)
		{
			if (isset($this->$key) && $this->$key != '')
			{
				$connect_string .= " $val=".$this->$key;
			}
		}
		return trim($connect_string);
	}

	// --------------------------------------------------------------------

	/**
	 * Non-persistent database connection
	 *
	 * @access	private called by the base class
	 * @return	resource
	 */
	function db_connect()
	{
		return @pg_connect($this->_connect_string());
	}

	// --------------------------------------------------------------------

	/**
	 * Persistent database connection
	 *
	 * @access	private called by the base class
	 * @return	resource
	 */
	function db_pconnect()
	{
		return @pg_pconnect($this->_connect_string());
	}

	// --------------------------------------------------------------------

	/**
	 * Reconnect
	 *
	 * Keep / reestablish the db connection if no queries have been
	 * sent for a length of time exceeding the server's idle timeout
	 *
	 * @access	public
	 * @return	void
	 */
	function reconnect()
	{
		if (pg_ping($this->conn_id) === FALSE)
		{
			$this->conn_id = FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Select the database
	 *
	 * @access	private called by the base class
	 * @return	resource
	 */
	function db_select()
	{
		// Not needed for Postgre so we'll return TRUE
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Set client character set
	 *
<<<<<<< HEAD
	 * @param	string	$charset
	 * @return	bool
=======
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	resource
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function db_set_charset($charset, $collation)
	{
		// @todo - add support if needed
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Version number query string
	 *
	 * @access	public
	 * @return	string
	 */
	function _version()
	{
<<<<<<< HEAD
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}
		elseif ( ! $this->conn_id)
		{
			$this->initialize();
		}

		if ( ! $this->conn_id OR ($pg_version = pg_version($this->conn_id)) === FALSE)
		{
			return FALSE;
		}

		/* If PHP was compiled with PostgreSQL lib versions earlier
		 * than 7.4, pg_version() won't return the server version
		 * and so we'll have to fall back to running a query in
		 * order to get it.
		 */
		return isset($pg_version['server'])
			? $this->data_cache['version'] = $pg_version['server']
			: parent::version();
=======
		return "SELECT version() AS ver";
>>>>>>> Kmom03 - Create a codeigniter guestbook
	}

	// --------------------------------------------------------------------

	/**
	 * Execute the query
	 *
<<<<<<< HEAD
	 * @param	string	$sql	an SQL query
=======
	 * @access	private called by the base class
	 * @param	string	an SQL query
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	resource
	 */
	function _execute($sql)
	{
		$sql = $this->_prep_query($sql);
		return @pg_query($this->conn_id, $sql);
	}

	// --------------------------------------------------------------------

	/**
	 * Prep the query
	 *
	 * If needed, each database adapter can prep the query string
	 *
	 * @access	private called by execute()
	 * @param	string	an SQL query
	 * @return	string
	 */
	function _prep_query($sql)
	{
		return $sql;
	}

	// --------------------------------------------------------------------

	/**
	 * Begin Transaction
	 *
<<<<<<< HEAD
	 * @param	bool	$test_mode
=======
	 * @access	public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	bool
	 */
	function trans_begin($test_mode = FALSE)
	{
		if ( ! $this->trans_enabled)
		{
			return TRUE;
		}

		// When transactions are nested we only begin/commit/rollback the outermost ones
		if ($this->_trans_depth > 0)
		{
			return TRUE;
		}

		// Reset the transaction failure flag.
		// If the $test_mode flag is set to TRUE transactions will be rolled back
		// even if the queries produce a successful result.
		$this->_trans_failure = ($test_mode === TRUE) ? TRUE : FALSE;

		return @pg_exec($this->conn_id, "begin");
	}

	// --------------------------------------------------------------------

	/**
	 * Commit Transaction
	 *
	 * @access	public
	 * @return	bool
	 */
	function trans_commit()
	{
		if ( ! $this->trans_enabled)
		{
			return TRUE;
		}

		// When transactions are nested we only begin/commit/rollback the outermost ones
		if ($this->_trans_depth > 0)
		{
			return TRUE;
		}

		return @pg_exec($this->conn_id, "commit");
	}

	// --------------------------------------------------------------------

	/**
	 * Rollback Transaction
	 *
	 * @access	public
	 * @return	bool
	 */
	function trans_rollback()
	{
		if ( ! $this->trans_enabled)
		{
			return TRUE;
		}

		// When transactions are nested we only begin/commit/rollback the outermost ones
		if ($this->_trans_depth > 0)
		{
			return TRUE;
		}

		return @pg_exec($this->conn_id, "rollback");
	}

	// --------------------------------------------------------------------

	/**
	 * Escape String
	 *
<<<<<<< HEAD
	 * @param	string	$str
	 * @param	bool	$like Whether or not the string will be used in a LIKE condition
=======
	 * @access	public
	 * @param	string
	 * @param	bool	whether or not the string will be used in a LIKE condition
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	string
	 */
	function escape_str($str, $like = FALSE)
	{
		if (is_array($str))
		{
			foreach ($str as $key => $val)
			{
				$str[$key] = $this->escape_str($val, $like);
			}

			return $str;
		}

		$str = pg_escape_string($str);

		// escape LIKE condition wildcards
		if ($like === TRUE)
		{
			$str = str_replace(	array('%', '_', $this->_like_escape_chr),
								array($this->_like_escape_chr.'%', $this->_like_escape_chr.'_', $this->_like_escape_chr.$this->_like_escape_chr),
								$str);
		}

		return $str;
	}

	// --------------------------------------------------------------------

	/**
	 * Affected Rows
	 *
<<<<<<< HEAD
	 * @param	string	$str
	 * @return	mixed
=======
	 * @access	public
	 * @return	integer
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function affected_rows()
	{
		return @pg_affected_rows($this->result_id);
	}

	// --------------------------------------------------------------------

	/**
	 * Insert ID
	 *
	 * @access	public
	 * @return	integer
	 */
	function insert_id()
	{
		$v = $this->_version();
		$v = $v['server'];

		$table	= func_num_args() > 0 ? func_get_arg(0) : NULL;
		$column	= func_num_args() > 1 ? func_get_arg(1) : NULL;

		if ($table == NULL && $v >= '8.1')
		{
			$sql='SELECT LASTVAL() as ins_id';
		}
		elseif ($table != NULL && $column != NULL && $v >= '8.0')
		{
			$sql = sprintf("SELECT pg_get_serial_sequence('%s','%s') as seq", $table, $column);
			$query = $this->query($sql);
			$row = $query->row();
			$sql = sprintf("SELECT CURRVAL('%s') as ins_id", $row->seq);
		}
		elseif ($table != NULL)
		{
			// seq_name passed in table parameter
			$sql = sprintf("SELECT CURRVAL('%s') as ins_id", $table);
		}
		else
		{
			return pg_last_oid($this->result_id);
		}
		$query = $this->query($sql);
		$row = $query->row();
		return $row->ins_id;
	}

	// --------------------------------------------------------------------

	/**
	 * "Count All" query
	 *
	 * Generates a platform-specific query string that counts all records in
	 * the specified database
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function count_all($table = '')
	{
		if ($table == '')
		{
			return 0;
		}

		$query = $this->query($this->_count_string . $this->_protect_identifiers('numrows') . " FROM " . $this->_protect_identifiers($table, TRUE, NULL, FALSE));

		if ($query->num_rows() == 0)
		{
			return 0;
		}

		$row = $query->row();
		$this->_reset_select();
		return (int) $row->numrows;
	}

	// --------------------------------------------------------------------

	/**
	 * Show table query
	 *
	 * Generates a platform-specific query string so that the table names can be fetched
	 *
<<<<<<< HEAD
	 * @param	bool	$prefix_limit
=======
	 * @access	private
	 * @param	boolean
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	string
	 */
	function _list_tables($prefix_limit = FALSE)
	{
<<<<<<< HEAD
		$sql = 'SELECT "table_name" FROM "information_schema"."tables" WHERE "table_schema" = \''.$this->schema."'";
=======
		$sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'";
>>>>>>> Kmom03 - Create a codeigniter guestbook

		if ($prefix_limit !== FALSE AND $this->dbprefix != '')
		{
			$sql .= " AND table_name LIKE '".$this->escape_like_str($this->dbprefix)."%' ".sprintf($this->_like_escape_str, $this->_like_escape_chr);
		}

		return $sql;
	}

	// --------------------------------------------------------------------

	/**
	 * Show column query
	 *
	 * Generates a platform-specific query string so that the column names can be fetched
	 *
<<<<<<< HEAD
	 * @param	string	$table
=======
	 * @access	public
	 * @param	string	the table name
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	string
	 */
	function _list_columns($table = '')
	{
		return "SELECT column_name FROM information_schema.columns WHERE table_name ='".$table."'";
	}

	// --------------------------------------------------------------------

	/**
	 * Field data query
	 *
	 * Generates a platform-specific query so that the column data can be retrieved
	 *
<<<<<<< HEAD
	 * @param	string	$table
	 * @return	string
=======
	 * @access	public
	 * @param	string	the table name
	 * @return	object
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function _field_data($table)
	{
		return "SELECT * FROM ".$table." LIMIT 1";
	}

	// --------------------------------------------------------------------

	/**
	 * The error message string
	 *
	 * @access	private
	 * @return	string
	 */
	function _error_message()
	{
		return pg_last_error($this->conn_id);
	}

	// --------------------------------------------------------------------

	/**
	 * The error message number
	 *
	 * @access	private
	 * @return	integer
	 */
	function _error_number()
	{
		return '';
	}

	// --------------------------------------------------------------------

	/**
	 * Escape the SQL Identifiers
	 *
	 * This function escapes column and table names
	 *
<<<<<<< HEAD
	 * @param	string	$table
	 * @param	array	$values
	 * @return	string
	 */
	protected function _update($table, $values)
	{
		$this->qb_limit = FALSE;
		$this->qb_orderby = array();
		return parent::_update($table, $values);
=======
	 * @access	private
	 * @param	string
	 * @return	string
	 */
	function _escape_identifiers($item)
	{
		if ($this->_escape_char == '')
		{
			return $item;
		}

		foreach ($this->_reserved_identifiers as $id)
		{
			if (strpos($item, '.'.$id) !== FALSE)
			{
				$str = $this->_escape_char. str_replace('.', $this->_escape_char.'.', $item);

				// remove duplicates if the user already included the escape
				return preg_replace('/['.$this->_escape_char.']+/', $this->_escape_char, $str);
			}
		}

		if (strpos($item, '.') !== FALSE)
		{
			$str = $this->_escape_char.str_replace('.', $this->_escape_char.'.'.$this->_escape_char, $item).$this->_escape_char;
		}
		else
		{
			$str = $this->_escape_char.$item.$this->_escape_char;
		}

		// remove duplicates if the user already included the escape
		return preg_replace('/['.$this->_escape_char.']+/', $this->_escape_char, $str);
>>>>>>> Kmom03 - Create a codeigniter guestbook
	}

	// --------------------------------------------------------------------

	/**
	 * From Tables
	 *
	 * This function implicitly groups FROM tables so there is no confusion
	 * about operator precedence in harmony with SQL standards
	 *
<<<<<<< HEAD
	 * @param	string	$table	Table name
	 * @param	array	$values	Update data
	 * @param	string	$index	WHERE key
	 * @return	string
	 */
	protected function _update_batch($table, $values, $index)
=======
	 * @access	public
	 * @param	type
	 * @return	type
	 */
	function _from_tables($tables)
>>>>>>> Kmom03 - Create a codeigniter guestbook
	{
		if ( ! is_array($tables))
		{
			$tables = array($tables);
		}

		return implode(', ', $tables);
	}

<<<<<<< HEAD
		$this->where($index.' IN('.implode(',', $ids).')', NULL, FALSE);

		return 'UPDATE '.$table.' SET '.substr($cases, 0, -2).$this->_compile_wh('qb_where');
=======
	// --------------------------------------------------------------------

	/**
	 * Insert statement
	 *
	 * Generates a platform-specific insert string from the supplied data
	 *
	 * @access	public
	 * @param	string	the table name
	 * @param	array	the insert keys
	 * @param	array	the insert values
	 * @return	string
	 */
	function _insert($table, $keys, $values)
	{
		return "INSERT INTO ".$table." (".implode(', ', $keys).") VALUES (".implode(', ', $values).")";
>>>>>>> Kmom03 - Create a codeigniter guestbook
	}

	// --------------------------------------------------------------------

	/**
	 * Insert_batch statement
	 *
	 * Generates a platform-specific insert string from the supplied data
	 *
<<<<<<< HEAD
	 * @param	string	$table
	 * @return	string
	 */
	protected function _delete($table)
	{
		$this->qb_limit = FALSE;
		return parent::_delete($table);
=======
	 * @access  public
	 * @param   string  the table name
	 * @param   array   the insert keys
	 * @param   array   the insert values
	 * @return  string
	 */
	function _insert_batch($table, $keys, $values)
	{
		return "INSERT INTO ".$table." (".implode(', ', $keys).") VALUES ".implode(', ', $values);
	}

	// --------------------------------------------------------------------

	/**
	 * Update statement
	 *
	 * Generates a platform-specific update string from the supplied data
	 *
	 * @access	public
	 * @param	string	the table name
	 * @param	array	the update data
	 * @param	array	the where clause
	 * @param	array	the orderby clause
	 * @param	array	the limit clause
	 * @return	string
	 */
	function _update($table, $values, $where, $orderby = array(), $limit = FALSE)
	{
		foreach ($values as $key => $val)
		{
			$valstr[] = $key." = ".$val;
		}

		$limit = ( ! $limit) ? '' : ' LIMIT '.$limit;

		$orderby = (count($orderby) >= 1)?' ORDER BY '.implode(", ", $orderby):'';

		$sql = "UPDATE ".$table." SET ".implode(', ', $valstr);

		$sql .= ($where != '' AND count($where) >=1) ? " WHERE ".implode(" ", $where) : '';

		$sql .= $orderby.$limit;

		return $sql;
>>>>>>> Kmom03 - Create a codeigniter guestbook
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * LIMIT
=======
	 * Truncate statement
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 *
	 * Generates a platform-specific truncate string from the supplied data
	 * If the database does not support the truncate() command
	 * This function maps to "DELETE FROM table"
	 *
<<<<<<< HEAD
	 * @param	string	$sql	SQL Query
	 * @return	string
	 */
	protected function _limit($sql)
	{
		return $sql.' LIMIT '.$this->qb_limit.($this->qb_offset ? ' OFFSET '.$this->qb_offset : '');
=======
	 * @access	public
	 * @param	string	the table name
	 * @return	string
	 */
	function _truncate($table)
	{
		return "TRUNCATE ".$table;
>>>>>>> Kmom03 - Create a codeigniter guestbook
	}

	// --------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * WHERE, HAVING
	 *
	 * Called by where(), or_where(), having(), or_having()
	 *
	 * @param	string	'qb_where' or 'qb_having'
	 * @param	mixed
	 * @param	mixed
	 * @param	string
	 * @param	bool
	 * @return	object
	 */
	protected function _wh($qb_key, $key, $value = NULL, $type = 'AND ', $escape = NULL)
	{
		$qb_cache_key = ($qb_key === 'qb_having') ? 'qb_cache_having' : 'qb_cache_where';

		if ( ! is_array($key))
		{
			$key = array($key => $value);
		}

		// If the escape value was not set will will base it on the global setting
		is_bool($escape) OR $escape = $this->_protect_identifiers;
=======
	 * Delete statement
	 *
	 * Generates a platform-specific delete string from the supplied data
	 *
	 * @access	public
	 * @param	string	the table name
	 * @param	array	the where clause
	 * @param	string	the limit clause
	 * @return	string
	 */
	function _delete($table, $where = array(), $like = array(), $limit = FALSE)
	{
		$conditions = '';
>>>>>>> Kmom03 - Create a codeigniter guestbook

		if (count($where) > 0 OR count($like) > 0)
		{
<<<<<<< HEAD
			$prefix = (count($this->$qb_key) === 0 && count($this->$qb_cache_key) === 0)
				? $this->_group_get_type('')
				: $this->_group_get_type($type);

			if (is_null($v) && ! $this->_has_operator($k))
			{
				// value appears not to have been set, assign the test to IS NULL
				$k .= ' IS NULL';
			}

			if ( ! is_null($v))
			{
				if (is_bool($v))
				{
					$v = ' '.($v ? 'TRUE' : 'FALSE');
				}
				elseif ($escape === TRUE)
				{
					$v = ' '.(is_int($v) ? $v : $this->escape($v));
				}

				if ( ! $this->_has_operator($k))
				{
					$k .= ' = ';
				}
			}

			$this->{$qb_key}[] = array('condition' => $prefix.$k.$v, 'escape' => $escape);
			if ($this->qb_caching === TRUE)
			{
				$this->{$qb_cache_key}[] = array('condition' => $prefix.$k.$v, 'escape' => $escape);
				$this->qb_cache_exists[] = substr($qb_key, 3);
			}
=======
			$conditions = "\nWHERE ";
			$conditions .= implode("\n", $this->ar_where);

			if (count($where) > 0 && count($like) > 0)
			{
				$conditions .= " AND ";
			}
			$conditions .= implode("\n", $like);
		}

		$limit = ( ! $limit) ? '' : ' LIMIT '.$limit;

		return "DELETE FROM ".$table.$conditions.$limit;
	}

	// --------------------------------------------------------------------
	/**
	 * Limit string
	 *
	 * Generates a platform-specific LIMIT clause
	 *
	 * @access	public
	 * @param	string	the sql query string
	 * @param	integer	the number of rows to limit the query to
	 * @param	integer	the offset value
	 * @return	string
	 */
	function _limit($sql, $limit, $offset)
	{
		$sql .= "LIMIT ".$limit;
>>>>>>> Kmom03 - Create a codeigniter guestbook

		if ($offset > 0)
		{
			$sql .= " OFFSET ".$offset;
		}

		return $sql;
	}

	// --------------------------------------------------------------------

	/**
	 * Close DB Connection
	 *
	 * @access	public
	 * @param	resource
	 * @return	void
	 */
	function _close($conn_id)
	{
		@pg_close($conn_id);
	}


}


/* End of file postgre_driver.php */
/* Location: ./system/database/drivers/postgre/postgre_driver.php */