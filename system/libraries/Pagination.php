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
 * Pagination Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Pagination
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/pagination.html
 */
class CI_Pagination {

<<<<<<< HEAD
	/**
	 * Base URL
	 *
	 * The page that we're linking to
	 *
	 * @var	string
	 */
	protected $base_url		= '';

	/**
	 * Prefix
	 *
	 * @var	string
	 */
	protected $prefix		= '';

	/**
	 * Suffix
	 *
	 * @var	string
	 */
	protected $suffix		= '';

	/**
	 * Total number of items
	 *
	 * @var	int
	 */
	protected $total_rows		= 0;

	/**
	 * Items per page
	 *
	 * @var	int
	 */
	protected $per_page		= 10;

	/**
	 * Number of links to show
	 *
	 * Relates to "digit" type links shown before/after
	 * the currently viewed page.
	 *
	 * @var	int
	 */
	protected $num_links		= 2;

	/**
	 * Current page
	 *
	 * @var	int
	 */
	protected $cur_page		= 0;

	/**
	 * Use page numbers flag
	 *
	 * Whether to use actual page numbers instead of an offset
	 *
	 * @var	bool
	 */
	protected $use_page_numbers	= FALSE;

	/**
	 * First link
	 *
	 * @var	string
	 */
	protected $first_link		= '&lsaquo; First';

	/**
	 * Next link
	 *
	 * @var	string
	 */
	protected $next_link		= '&gt;';

	/**
	 * Previous link
	 *
	 * @var	string
	 */
	protected $prev_link		= '&lt;';

	/**
	 * Last link
	 *
	 * @var	string
	 */
	protected $last_link		= 'Last &rsaquo;';

	/**
	 * URI Segment
	 *
	 * @var	int
	 */
	protected $uri_segment		= 3;

	/**
	 * Full tag open
	 *
	 * @var	string
	 */
	protected $full_tag_open	= '';

	/**
	 * Full tag close
	 *
	 * @var	string
	 */
	protected $full_tag_close	= '';

	/**
	 * First tag open
	 *
	 * @var	string
	 */
	protected $first_tag_open	= '';

	/**
	 * First tag close
	 *
	 * @var	string
	 */
	protected $first_tag_close	= '';

	/**
	 * Last tag open
	 *
	 * @var	string
	 */
	protected $last_tag_open	= '';

	/**
	 * Last tag close
	 *
	 * @var	string
	 */
	protected $last_tag_close	= '';

	/**
	 * First URL
	 *
	 * An alternative URL for the first page
	 *
	 * @var	string
	 */
	protected $first_url		= '';

	/**
	 * Current tag open
	 *
	 * @var	string
	 */
	protected $cur_tag_open		= '<strong>';

	/**
	 * Current tag close
	 *
	 * @var	string
	 */
	protected $cur_tag_close	= '</strong>';

	/**
	 * Next tag open
	 *
	 * @var	string
	 */
	protected $next_tag_open	= '';

	/**
	 * Next tag close
	 *
	 * @var	string
	 */
	protected $next_tag_close	= '';

	/**
	 * Previous tag open
	 *
	 * @var	string
	 */
	protected $prev_tag_open	= '';

	/**
	 * Previous tag close
	 *
	 * @var	string
	 */
	protected $prev_tag_close	= '';

	/**
	 * Number tag open
	 *
	 * @var	string
	 */
	protected $num_tag_open		= '';

	/**
	 * Number tag close
	 *
	 * @var	string
	 */
	protected $num_tag_close	= '';

	/**
	 * Page query string flag
	 *
	 * @var	bool
	 */
	protected $page_query_string	= FALSE;

	/**
	 * Query string segment
	 *
	 * @var	string
	 */
	protected $query_string_segment = 'per_page';

	/**
	 * Display pages flag
	 *
	 * @var	bool
	 */
	protected $display_pages	= TRUE;

	/**
	 * Attributes
	 *
	 * @var	string
	 */
	protected $_attributes		= '';

	/**
	 * Link types
	 *
	 * "rel" attribute
	 *
	 * @see	CI_Pagination::_attr_rel()
	 * @var	array
	 */
	protected $_link_types		= array();

	/**
	 * Reuse query string flag
	 *
	 * @var	bool
	 */
	protected $reuse_query_string   = FALSE;

