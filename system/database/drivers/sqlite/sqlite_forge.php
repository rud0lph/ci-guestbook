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
 * SQLite Forge Class
 *
 * @category	Database
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_sqlite_forge extends CI_DB_forge {

	/**
	 * CREATE TABLE IF statement
	 *
	 * @var	string
	 */
	protected $_create_table_if	= FALSE;

	/**
	 * UNSIGNED support
	 *
	 * @var	bool|array
	 */
	protected $_unsigned		= FALSE;

	/**
	 * NULL value representation in CREATE/ALTER TABLE statements
	 *
	 * @var	string
	 */
	protected $_null		= 'NULL';

	// --------------------------------------------------------------------

	/**
	 * Create database
	 *
<<<<<<< HEAD
	 * @param	string	$db_name	(ignored)
=======
	 * @access	public
	 * @param	string	the database name
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	bool
	 */
	function _create_database()
	{
		// In SQLite, a database is created when you connect to the database.
		// We'll return TRUE so that an error isn't generated
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Drop database
	 *
<<<<<<< HEAD
	 * @param	string	$db_name	(ignored)
=======
	 * @access	private
	 * @param	string	the database name
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	bool
	 */
	function _drop_database($name)
	{
		if ( ! @file_exists($this->db->database) OR ! @unlink($this->db->database))
		{
			if ($this->db->db_debug)
			{
				return $this->db->display_error('db_unable_to_drop');
			}
			return FALSE;
		}
		return TRUE;
	}
	// --------------------------------------------------------------------

	/**
	 * ALTER TABLE
	 *
<<<<<<< HEAD
	 * @todo	implement drop_column(), modify_column()
	 * @param	string	$alter_type	ALTER type
	 * @param	string	$table		Table name
	 * @param	mixed	$field		Column definition
	 * @return	string|string[]
	 */
	protected function _alter_table($alter_type, $table, $field)
	{
		if ($alter_type === 'DROP' OR $alter_type === 'CHANGE')
		{
			// drop_column():
			//	BEGIN TRANSACTION;
			//	CREATE TEMPORARY TABLE t1_backup(a,b);
			//	INSERT INTO t1_backup SELECT a,b FROM t1;
			//	DROP TABLE t1;
			//	CREATE TABLE t1(a,b);
			//	INSERT INTO t1 SELECT a,b FROM t1_backup;
			//	DROP TABLE t1_backup;
			//	COMMIT;

			return FALSE;
		}

		return parent::_alter_table($alter_type, $table, $field);
	}

	// --------------------------------------------------------------------
=======
	 * @access	private
	 * @param	string	the table name
	 * @param	array	the fields
	 * @param	mixed	primary key(s)
	 * @param	mixed	key(s)
	 * @param	boolean	should 'IF NOT EXISTS' be added to the SQL
	 * @return	bool
	 */
	function _create_table($table, $fields, $primary_keys, $keys, $if_not_exists)
	{
		$sql = 'CREATE TABLE ';

		// IF NOT EXISTS added to SQLite in 3.3.0
		if ($if_not_exists === TRUE && version_compare($this->db->_version(), '3.3.0', '>=') === TRUE)
		{
			$sql .= 'IF NOT EXISTS ';
		}

		$sql .= $this->db->_escape_identifiers($table)."(";
		$current_field_count = 0;

		foreach ($fields as $field=>$attributes)
		{
			// Numeric field names aren't allowed in databases, so if the key is
			// numeric, we know it was assigned by PHP and the developer manually
			// entered the field information, so we'll simply add it to the list
			if (is_numeric($field))
			{
				$sql .= "\n\t$attributes";
			}
			else
			{
				$attributes = array_change_key_case($attributes, CASE_UPPER);

				$sql .= "\n\t".$this->db->_protect_identifiers($field);

				$sql .=  ' '.$attributes['TYPE'];

				if (array_key_exists('CONSTRAINT', $attributes))
				{
					$sql .= '('.$attributes['CONSTRAINT'].')';
				}

				if (array_key_exists('UNSIGNED', $attributes) && $attributes['UNSIGNED'] === TRUE)
				{
					$sql .= ' UNSIGNED';
				}

				if (array_key_exists('DEFAULT', $attributes))
				{
					$sql .= ' DEFAULT \''.$attributes['DEFAULT'].'\'';
				}

				if (array_key_exists('NULL', $attributes) && $attributes['NULL'] === TRUE)
				{
					$sql .= ' NULL';
				}
				else
				{
					$sql .= ' NOT NULL';
				}

				if (array_key_exists('AUTO_INCREMENT', $attributes) && $attributes['AUTO_INCREMENT'] === TRUE)
				{
					$sql .= ' AUTO_INCREMENT';
				}
			}
>>>>>>> Kmom03 - Create a codeigniter guestbook

	/**
	 * Process column
	 *
	 * @param	array	$field
	 * @return	string
	 */
	protected function _process_column($field)
	{
		return $this->db->escape_identifiers($field['name'])
			.' '.$field['type']
			.$field['auto_increment']
			.$field['null']
			.$field['unique']
			.$field['default'];
	}

<<<<<<< HEAD
	// --------------------------------------------------------------------
=======
		if (count($primary_keys) > 0)
		{
			$primary_keys = $this->db->_protect_identifiers($primary_keys);
			$sql .= ",\n\tPRIMARY KEY (" . implode(', ', $primary_keys) . ")";
		}
>>>>>>> Kmom03 - Create a codeigniter guestbook

	/**
	 * Field attribute TYPE
	 *
	 * Performs a data type mapping between different databases.
	 *
	 * @param	array	&$attributes
	 * @return	void
	 */
	protected function _attr_type(&$attributes)
	{
		switch (strtoupper($attributes['TYPE']))
		{
<<<<<<< HEAD
			case 'ENUM':
			case 'SET':
				$attributes['TYPE'] = 'TEXT';
				return;
			default: return;
		}
=======
			foreach ($keys as $key)
			{
				if (is_array($key))
				{
					$key = $this->db->_protect_identifiers($key);
				}
				else
				{
					$key = array($this->db->_protect_identifiers($key));
				}

				$sql .= ",\n\tUNIQUE (" . implode(', ', $key) . ")";
			}
		}

		$sql .= "\n)";

		return $sql;
	}

	// --------------------------------------------------------------------

	/**
	 * Drop Table
	 *
	 *  Unsupported feature in SQLite
	 *
	 * @access	private
	 * @return	bool
	 */
	function _drop_table($table)
	{
		if ($this->db->db_debug)
		{
			return $this->db->display_error('db_unsuported_feature');
		}
		return array();
>>>>>>> Kmom03 - Create a codeigniter guestbook
	}

	// --------------------------------------------------------------------

	/**
	 * Field attribute AUTO_INCREMENT
	 *
<<<<<<< HEAD
	 * @param	array	&$attributes
	 * @param	array	&$field
	 * @return	void
	 */
	protected function _attr_auto_increment(&$attributes, &$field)
	{
		if ( ! empty($attributes['AUTO_INCREMENT']) && $attributes['AUTO_INCREMENT'] === TRUE && stripos($field['type'], 'int') !== FALSE)
		{
			$field['type'] = 'INTEGER PRIMARY KEY';
			$field['default'] = '';
			$field['null'] = '';
			$field['unique'] = '';
			$field['auto_increment'] = ' AUTOINCREMENT';

			$this->primary_keys = array();
		}
=======
	 * Generates a platform-specific query so that a table can be altered
	 * Called by add_column(), drop_column(), and column_alter(),
	 *
	 * @access	private
	 * @param	string	the ALTER type (ADD, DROP, CHANGE)
	 * @param	string	the column name
	 * @param	string	the table name
	 * @param	string	the column definition
	 * @param	string	the default value
	 * @param	boolean	should 'NOT NULL' be added
	 * @param	string	the field after which we should add the new field
	 * @return	object
	 */
	function _alter_table($alter_type, $table, $column_name, $column_definition = '', $default_value = '', $null = '', $after_field = '')
	{
		$sql = 'ALTER TABLE '.$this->db->_protect_identifiers($table)." $alter_type ".$this->db->_protect_identifiers($column_name);

		// DROP has everything it needs now.
		if ($alter_type == 'DROP')
		{
			// SQLite does not support dropping columns
			// http://www.sqlite.org/omitted.html
			// http://www.sqlite.org/faq.html#q11
			return FALSE;
		}

		$sql .= " $column_definition";

		if ($default_value != '')
		{
			$sql .= " DEFAULT \"$default_value\"";
		}

		if ($null === NULL)
		{
			$sql .= ' NULL';
		}
		else
		{
			$sql .= ' NOT NULL';
		}

		if ($after_field != '')
		{
			$sql .= ' AFTER ' . $this->db->_protect_identifiers($after_field);
		}

		return $sql;

>>>>>>> Kmom03 - Create a codeigniter guestbook
	}

	// --------------------------------------------------------------------

	/**
	 * Rename a table
	 *
	 * Generates a platform-specific query so that a table can be renamed
	 *
	 * @access	private
	 * @param	string	the old table name
	 * @param	string	the new table name
	 * @return	string
	 */
	function _rename_table($table_name, $new_table_name)
	{
		$sql = 'ALTER TABLE '.$this->db->_protect_identifiers($table_name)." RENAME TO ".$this->db->_protect_identifiers($new_table_name);
		return $sql;
	}
}

/* End of file sqlite_forge.php */
/* Location: ./system/database/drivers/sqlite/sqlite_forge.php */