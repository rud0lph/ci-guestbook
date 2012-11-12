<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		Esen Sagynov
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * CUBRID Forge Class
 *
 * @category	Database
 * @author		Esen Sagynov
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_cubrid_forge extends CI_DB_forge {

	/**
<<<<<<< HEAD
	 * CREATE DATABASE statement
	 *
	 * @var	string
	 */
	protected $_create_database	= FALSE;

	/**
	 * CREATE TABLE keys flag
	 *
	 * Whether table keys are created from within the
	 * CREATE TABLE statement.
	 *
	 * @var	bool
	 */
	protected $_create_table_keys	= TRUE;

	/**
	 * DROP DATABASE statement
	 *
	 * @var	string
	 */
	protected $_drop_database	= FALSE;
=======
	 * Create database
	 *
	 * @access	private
	 * @param	string	the database name
	 * @return	bool
	 */
	function _create_database($name)
	{
		// CUBRID does not allow to create a database in SQL. The GUI tools
		// have to be used for this purpose.
		return FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Drop database
	 *
	 * @access	private
	 * @param	string	the database name
	 * @return	bool
	 */
	function _drop_database($name)
	{
		// CUBRID does not allow to drop a database in SQL. The GUI tools
		// have to be used for this purpose.
		return FALSE;
	}

	// --------------------------------------------------------------------
>>>>>>> Kmom03 - Create a codeigniter guestbook

	/**
	 * CREATE TABLE IF statement
	 *
<<<<<<< HEAD
	 * @var	string
	 */
	protected $_create_table_if	= FALSE;

	/**
	 * UNSIGNED support
	 *
	 * @var	array
	 */
	protected $_unsigned		= array(
		'SHORT'		=> 'INTEGER',
		'SMALLINT'	=> 'INTEGER',
		'INT'		=> 'BIGINT',
		'INTEGER'	=> 'BIGINT',
		'BIGINT'	=> 'NUMERIC',
		'FLOAT'		=> 'DOUBLE',
		'REAL'		=> 'DOUBLE'
	);

	// --------------------------------------------------------------------

	/**
	 * ALTER TABLE
	 *
	 * @param	string	$alter_type	ALTER type
	 * @param	string	$table		Table name
	 * @param	mixed	$field		Column definition
	 * @return	string|string[]
	 */
	protected function _alter_table($alter_type, $table, $field)
=======
	 * @access	private
	 * @param	mixed	the fields
	 * @return	string
	 */
	function _process_fields($fields)
>>>>>>> Kmom03 - Create a codeigniter guestbook
	{
		if (in_array($alter_type, array('DROP', 'ADD'), TRUE))
		{
			return parent::_alter_table($alter_type, $table, $field);
		}

<<<<<<< HEAD
		$sql = 'ALTER TABLE '.$this->db->escape_identifiers($table);
		$sqls = array();
		for ($i = 0, $c = count($field); $i < $c; $i++)
=======
		foreach ($fields as $field=>$attributes)
>>>>>>> Kmom03 - Create a codeigniter guestbook
		{
			if ($field[$i]['_literal'] !== FALSE)
			{
<<<<<<< HEAD
				$sqls[] = $sql.' CHANGE '.$field[$i]['_literal'];
			}
			else
			{
				$sqls[] = $sql.' CHANGE '.$this->_process_column($field[$i]);
				if ( ! empty($field[$i]['new_name']))
=======
				$sql .= "\n\t$attributes";
			}
			else
			{
				$attributes = array_change_key_case($attributes, CASE_UPPER);

				$sql .= "\n\t\"" . $this->db->_protect_identifiers($field) . "\"";

				if (array_key_exists('NAME', $attributes))
				{
					$sql .= ' '.$this->db->_protect_identifiers($attributes['NAME']).' ';
				}

				if (array_key_exists('TYPE', $attributes))
				{
					$sql .= ' '.$attributes['TYPE'];

					if (array_key_exists('CONSTRAINT', $attributes))
					{
						switch ($attributes['TYPE'])
						{
							case 'decimal':
							case 'float':
							case 'numeric':
								$sql .= '('.implode(',', $attributes['CONSTRAINT']).')';
								break;
							case 'enum': 	// As of version 8.4.0 CUBRID does not support
											// enum data type.
											break;
							case 'set':
								$sql .= '("'.implode('","', $attributes['CONSTRAINT']).'")';
								break;
							default:
								$sql .= '('.$attributes['CONSTRAINT'].')';
						}
					}
				}

				if (array_key_exists('UNSIGNED', $attributes) && $attributes['UNSIGNED'] === TRUE)
				{
					//$sql .= ' UNSIGNED';
					// As of version 8.4.0 CUBRID does not support UNSIGNED INTEGER data type.
					// Will be supported in the next release as a part of MySQL Compatibility.
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
>>>>>>> Kmom03 - Create a codeigniter guestbook
				{
					$sqls[] = $sql.' RENAME COLUMN '.$this->db->escape_identifiers($field[$i]['name'])
						.' AS '.$this->db->escape_identifiers($field[$i]['name']);
				}
<<<<<<< HEAD
=======

				if (array_key_exists('UNIQUE', $attributes) && $attributes['UNIQUE'] === TRUE)
				{
					$sql .= ' UNIQUE';
				}
			}

			// don't add a comma on the end of the last field
			if (++$current_field_count < count($fields))
			{
				$sql .= ',';
>>>>>>> Kmom03 - Create a codeigniter guestbook
			}
		}

		return $sqls;
	}

	// --------------------------------------------------------------------

	/**
	 * Process column
	 *
<<<<<<< HEAD
	 * @param	array	$field
	 * @return	string
	 */
	protected function _process_column($field)
=======
	 * @access	private
	 * @param	string	the table name
	 * @param	mixed	the fields
	 * @param	mixed	primary key(s)
	 * @param	mixed	key(s)
	 * @param	boolean	should 'IF NOT EXISTS' be added to the SQL
	 * @return	bool
	 */
	function _create_table($table, $fields, $primary_keys, $keys, $if_not_exists)
>>>>>>> Kmom03 - Create a codeigniter guestbook
	{
		$extra_clause = isset($field['after'])
			? ' AFTER '.$this->db->escape_identifiers($field['after']) : '';

<<<<<<< HEAD
		if (empty($extra_clause) && isset($field['first']) && $field['first'] === TRUE)
		{
			$extra_clause = ' FIRST';
		}

		return $this->db->escape_identifiers($field['name'])
			.(empty($field['new_name']) ? '' : $this->db->escape_identifiers($field['new_name']))
			.' '.$field['type'].$field['length']
			.$field['unsigned']
			.$field['null']
			.$field['default']
			.$field['auto_increment']
			.$field['unique']
			.$extra_clause;
	}

	// --------------------------------------------------------------------
=======
		if ($if_not_exists === TRUE)
		{
			//$sql .= 'IF NOT EXISTS ';
			// As of version 8.4.0 CUBRID does not support this SQL syntax.
		}

		$sql .= $this->db->_escape_identifiers($table)." (";

		$sql .= $this->_process_fields($fields);

		// If there is a PK defined
		if (count($primary_keys) > 0)
		{
			$key_name = "pk_" . $table . "_" .
				$this->db->_protect_identifiers(implode('_', $primary_keys));
			
			$primary_keys = $this->db->_protect_identifiers($primary_keys);
			$sql .= ",\n\tCONSTRAINT " . $key_name . " PRIMARY KEY(" . implode(', ', $primary_keys) . ")";
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
			case 'TINYINT':
				$attributes['TYPE'] = 'SMALLINT';
				$attributes['UNSIGNED'] = FALSE;
				return;
			case 'MEDIUMINT':
				$attributes['TYPE'] = 'INTEGER';
				$attributes['UNSIGNED'] = FALSE;
				return;
			default: return;
		}
=======
			foreach ($keys as $key)
			{
				if (is_array($key))
				{
					$key_name = $this->db->_protect_identifiers(implode('_', $key));
					$key = $this->db->_protect_identifiers($key);
				}
				else
				{
					$key_name = $this->db->_protect_identifiers($key);
					$key = array($key_name);
				}
				
				$sql .= ",\n\tKEY \"{$key_name}\" (" . implode(', ', $key) . ")";
			}
		}

		$sql .= "\n);";

		return $sql;
	}

	// --------------------------------------------------------------------

	/**
	 * Drop Table
	 *
	 * @access	private
	 * @return	string
	 */
	function _drop_table($table)
	{
		return "DROP TABLE IF EXISTS ".$this->db->_escape_identifiers($table);
>>>>>>> Kmom03 - Create a codeigniter guestbook
	}

	// --------------------------------------------------------------------

	/**
	 * Process indexes
	 *
<<<<<<< HEAD
	 * @param	string	$table	(ignored)
	 * @return	string
	 */
	protected function _process_indexes($table = NULL)
	{
		$sql = '';

		for ($i = 0, $c = count($this->keys); $i < $c; $i++)
		{
			if ( ! isset($this->fields[$this->keys[$i]]))
			{
				unset($this->keys[$i]);
				continue;
			}

			is_array($this->keys[$i]) OR $this->keys[$i] = array($this->keys[$i]);

			$sql .= ",\n\tKEY ".$this->db->escape_identifiers(implode('_', $this->keys[$i]))
				.' ('.implode(', ', $this->db->escape_identifiers($this->keys[$i])).')';
		}

		$this->keys = array();

=======
	 * @access	private
	 * @param	string	the ALTER type (ADD, DROP, CHANGE)
	 * @param	string	the column name
	 * @param	array	fields
	 * @param	string	the field after which we should add the new field
	 * @return	object
	 */
	function _alter_table($alter_type, $table, $fields, $after_field = '')
	{
		$sql = 'ALTER TABLE '.$this->db->_protect_identifiers($table)." $alter_type ";

		// DROP has everything it needs now.
		if ($alter_type == 'DROP')
		{
			return $sql.$this->db->_protect_identifiers($fields);
		}

		$sql .= $this->_process_fields($fields);

		if ($after_field != '')
		{
			$sql .= ' AFTER ' . $this->db->_protect_identifiers($after_field);
		}

		return $sql;
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
		$sql = 'RENAME TABLE '.$this->db->_protect_identifiers($table_name)." AS ".$this->db->_protect_identifiers($new_table_name);
>>>>>>> Kmom03 - Create a codeigniter guestbook
		return $sql;
	}

}

/* End of file cubrid_forge.php */
/* Location: ./system/database/drivers/cubrid/cubrid_forge.php */