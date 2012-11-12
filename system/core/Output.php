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
 * Output Class
 *
 * Responsible for sending final output to the browser.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Output
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/output.html
 */
class CI_Output {

	/**
	 * Final output string
	 *
<<<<<<< HEAD
	 * @var	string
=======
	 * @var string
	 * @access 	protected
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	protected $final_output;
	/**
	 * Cache expiration time
	 *
<<<<<<< HEAD
	 * @var	int
	 */
	public $cache_expiration = 0;

	/**
	 * List of server headers
	 *
	 * @var	array
=======
	 * @var int
	 * @access 	protected
	 */
	protected $cache_expiration	= 0;
	/**
	 * List of server headers
	 *
	 * @var array
	 * @access 	protected
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	protected $headers			= array();
	/**
	 * List of mime types
	 *
<<<<<<< HEAD
	 * @var	array
=======
	 * @var array
	 * @access 	protected
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	protected $mime_types		= array();
	/**
<<<<<<< HEAD
	 * Mime-type for the current page
	 *
	 * @var	string
	 */
	protected $mime_type	= 'text/html';

	/**
	 * Enable Profiler flag
	 *
	 * @var	bool
	 */
	public $enable_profiler = FALSE;

=======
	 * Determines wether profiler is enabled
	 *
	 * @var book
	 * @access 	protected
	 */
	protected $enable_profiler	= FALSE;
>>>>>>> Kmom03 - Create a codeigniter guestbook
	/**
	 * zLib output compression flag
	 *
<<<<<<< HEAD
	 * @var	bool
=======
	 * @var bool
	 * @access 	protected
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	protected $_zlib_oc			= FALSE;
	/**
	 * List of profiler sections
	 *
<<<<<<< HEAD
	 * @var	array
=======
	 * @var array
	 * @access 	protected
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	protected $_profiler_sections = array();
	/**
	 * Parse markers flag
	 *
<<<<<<< HEAD
	 * Whether or not to parse variables like {elapsed_time} and {memory_usage}.
	 *
	 * @var	bool
=======
	 * @var bool
	 * @access 	protected
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	protected $parse_exec_vars	= TRUE;

	/**
<<<<<<< HEAD
	 * Class constructor
	 *
	 * Determines whether zLib output compression will be used.
=======
	 * Constructor
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 *
	 */
	function __construct()
	{
		$this->_zlib_oc = @ini_get('zlib.output_compression');

		// Get mime types for later
		if (defined('ENVIRONMENT') AND file_exists(APPPATH.'config/'.ENVIRONMENT.'/mimes.php'))
		{
		    include APPPATH.'config/'.ENVIRONMENT.'/mimes.php';
		}
		else
		{
			include APPPATH.'config/mimes.php';
		}


		$this->mime_types = $mimes;

		log_message('debug', "Output Class Initialized");
	}

	// --------------------------------------------------------------------

	/**
	 * Get Output
	 *
	 * Returns the current output string.
	 *
	 * @access	public
	 * @return	string
	 */
	function get_output()
	{
		return $this->final_output;
	}

	// --------------------------------------------------------------------

