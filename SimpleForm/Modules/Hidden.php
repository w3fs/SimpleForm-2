<?php

namespace SimpleForm\Modules;

use SimpleForm\Modules\ModuleInterface;

class HiddenModule implements ModuleInterface
{
	public static function hidden()
	{
		return 'Hidden';
	}

	public function compile()
	{

	}
}