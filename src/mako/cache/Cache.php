<?php

/**
 * @copyright  Frederic G. Østby
 * @license    http://www.makoframework.com/license
 */

namespace mako\cache;

use \mako\cache\stores\StoreInterface;

/**
 * Cache wrapper.
 *
 * @author  Frederic G. Østby
 */

class Cache
{
	//---------------------------------------------
	// Class properties
	//---------------------------------------------

	/**
	 * Cache store.
	 * 
	 * @var \mako\cache\stores\StoreInterface
	 */

	protected $store;

	/**
	 * Cache prefix.
	 * 
	 * @var string
	 */

	protected $prefix;

	//---------------------------------------------
	// Class constructor, destructor etc ...
	//---------------------------------------------

	/**
	 * Constructor.
	 * 
	 * @access  public
	 * @param   \mako\cache\stores\StoreInterface  $store   Cache store
	 * @param   string                             $prefix  (optional) Cache prefix
	 */

	public function __construct(StoreInterface $store, $prefix = null)
	{
		$this->store = $store;

		$this->prefix = $prefix;
	}

	//---------------------------------------------
	// Class methods
	//---------------------------------------------

	/**
	 * Returns a prefixed cache key.
	 * 
	 * @access  protected
	 * @param   string     $key  Cache key
	 * @return  string
	 */

	protected function prefixedKey($key)
	{
		return empty($this->prefix) ? $key : $this->prefix . ':' . $key;
	}

	/**
	 * Store data in the cache.
	 *
	 * @access  public
	 * @param   string   $key    Cache key
	 * @param   mixed    $data   The data to store
	 * @param   int      $ttl    (optional) Time to live
	 * @return  boolean
	 */

	public function write($key, $data, $ttl = 0)
	{
		return $this->store->write($this->prefixedKey($key), $data, $ttl);
	}

	/**
	 * Returns TRUE if the cache key exists and FALSE if not.
	 * 
	 * @access  public
	 * @param   string   $key  Cache key
	 * @return  boolean
	 */

	public function has($key)
	{
		return $this->store->has($this->prefixedKey($key));
	}

	/**
	 * Fetch data from the cache.
	 *
	 * @access  public
	 * @param   string  $key  Cache key
	 * @return  mixed
	 */

	public function read($key)
	{
		return $this->store->read($this->prefixedKey($key));
	}

	/**
	 * Delete data from the cache.
	 *
	 * @access  public
	 * @param   string   $key  Cache key
	 * @return  boolean
	 */

	public function delete($key)
	{
		return $this->store->delete($this->prefixedKey($key));
	}

	/**
	 * Clears the user cache.
	 *
	 * @access  public
	 * @return  boolean
	 */

	public function clear($key)
	{
		return $this->store->clear($this->prefixedKey($key));
	}
}