	/**
	 * Data page attribute
	 *
	 * @var	string
	 */
	protected $data_page_attr	= 'data-ci-pagination-page';

	// --------------------------------------------------------------------
=======
	var $base_url			= ''; // The page we are linking to
	var $prefix				= ''; // A custom prefix added to the path.
	var $suffix				= ''; // A custom suffix added to the path.

	var $total_rows			=  0; // Total number of items (database results)
	var $per_page			= 10; // Max number of items you want shown per page
	var $num_links			=  2; // Number of "digit" links to show before/after the currently viewed page
	var $cur_page			=  0; // The current page being viewed
	var $use_page_numbers	= FALSE; // Use page number for segment instead of offset
	var $first_link			= '&lsaquo; First';
	var $next_link			= '&gt;';
	var $prev_link			= '&lt;';
	var $last_link			= 'Last &rsaquo;';
	var $uri_segment		= 3;
	var $full_tag_open		= '';
	var $full_tag_close		= '';
	var $first_tag_open		= '';
	var $first_tag_close	= '&nbsp;';
	var $last_tag_open		= '&nbsp;';
	var $last_tag_close		= '';
	var $first_url			= ''; // Alternative URL for the First Page.
	var $cur_tag_open		= '&nbsp;<strong>';
	var $cur_tag_close		= '</strong>';
	var $next_tag_open		= '&nbsp;';
	var $next_tag_close		= '&nbsp;';
	var $prev_tag_open		= '&nbsp;';
	var $prev_tag_close		= '';
	var $num_tag_open		= '&nbsp;';
	var $num_tag_close		= '';
	var $page_query_string	= FALSE;
	var $query_string_segment = 'per_page';
	var $display_pages		= TRUE;
	var $anchor_class		= '';
>>>>>>> Kmom03 - Create a codeigniter guestbook