	/**
	 * Set Output
	 *
	 * Sets the output string.
	 *
<<<<<<< HEAD
	 * @param	string	$output	Output data
	 * @return	object	$this
=======
	 * @access	public
	 * @param	string
	 * @return	void
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function set_output($output)
	{
		$this->final_output = $output;

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Append Output
	 *
	 * Appends data onto the output string.
	 *
<<<<<<< HEAD
	 * @param	string	$output	Data to append
	 * @return	object	$this
=======
	 * @access	public
	 * @param	string
	 * @return	void
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function append_output($output)
	{
		if (empty($this->final_output))
		{
			$this->final_output = $output;
		}
		else
		{
			$this->final_output .= $output;
		}

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Set Header
	 *
	 * Lets you set a server header which will be sent with the final output.
	 *
<<<<<<< HEAD
	 * Note: If a file is cached, headers will not be sent.
	 * @todo	We need to figure out how to permit headers to be cached.
	 *
	 * @param	string	$header		Header
	 * @param	bool	$replace	Whether to replace the old header value, if already set
	 * @return	object	$this
=======
	 * Note:  If a file is cached, headers will not be sent.  We need to figure out
	 * how to permit header data to be saved with the cache data...
	 *
	 * @access	public
	 * @param	string
	 * @param 	bool
	 * @return	void
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function set_header($header, $replace = TRUE)
	{
		// If zlib.output_compression is enabled it will compress the output,
		// but it will not modify the content-length header to compensate for
		// the reduction, causing the browser to hang waiting for more data.
		// We'll just skip content-length in those cases.

		if ($this->_zlib_oc && strncasecmp($header, 'content-length', 14) == 0)
		{
			return $this;
		}

		$this->headers[] = array($header, $replace);

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Set Content-Type Header
	 *
<<<<<<< HEAD
	 * @param	string	$mime_type	Extension of the file we're outputting
	 * @param	string	$charset	Character set (default: NULL)
	 * @return	object	$this
=======
	 * @access	public
	 * @param	string	extension of the file we're outputting
	 * @return	void
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function set_content_type($mime_type)
	{
		if (strpos($mime_type, '/') === FALSE)
		{
			$extension = ltrim($mime_type, '.');

			// Is this extension supported?
			if (isset($this->mime_types[$extension]))
			{
				$mime_type =& $this->mime_types[$extension];

				if (is_array($mime_type))
				{
					$mime_type = current($mime_type);
				}
			}
		}

		$header = 'Content-Type: '.$mime_type;

		$this->headers[] = array($header, TRUE);
<<<<<<< HEAD
		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Get Current Content-Type Header
	 *
	 * @return	string	'text/html', if not already set
	 */
	public function get_content_type()
	{
		for ($i = 0, $c = count($this->headers); $i < $c; $i++)
		{
			if (preg_match('/^Content-Type:\s(.+)$/', $this->headers[$i][0], $matches))
			{
				return $matches[1];
			}
		}
=======
>>>>>>> Kmom03 - Create a codeigniter guestbook

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Set HTTP Status Header
	 *
<<<<<<< HEAD
	 * As of version 1.7.2, this is an alias for common function
	 * set_status_header().
	 *
	 * @param	int	$code	Status code (default: 200)
	 * @param	string	$text	Optional message
	 * @return	object	$this
=======
	 * @access	public
	 * @param	int		the status code
	 * @param	string
	 * @return	void
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function set_status_header($code = 200, $text = '')
	{
		set_status_header($code, $text);

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Enable/disable Profiler
	 *
<<<<<<< HEAD
	 * @param	bool	$val	TRUE to enable or FALSE to disable
	 * @return	object	$this
=======
	 * @access	public
	 * @param	bool
	 * @return	void
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function enable_profiler($val = TRUE)
	{
		$this->enable_profiler = (is_bool($val)) ? $val : TRUE;

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Set Profiler Sections
	 *
	 * Allows override of default/config settings for
	 * Profiler section display.
	 *
<<<<<<< HEAD
	 * @param	array	$sections	Profiler sections
	 * @return	object	$this
=======
	 * @access	public
	 * @param	array
	 * @return	void
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function set_profiler_sections($sections)
	{
		foreach ($sections as $section => $enable)
		{
			$this->_profiler_sections[$section] = ($enable !== FALSE) ? TRUE : FALSE;
		}

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Set Cache
	 *
<<<<<<< HEAD
	 * @param	int	$time	Cache expiration time in seconds
	 * @return	object	$this
=======
	 * @access	public
	 * @param	integer
	 * @return	void
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function cache($time)
	{
		$this->cache_expiration = ( ! is_numeric($time)) ? 0 : $time;

		return $this;
	}

	// --------------------------------------------------------------------

	/**
	 * Display Output
	 *
	 * Processes sends the sends finalized output data to the browser along
	 * with any server headers and profile data. It also stops benchmark
	 * timers so the page rendering speed and memory usage can be shown.
	 *
<<<<<<< HEAD
	 * Note: All "view" data is automatically put into $this->final_output
	 *	 by controller class.
	 *
	 * @uses	CI_Output::$final_output
	 * @param	string	$output	Output data override
	 * @return	void
=======
	 * This function sends the finalized output data to the browser along
	 * with any server headers and profile data.  It also stops the
	 * benchmark timer so the page rendering speed and memory usage can be shown.
	 *
	 * @access	public
	 * @param 	string
	 * @return	mixed
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function _display($output = '')
	{
		// Note:  We use globals because we can't use $CI =& get_instance()
		// since this function is sometimes called by the caching mechanism,
		// which happens before the CI super object is available.
		global $BM, $CFG;

		// Grab the super object if we can.
		if (class_exists('CI_Controller'))
		{
			$CI =& get_instance();
		}

		// --------------------------------------------------------------------

		// Set the output data
		if ($output == '')
		{
			$output =& $this->final_output;
		}

		// --------------------------------------------------------------------

<<<<<<< HEAD
		// Is minify requested?
		if ($CFG->item('minify_output') === TRUE)
		{
			$output = $this->minify($output, $this->mime_type);
		}

		// --------------------------------------------------------------------

		// Do we need to write a cache file? Only if the controller does not have its
=======
		// Do we need to write a cache file?  Only if the controller does not have its
>>>>>>> Kmom03 - Create a codeigniter guestbook
		// own _output() method and we are not dealing with a cache file, which we
		// can determine by the existence of the $CI object above
		if ($this->cache_expiration > 0 && isset($CI) && ! method_exists($CI, '_output'))
		{
			$this->_write_cache($output);
		}

		// --------------------------------------------------------------------

		// Parse out the elapsed time and memory usage,
		// then swap the pseudo-variables with the data

		$elapsed = $BM->elapsed_time('total_execution_time_start', 'total_execution_time_end');

		if ($this->parse_exec_vars === TRUE)
		{
			$memory	 = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';

			$output = str_replace('{elapsed_time}', $elapsed, $output);
			$output = str_replace('{memory_usage}', $memory, $output);
		}

		// --------------------------------------------------------------------

		// Is compression requested?
		if ($CFG->item('compress_output') === TRUE && $this->_zlib_oc == FALSE)
		{
			if (extension_loaded('zlib'))
			{
				if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) AND strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE)
				{
					ob_start('ob_gzhandler');
				}
			}
		}

		// --------------------------------------------------------------------

		// Are there any server headers to send?
		if (count($this->headers) > 0)
		{
			foreach ($this->headers as $header)
			{
				@header($header[0], $header[1]);
			}
		}

		// --------------------------------------------------------------------

		// Does the $CI object exist?
		// If not we know we are dealing with a cache file so we'll
		// simply echo out the data and exit.
		if ( ! isset($CI))
		{
			echo $output;
<<<<<<< HEAD
			log_message('debug', 'Final output sent to browser');
			log_message('debug', 'Total execution time: '.$elapsed);
			return;
=======
			log_message('debug', "Final output sent to browser");
			log_message('debug', "Total execution time: ".$elapsed);
			return TRUE;
>>>>>>> Kmom03 - Create a codeigniter guestbook
		}

		// --------------------------------------------------------------------

		// Do we need to generate profile data?
		// If so, load the Profile class and run it.
		if ($this->enable_profiler == TRUE)
		{
			$CI->load->library('profiler');

			if ( ! empty($this->_profiler_sections))
			{
				$CI->profiler->set_sections($this->_profiler_sections);
			}

			// If the output data contains closing </body> and </html> tags
			// we will remove them and add them back after we insert the profile data
			if (preg_match("|</body>.*?</html>|is", $output))
			{
				$output  = preg_replace("|</body>.*?</html>|is", '', $output);
				$output .= $CI->profiler->run();
				$output .= '</body></html>';
			}
			else
			{
				$output .= $CI->profiler->run();
			}
		}

		// --------------------------------------------------------------------

		// Does the controller contain a function named _output()?
		// If so send the output there.  Otherwise, echo it.
		if (method_exists($CI, '_output'))
		{
			$CI->_output($output);
		}
		else
		{
			echo $output;  // Send it to the browser!
		}

		log_message('debug', "Final output sent to browser");
		log_message('debug', "Total execution time: ".$elapsed);
	}

	// --------------------------------------------------------------------

	/**
	 * Write Cache
	 *
<<<<<<< HEAD
	 * @param	string	$output	Output data to cache
=======
	 * @access	public
	 * @param 	string
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	void
	 */
	function _write_cache($output)
	{
		$CI =& get_instance();
		$path = $CI->config->item('cache_path');

		$cache_path = ($path == '') ? APPPATH.'cache/' : $path;

		if ( ! is_dir($cache_path) OR ! is_really_writable($cache_path))
		{
			log_message('error', "Unable to write cache file: ".$cache_path);
			return;
		}

		$uri =	$CI->config->item('base_url').
				$CI->config->item('index_page').
				$CI->uri->uri_string();

		$cache_path .= md5($uri);

		if ( ! $fp = @fopen($cache_path, FOPEN_WRITE_CREATE_DESTRUCTIVE))
		{
			log_message('error', "Unable to write cache file: ".$cache_path);
			return;
		}

		$expire = time() + ($this->cache_expiration * 60);

		if (flock($fp, LOCK_EX))
		{
			fwrite($fp, $expire.'TS--->'.$output);
			flock($fp, LOCK_UN);
		}
		else
		{
			log_message('error', "Unable to secure a file lock for file at: ".$cache_path);
			return;
		}
		fclose($fp);
		@chmod($cache_path, FILE_WRITE_MODE);

		log_message('debug', "Cache file written: ".$cache_path);
	}

	// --------------------------------------------------------------------

	/**
	 * Update/serve cached output
	 *
	 * @uses	CI_Config
	 * @uses	CI_URI
	 *
<<<<<<< HEAD
	 * @param	object	&$CFG	CI_Config class instance
	 * @param	object	&$URI	CI_URI class instance
	 * @return	bool	TRUE on success or FALSE on failure
=======
	 * @access	public
	 * @param 	object	config class
	 * @param 	object	uri class
	 * @return	void
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	function _display_cache(&$CFG, &$URI)
	{
		$cache_path = ($CFG->item('cache_path') == '') ? APPPATH.'cache/' : $CFG->item('cache_path');

		// Build the file path.  The file name is an MD5 hash of the full URI
		$uri =	$CFG->item('base_url').
				$CFG->item('index_page').
				$URI->uri_string;

		$filepath = $cache_path.md5($uri);

		if ( ! @file_exists($filepath))
		{
			return FALSE;
		}

		if ( ! $fp = @fopen($filepath, FOPEN_READ))
		{
			return FALSE;
		}

		flock($fp, LOCK_SH);

		$cache = '';
		if (filesize($filepath) > 0)
		{
			$cache = fread($fp, filesize($filepath));
		}

		flock($fp, LOCK_UN);
		fclose($fp);

		// Strip out the embedded timestamp
		if ( ! preg_match("/(\d+TS--->)/", $cache, $match))
		{
			return FALSE;
		}

		// Has the file expired? If so we'll delete it.
		if (time() >= trim(str_replace('TS--->', '', $match['1'])))
		{
			if (is_really_writable($cache_path))
			{
				@unlink($filepath);
				log_message('debug', "Cache file has expired. File deleted");
				return FALSE;
			}
		}

		// Display the cache
		$this->_display(str_replace($match['0'], '', $cache));
		log_message('debug', "Cache file is current. Sending it to browser.");
		return TRUE;
	}

<<<<<<< HEAD
	// --------------------------------------------------------------------

	/**
	 * Set Cache Header
	 *
	 * Set the HTTP headers to match the server-side file cache settings
	 * in order to reduce bandwidth.
	 *
	 * @param	int	$last_modified	Timestamp of when the page was last modified
	 * @param	int	$expiration	Timestamp of when should the requested page expire from cache
	 * @return	void
	 */
	public function set_cache_header($last_modified, $expiration)
	{
		$max_age = $expiration - $_SERVER['REQUEST_TIME'];

		if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $last_modified <= strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']))
		{
			$this->set_status_header(304);
			exit;
		}
		else
		{
			header('Pragma: public');
			header('Cache-Control: max-age=' . $max_age . ', public');
			header('Expires: '.gmdate('D, d M Y H:i:s', $expiration).' GMT');
			header('Last-modified: '.gmdate('D, d M Y H:i:s', $last_modified).' GMT');
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Minify
	 *
	 * Reduce excessive size of HTML/CSS/JavaScript content.
	 *
	 * @param	string	$output	Output to minify
	 * @param	string	$type	Output content MIME type
	 * @return	string	Minified output
	 */
	public function minify($output, $type = 'text/html')
	{
		switch ($type)
		{
			case 'text/html':

				$size_before = strlen($output);

				if ($size_before === 0)
				{
					return '';
				}

				// Find all the <pre>,<code>,<textarea>, and <javascript> tags
				// We'll want to return them to this unprocessed state later.
				preg_match_all('{<pre.+</pre>}msU', $output, $pres_clean);
				preg_match_all('{<code.+</code>}msU', $output, $codes_clean);
				preg_match_all('{<textarea.+</textarea>}msU', $output, $textareas_clean);
				preg_match_all('{<script.+</script>}msU', $output, $javascript_clean);

				// Minify the CSS in all the <style> tags.
				preg_match_all('{<style.+</style>}msU', $output, $style_clean);
				foreach ($style_clean[0] as $s)
				{
					$output = str_replace($s, $this->minify($s, 'text/css'), $output);
				}

				// Minify the javascript in <script> tags.
				foreach ($javascript_clean[0] as $s)
				{
					$javascript_mini[] = $this->minify($s, 'text/javascript');
				}

				// Replace multiple spaces with a single space.
				$output = preg_replace('!\s{2,}!', ' ', $output);

				// Remove comments (non-MSIE conditionals)
				$output = preg_replace('{\s*<!--[^\[].*-->\s*}msU', '', $output);

				// Remove spaces around block-level elements.
				$output = preg_replace('/\s*(<\/?(html|head|title|meta|script|link|style|body|h[1-6]|div|p|br)[^>]*>)\s*/is', '$1', $output);

				// Replace mangled <pre> etc. tags with unprocessed ones.

				if ( ! empty($pres_clean))
				{
					preg_match_all('{<pre.+</pre>}msU', $output, $pres_messed);
					$output = str_replace($pres_messed[0], $pres_clean[0], $output);
				}

				if ( ! empty($codes_clean))
				{
					preg_match_all('{<code.+</code>}msU', $output, $codes_messed);
					$output = str_replace($codes_messed[0], $codes_clean[0], $output);
				}

				if ( ! empty($codes_clean))
				{
					preg_match_all('{<textarea.+</textarea>}msU', $output, $textareas_messed);
					$output = str_replace($textareas_messed[0], $textareas_clean[0], $output);
				}

				if (isset($javascript_mini))
				{
					preg_match_all('{<script.+</script>}msU', $output, $javascript_messed);
					$output = str_replace($javascript_messed[0], $javascript_mini, $output);
				}

				$size_removed = $size_before - strlen($output);
				$savings_percent = round(($size_removed / $size_before * 100));

				log_message('debug', 'Minifier shaved '.($size_removed / 1000).'KB ('.$savings_percent.'%) off final HTML output.');

			break;

			case 'text/css':

				//Remove CSS comments
				$output = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $output);

				// Remove spaces around curly brackets, colons,
				// semi-colons, parenthesis, commas
				$output = preg_replace('!\s*(:|;|,|}|{|\(|\))\s*!', '$1', $output);

			break;

			case 'text/javascript':

				// Currently leaves JavaScript untouched.
			break;

			default: break;
		}

		return $output;
	}
=======
>>>>>>> Kmom03 - Create a codeigniter guestbook

}
// END Output Class

/* End of file Output.php */
/* Location: ./system/core/Output.php */