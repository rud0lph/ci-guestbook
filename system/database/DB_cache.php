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
 * Database Cache Class
 *
 * @category	Database
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_Cache {

<<<<<<< HEAD
	/**
	 * CI Singleton
	 *
	 * @var	object
	 */
	public $CI;

	/**
	 * Database object
	 *
	 * Allows passing of DB object so that multiple database connections
	 * and returned DB objects can be supported.
	 *
	 * @var	object
	 */
	public $db;

	// --------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @param	object	&$db
	 * @return	void
	 */
	public function __construct(&$db)
=======
	var $CI;
	var $db;	// allows passing of db object so that multiple database connections and returned db objects can be supported

	/**
	 * Constructor
	 *
	 * Grabs the CI super object instance so we can access it.
	 *
	 */
	function __construct(&$db)
>>>>>>> Kmom03 - Create a codeigniter guestbook
	{
		// Assign the main CI object to $this->CI
		// and load the file helper since we use it a lot
		$this->CI =& get_instance();
		$this->db =& $db;
		$this->CI->load->helper('file');

		$this->check_path();
	}

	// --------------------------------------------------------------------

	/**
	 * Set Cache Directory Path
	 *
<<<<<<< HEAD
	 * @param	string	$path	Path to the cache directory
=======
	 * @access	public
	 * @param	string	the path to the cache directory
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	bool
	 */
	function check_path($path = '')
	{
		if ($path == '')
		{
			if ($this->db->cachedir == '')
			{
				return $this->db->cache_off();
			}

			$path = $this->db->cachedir;
		}

		// Add a trailing slash to the path if needed
<<<<<<< HEAD
		$path = realpath($path)
			? rtrim(realpath($path), DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR
			: rtrim($path, '/').'/';
=======
		$path = preg_replace("/(.+?)\/*$/", "\\1/",  $path);
>>>>>>> Kmom03 - Create a codeigniter guestbook

		if ( ! is_dir($path) OR ! is_really_writable($path))
		{
			// If the path is wrong we'll turn off caching
			return $this->db->cache_off();
		}

		$this->db->cachedir = $path;
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Retrieve a cached query
	 *
	 * The URI being requested will become the name of the cache sub-folder.
	 * An MD5 hash of the SQL statement will become the cache file name.
	 *
<<<<<<< HEAD
	 * @param	string	$sql
=======
	 * @access	public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	string
	 */
	function read($sql)
	{
		$segment_one = ($this->CI->uri->segment(1) == FALSE) ? 'default' : $this->CI->uri->segment(1);

		$segment_two = ($this->CI->uri->segment(2) == FALSE) ? 'index' : $this->CI->uri->segment(2);

		$filepath = $this->db->cachedir.$segment_one.'+'.$segment_two.'/'.md5($sql);

		if (FALSE === ($cachedata = read_file($filepath)))
		{
			return FALSE;
		}

		return unserialize($cachedata);
	}

	// --------------------------------------------------------------------

	/**
	 * Write a query to a cache file
	 *
<<<<<<< HEAD
	 * @param	string	$sql
	 * @param	object	$object
=======
	 * @access	public
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	bool
	 */
	function write($sql, $object)
	{
		$segment_one = ($this->CI->uri->segment(1) == FALSE) ? 'default' : $this->CI->uri->segment(1);

		$segment_two = ($this->CI->uri->segment(2) == FALSE) ? 'index' : $this->CI->uri->segment(2);

		$dir_path = $this->db->cachedir.$segment_one.'+'.$segment_two.'/';

		$filename = md5($sql);

		if ( ! @is_dir($dir_path))
		{
			if ( ! @mkdir($dir_path, DIR_WRITE_MODE))
			{
				return FALSE;
			}

			@chmod($dir_path, DIR_WRITE_MODE);
		}

		if (write_file($dir_path.$filename, serialize($object)) === FALSE)
		{
			return FALSE;
		}

		@chmod($dir_path.$filename, FILE_WRITE_MODE);
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Delete cache files within a particular directory
	 *
<<<<<<< HEAD
	 * @param	string	$segment_one
	 * @param	string	$segment_two
	 * @return	void
=======
	 * @access	public
	 * @return	bool
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function delete($segment_one = '', $segment_two = '')
	{
		if ($segment_one == '')
		{
			$segment_one  = ($this->CI->uri->segment(1) == FALSE) ? 'default' : $this->CI->uri->segment(1);
		}

		if ($segment_two == '')
		{
			$segment_two = ($this->CI->uri->segment(2) == FALSE) ? 'index' : $this->CI->uri->segment(2);
		}

		$dir_path = $this->db->cachedir.$segment_one.'+'.$segment_two.'/';

		delete_files($dir_path, TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * Delete all existing cache files
	 *
<<<<<<< HEAD
	 * @return	void
=======
	 * @access	public
	 * @return	bool
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function delete_all()
	{
<<<<<<< HEAD
		delete_files($this->db->cachedir, TRUE, TRUE);
=======
		delete_files($this->db->cachedir, TRUE);
>>>>>>> Kmom03 - Create a codeigniter guestbook
	}

}


/* End of file DB_cache.php */
/* Location: ./system/database/DB_cache.php */