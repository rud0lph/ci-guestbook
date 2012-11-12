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
 * Postgre Utility Class
 *
 * @category	Database
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_postgre_utility extends CI_DB_utility {

	/**
<<<<<<< HEAD
	 * List databases statement
	 *
	 * @var	string
	 */
	protected $_list_databases	= 'SELECT datname FROM pg_database';

	/**
	 * OPTIMIZE TABLE statement
	 *
	 * @var	string
	 */
	protected $_optimize_table	= 'REINDEX TABLE %s';
=======
	 * List databases
	 *
	 * @access	private
	 * @return	bool
	 */
	function _list_databases()
	{
		return "SELECT datname FROM pg_database";
	}

	// --------------------------------------------------------------------

	/**
	 * Optimize table query
	 *
	 * Is table optimization supported in Postgre?
	 *
	 * @access	private
	 * @param	string	the table name
	 * @return	object
	 */
	function _optimize_table($table)
	{
		return FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Repair table query
	 *
	 * Are table repairs supported in Postgre?
	 *
	 * @access	private
	 * @param	string	the table name
	 * @return	object
	 */
	function _repair_table($table)
	{
		return FALSE;
	}

	// --------------------------------------------------------------------
>>>>>>> Kmom03 - Create a codeigniter guestbook

	// --------------------------------------------------------------------

	/**
	 * Export
	 *
<<<<<<< HEAD
	 * @param	array	$params	Preferences
=======
	 * @access	private
	 * @param	array	Preferences
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	mixed
	 */
	function _backup($params = array())
	{
		// Currently unsupported
		return $this->db->display_error('db_unsupported_feature');
	}
}


/* End of file postgre_utility.php */
/* Location: ./system/database/drivers/postgre/postgre_utility.php */