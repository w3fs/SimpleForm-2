<?php

namespace FormBuilder;

use ReflectionProperty;
use ReflectionClass;

class Builder
{

	/**
	 * All of the attacted modules
	 */

	protected static $modules = array();

	protected static $instance;

	public function __construct()
	{
		self::$instance = $this;
	}

	/**
	 * Attach a given module
	 *
	 * @param  object The module
	 */

	public function attach($module)
	{
		if (is_object($module))
		{
			self::$modules[] = $module;
		}
	}

	protected function resolveIsStatic($object, $method)
	{
		$reflection = new ReflectionClass($object);

		$reflection = $reflection->getMethod($method);

		return $reflection->isStatic();
	}

	protected static function getInstance()
	{
		return self::$instance;
	}

	protected static function extractClassName($module)
	{
		$explode = explode('\\', get_class($module));
		return end($explode);
	}

	/**
	 * Call the class using the Builder instance provided by the autoloader
	 * or created by the developer itsself
	 *
	 * @param string The method
	 * @param array The arguments
	 */

	public function __call($method, $arguments)
	{
		
	}

	/**
	 * Call the class statically
	 * 
	 * @param string The method
	 * @param array The arguments
	 *
	 * @return The parsed HTML Form code
	 */

	public static function __callStatic($method, $arguments)
	{
		foreach (self::$modules as $module)
		{
			if (method_exists($module, $method))
			{
				if (self::getInstance()->resolveIsStatic($module, $method))
				{
					return call_user_func(get_class($module) . '::' . $method, $arguments);
				}
				return call_user_func(array($module, $method), $arguments);
			}
		}
	}
}
