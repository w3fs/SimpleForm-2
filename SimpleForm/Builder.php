<?php

namespace FormBuilder;

class Builder
{

	/**
	 * All of the attacted modules
	 */

	protected static $modules = array();

	/**
	 * Attach a given module
	 *
	 * @param  object The module
	 */

	public function attach($module)
	{
		if (is_object($module))
		{
			self::$modules = $module;
		}
	}

	/**
	 * Call the class statically
	 * 
	 * @param string The method
	 * @param array The arguments
	 */

	public static function __callStatic($method, $arguments)
	{
		foreach (self::$modules as $module)
		{
			if (strtolower(get_class($module)) == strtolower($method))
			{
				return call_user_func($module . '::' . $method, $arguments);
			}
		}
	}
}
