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
 * CodeIgniter Security Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/security_helper.html
 */

// ------------------------------------------------------------------------

/**
 * XSS Filtering
 *
 * @access	public
 * @param	string
 * @param	bool	whether or not the content is an image file
 * @return	string
 */
if ( ! function_exists('xss_clean'))
{
	function xss_clean($str, $is_image = FALSE)
	{
		$CI =& get_instance();
		return $CI->security->xss_clean($str, $is_image);
	}
}

// ------------------------------------------------------------------------

/**
 * Sanitize Filename
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('sanitize_filename'))
{
	function sanitize_filename($filename)
	{
		$CI =& get_instance();
		return $CI->security->sanitize_filename($filename);
	}
}

// --------------------------------------------------------------------

/**
 * Hash encode a string
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('do_hash'))
{
<<<<<<< HEAD
	/**
	 * Hash encode a string
	 *
	 * @todo	Remove in version 3.1+.
	 * @deprecated	3.0.0	Use PHP's native hash() instead.
	 * @param	string	$str
	 * @param	string	$type = 'sha1'
	 * @return	string
	 */
=======
>>>>>>> Kmom03 - Create a codeigniter guestbook
	function do_hash($str, $type = 'sha1')
	{
		if ($type == 'sha1')
		{
			return sha1($str);
		}
		else
		{
			return md5($str);
		}
	}
}

// ------------------------------------------------------------------------

/**
 * Strip Image Tags
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('strip_image_tags'))
{
	function strip_image_tags($str)
	{
		$str = preg_replace("#<img\s+.*?src\s*=\s*[\"'](.+?)[\"'].*?\>#", "\\1", $str);
		$str = preg_replace("#<img\s+.*?src\s*=\s*(.+?).*?\>#", "\\1", $str);

		return $str;
	}
}

// ------------------------------------------------------------------------

/**
 * Convert PHP tags to entities
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('encode_php_tags'))
{
	function encode_php_tags($str)
	{
		return str_replace(array('<?php', '<?PHP', '<?', '?>'),  array('&lt;?php', '&lt;?PHP', '&lt;?', '?&gt;'), $str);
	}
}


/* End of file security_helper.php */
/* Location: ./system/helpers/security_helper.php */