	/**
	 * Constructor
	 *
<<<<<<< HEAD
	 * @param	array	$params	Initialization parameters
	 * @return	void
=======
	 * @access	public
	 * @param	array	initialization parameters
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 */
	public function __construct($params = array())
	{
		if (count($params) > 0)
		{
			$this->initialize($params);
		}

		if ($this->anchor_class != '')
		{
			$this->anchor_class = 'class="'.$this->anchor_class.'" ';
		}

		log_message('debug', "Pagination Class Initialized");
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
<<<<<<< HEAD
	 * @param	array	$params	Initialization parameters
=======
	 * @access	public
	 * @param	array	initialization parameters
>>>>>>> Kmom03 - Create a codeigniter guestbook
	 * @return	void
	 */
	function initialize($params = array())
	{
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */
	function create_links()
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Is there only one page? Hm... nothing more to do here then.
		if ($num_pages == 1)
		{
			return '';
		}

		// Set the base page index for starting page number
		if ($this->use_page_numbers)
		{
			$base_page = 1;
		}
		else
		{
			$base_page = 0;
		}

		// Determine the current page number.
		$CI =& get_instance();

<<<<<<< HEAD
		// See if we are using a prefix or suffix on links
		if ($this->prefix !== '' OR $this->suffix !== '')
		{
			$this->cur_page = (int) str_replace(array($this->prefix, $this->suffix), '', $CI->uri->rsegment($this->uri_segment));
		}

=======
>>>>>>> Kmom03 - Create a codeigniter guestbook
		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
		{
			if ($CI->input->get($this->query_string_segment) != $base_page)
			{
				$this->cur_page = $CI->input->get($this->query_string_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}
		else
		{
<<<<<<< HEAD
			$this->cur_page = (int) $CI->uri->rsegment($this->uri_segment);
		}
=======
			if ($CI->uri->segment($this->uri_segment) != $base_page)
			{
				$this->cur_page = $CI->uri->segment($this->uri_segment);
>>>>>>> Kmom03 - Create a codeigniter guestbook

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}
		
		// Set current page to 1 if using page numbers instead of offset
		if ($this->use_page_numbers AND $this->cur_page == 0)
		{
			$this->cur_page = $base_page;
		}

		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1)
		{
			show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = $base_page;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->use_page_numbers)
		{
			if ($this->cur_page > $num_pages)
			{
				$this->cur_page = $num_pages;
			}
		}
		else
		{
			if ($this->cur_page > $this->total_rows)
			{
				$this->cur_page = ($num_pages - 1) * $this->per_page;
			}
		}

		$uri_page_number = $this->cur_page;
		
		if ( ! $this->use_page_numbers)
		{
			$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);
		}

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
		{
			$this->base_url = rtrim($this->base_url).'&amp;'.$this->query_string_segment.'=';
		}
		else
		{
			$this->base_url = rtrim($this->base_url, '/') .'/';
		}

		// And here we go...
		$output = '';

		// Render the "First" link
		if  ($this->first_link !== FALSE AND $this->cur_page > ($this->num_links + 1))
		{
			$first_url = ($this->first_url == '') ? $this->base_url : $this->first_url;
			$output .= $this->first_tag_open.'<a '.$this->anchor_class.'href="'.$first_url.'">'.$this->first_link.'</a>'.$this->first_tag_close;
		}

		// Render the "previous" link
		if  ($this->prev_link !== FALSE AND $this->cur_page != 1)
		{
			if ($this->use_page_numbers)
			{
				$i = $uri_page_number - 1;
			}
			else
			{
				$i = $uri_page_number - $this->per_page;
			}

			if ($i == 0 && $this->first_url != '')
			{
				$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
			}
			else
			{
				$i = ($i == 0) ? '' : $this->prefix.$i.$this->suffix;
				$output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$i.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
			}

		}

		// Render the pages
		if ($this->display_pages !== FALSE)
		{
			// Write the digit links
			for ($loop = $start -1; $loop <= $end; $loop++)
			{
				if ($this->use_page_numbers)
				{
					$i = $loop;
				}
				else
				{
					$i = ($loop * $this->per_page) - $this->per_page;
				}

				if ($i >= $base_page)
				{
					if ($this->cur_page == $loop)
					{
						$output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
					}
					else
					{
						$n = ($i == $base_page) ? '' : $i;

						if ($n == '' && $this->first_url != '')
						{
							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.'">'.$loop.'</a>'.$this->num_tag_close;
						}
						else
						{
							$n = ($n == '') ? '' : $this->prefix.$n.$this->suffix;

							$output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$n.'">'.$loop.'</a>'.$this->num_tag_close;
						}
					}
				}
			}
		}

		// Render the "next" link
		if ($this->next_link !== FALSE AND $this->cur_page < $num_pages)
		{
			if ($this->use_page_numbers)
			{
				$i = $this->cur_page + 1;
			}
			else
			{
				$i = ($this->cur_page * $this->per_page);
			}

			$output .= $this->next_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.'">'.$this->next_link.'</a>'.$this->next_tag_close;
		}

		// Render the "Last" link
		if ($this->last_link !== FALSE AND ($this->cur_page + $this->num_links) < $num_pages)
		{
			if ($this->use_page_numbers)
			{
				$i = $num_pages;
			}
			else
			{
				$i = (($num_pages * $this->per_page) - $this->per_page);
			}
			$output .= $this->last_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.'">'.$this->last_link.'</a>'.$this->last_tag_close;
		}

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;

<<<<<<< HEAD
	// --------------------------------------------------------------------

	/**
	 * Parse attributes
	 *
	 * @param	array	$attributes
	 * @return	void
	 */
	protected function _parse_attributes($attributes)
	{
		isset($attributes['rel']) OR $attributes['rel'] = TRUE;
		$this->_link_types = ($attributes['rel'])
					? array('start' => 'start', 'prev' => 'prev', 'next' => 'next')
					: array();
		unset($attributes['rel']);

		$this->_attributes = '';
		foreach ($attributes as $key => $value)
		{
			$this->_attributes .= ' '.$key.'="'.$value.'"';
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Add "rel" attribute
	 *
	 * @link	http://www.w3.org/TR/html5/links.html#linkTypes
	 * @param	string	$type
	 * @return	string
	 */
	protected function _attr_rel($type)
	{
		if (isset($this->_link_types[$type]))
		{
			unset($this->_link_types[$type]);
			return ' rel="'.$type.'"';
		}

		return '';
	}

=======
		return $output;
	}
>>>>>>> Kmom03 - Create a codeigniter guestbook
}
// END Pagination Class

/* End of file Pagination.php */
/* Location: ./system/libraries/Pagination.php */