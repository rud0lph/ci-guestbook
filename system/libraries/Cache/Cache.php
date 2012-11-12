<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
<<<<<<< HEAD
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2012, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
=======
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2006 - 2012 EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
>>>>>>> Kmom03 - Create a codeigniter guestbook
 * @link		http://codeigniter.com
 * @since		Version 2.0
 * @filesource	
 */
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * CodeIgniter Caching Class 
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Core
 * @author		ExpressionEngine Dev Team
 * @link		
 */
class CI_Cache extends CI_Driver_Library {
<<<<<<< HEAD

	/**
	 * Valid cache drivers
	 *
	 * @var array
	 */
	protected $valid_drivers = array(
		'cache_apc',
		'cache_dummy',
		'cache_file',
		'cache_memcached',
		'cache_redis',
		'cache_wincache'
	);

	/**
	 * Path of cache files (if file-based cache)
	 *
	 * @var string
	 */
	protected $_cache_path = NULL;

	/**
	 * Reference to the driver
	 *
	 * @var mixed
	 */
	protected $_adapter = 'dummy';

	/**
	 * Fallback driver
	 *
	 * @var string
	 */
	protected $_backup_driver = 'dummy';
=======
	
	protected $valid_drivers 	= array(
		'cache_apc', 'cache_file', 'cache_memcached', 'cache_dummy'
	);

	protected $_cache_path		= NULL;		// Path of cache files (if file-based cache)
	protected $_adapter			= 'dummy';
	protected $_backup_driver;
	
	// ------------------------------------------------------------------------
>>>>>>> Kmom03 - Create a codeigniter guestbook

	/**
	 * Cache key prefix
	 *
	 * @var	string
	 */
	public $key_prefix = '';

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * Initialize class properties based on the configuration array.
	 *
	 * @param	array	$config = array()
	 * @return	void
	 */
	public function __construct($config = array())
	{
		$default_config = array(
			'adapter',
			'memcached'
		);

		foreach ($default_config as $key)
		{
			if (isset($config[$key]))
			{
				$param = '_'.$key;

				$this->{$param} = $config[$key];
			}
		}

		isset($config['key_prefix']) && $this->key_prefix = $config['key_prefix'];

		if (isset($config['backup']) && in_array('cache_'.$config['backup'], $this->valid_drivers))
		{
			$this->_backup_driver = $config['backup'];
		}

		// If the specified adapter isn't available, check the backup.
		if ( ! $this->is_supported($this->_adapter))
		{
			if ( ! $this->is_supported($this->_backup_driver))
			{
				// Backup isn't supported either. Default to 'Dummy' driver.
				log_message('error', 'Cache adapter "'.$this->_adapter.'" and backup "'.$this->_backup_driver.'" are both unavailable. Cache is now using "Dummy" adapter.');
				$this->_adapter = 'dummy';
			}
			else
			{
				// Backup is supported. Set it to primary.
				$this->_adapter = $this->_backup_driver;
			}
=======
	 * @param array
	 */
	public function __construct($config = array())
	{
		if ( ! empty($config))
		{
			$this->_initialize($config);
>>>>>>> Kmom03 - Create a codeigniter guestbook
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Get 
	 *
	 * Look for a value in the cache.  If it exists, return the data 
	 * if not, return FALSE
	 *
<<<<<<< HEAD
	 * @param	string	$id
	 * @return	mixed	value matching $id or FALSE on failure
	 */
	public function get($id)
	{
		return $this->{$this->_adapter}->get($this->key_prefix.$id);
=======
	 * @param 	string	
	 * @return 	mixed		value that is stored/FALSE on failure
	 */
	public function get($id)
	{	
		return $this->{$this->_adapter}->get($id);
>>>>>>> Kmom03 - Create a codeigniter guestbook
	}

	// ------------------------------------------------------------------------

	/**
	 * Cache Save
	 *
<<<<<<< HEAD
	 * @param	string	$id		Cache ID
	 * @param	mixed	$data		Data to store
	 * @param	int	$ttl = 60	Cache TTL (in seconds)
	 * @return	bool	TRUE on success, FALSE on failure
=======
	 * @param 	string		Unique Key
	 * @param 	mixed		Data to store
	 * @param 	int			Length of time (in seconds) to cache the data
	 *
	 * @return 	boolean		true on success/false on failure
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function save($id, $data, $ttl = 60)
	{
		return $this->{$this->_adapter}->save($this->key_prefix.$id, $data, $ttl);
	}

	// ------------------------------------------------------------------------

	/**
	 * Delete from Cache
	 *
<<<<<<< HEAD
	 * @param	string	$id	Cache ID
	 * @return	bool	TRUE on success, FALSE on failure
=======
	 * @param 	mixed		unique identifier of the item in the cache
	 * @return 	boolean		true on success/false on failure
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function delete($id)
	{
		return $this->{$this->_adapter}->delete($this->key_prefix.$id);
	}

	// ------------------------------------------------------------------------

	/**
	 * Clean the cache
	 *
<<<<<<< HEAD
	 * @return	bool	TRUE on success, FALSE on failure
=======
	 * @return 	boolean		false on failure/true on success
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function clean()
	{
		return $this->{$this->_adapter}->clean();
	}

	// ------------------------------------------------------------------------

	/**
	 * Cache Info
	 *
<<<<<<< HEAD
	 * @param	string	$type = 'user'	user/filehits
	 * @return	mixed	array containing cache info on success OR FALSE on failure
=======
	 * @param 	string		user/filehits
	 * @return 	mixed		array on success, false on failure	
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function cache_info($type = 'user')
	{
		return $this->{$this->_adapter}->cache_info($type);
	}

	// ------------------------------------------------------------------------
	
	/**
	 * Get Cache Metadata
	 *
<<<<<<< HEAD
	 * @param	string	$id	key to get cache metadata on
	 * @return	mixed	cache item metadata
=======
	 * @param 	mixed		key to get cache metadata on
	 * @return 	mixed		return value from child method
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function get_metadata($id)
	{
		return $this->{$this->_adapter}->get_metadata($this->key_prefix.$id);
	}
	
	// ------------------------------------------------------------------------

	/**
	 * Initialize
	 *
	 * Initialize class properties based on the configuration array.
	 *
	 * @param	array 	
	 * @return 	void
	 */
	private function _initialize($config)
	{        
		$default_config = array(
				'adapter',
				'memcached'
			);

		foreach ($default_config as $key)
		{
			if (isset($config[$key]))
			{
				$param = '_'.$key;

				$this->{$param} = $config[$key];
			}
		}

		if (isset($config['backup']))
		{
			if (in_array('cache_'.$config['backup'], $this->valid_drivers))
			{
				$this->_backup_driver = $config['backup'];
			}
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Is the requested driver supported in this environment?
	 *
<<<<<<< HEAD
	 * @param	string	$driver	The driver to test
	 * @return	array
=======
	 * @param 	string	The driver to test.
	 * @return 	array
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function is_supported($driver)
	{
		static $support = array();

		if ( ! isset($support[$driver]))
		{
			$support[$driver] = $this->{$driver}->is_supported();
		}

		return $support[$driver];
	}

	// ------------------------------------------------------------------------

	/**
	 * __get()
	 *
	 * @param 	child
	 * @return 	object
	 */
	public function __get($child)
	{
		$obj = parent::__get($child);

		if ( ! $this->is_supported($child))
		{
			$this->_adapter = $this->_backup_driver;
		}

		return $obj;
	}
	
	// ------------------------------------------------------------------------
}
// End Class

/* End of file Cache.php */
/* Location: ./system/libraries/Cache/Cache.php */