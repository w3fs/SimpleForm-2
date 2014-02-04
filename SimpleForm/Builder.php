<?php

namespace SimpleForm;

use ReflectionProperty;
use ReflectionClass;

class Builder
{

	/**
	 * All of the attacted modules
	 */

	protected static $modules = array();

	/**
	 * The current instance of the Builder
	 */

	protected static $instance;

	/**
	 * Construct the builder
	 */

	public function __construct()
	{
		self::setInstance($this);
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

	/**
	 * Resolves if a method in a specified method is a static one
	 *
	 * @param object The object
	 * @param string The method to resolve
	 *
	 * @return bool The result
	 */

	protected function resolveIsStatic($object, $method)
	{
		$reflection = new ReflectionClass($object);

		$reflection = $reflection->getMethod($method);

		return $reflection->isStatic();
	}

	protected function rebuildArguments($arguments)
	{
		return (is_array($arguments) ? return end($arguments) ? return $arguments;
	}

	/**
	 * Sets the current instane
	 *
	 * @param object The instance
	 */

	protected static function setInstance($instance)
	{
		self::$instance = $instance;
	}

	/**
	 * Gets the current instance
	 *
	 * @return object The instance
	 */

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
		$arguments = $this->rebuildArguments($arguments);

		foreach (self::$modules as $module)
		{
			if (method_exists($module, $method))
			{
				if ($this->resolveIsStatic($module, $method))
				{
					return call_user_func(get_class($module) . '::' . $method, $arguments);
				}
				return call_user_func(array($module, $method), $arguments);
			}
		}
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
		$arguments = $this->rebuildArguments($arguments);

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
