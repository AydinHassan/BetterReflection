--TEST--
ReflectionClass::[gs]etStaticPropertyValue
--FILE--
<?php require 'vendor/autoload.php';

/* ReflectionClass cannot touch protected or private static properties */

/* ReflectionClass cannot create or delete static properties */

Class Test
{
	static public    $pub = 'pub';
	static protected $pro = 'pro';
	static private   $pri = 'pri';
	
	static function testing()
	{
		$ref = \BetterReflection\Reflection\ReflectionClass::createFromName('Test');

		foreach(array('pub', 'pro', 'pri') as $name)
		{
			try
			{
				// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($ref->getStaticPropertyValue($name));
				// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($ref->getStaticPropertyValue($name));
				$ref->setStaticPropertyValue($name, 'updated');
				// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($ref->getStaticPropertyValue($name));
			}
			catch(Exception $e)
			{
				echo "EXCEPTION\n";
			}
		}
	}
}

Class TestDerived extends Test
{
//	static public    $pub = 'pub';
//	static protected $pro = 'pro';
	static private   $pri = 'pri';

	static function testing()
	{
		$ref = \BetterReflection\Reflection\ReflectionClass::createFromName('Test');

		foreach(array('pub', 'pro', 'pri') as $name)
		{
			try
			{
				// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($ref->getStaticPropertyValue($name));
				// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($ref->getStaticPropertyValue($name));
				$ref->setStaticPropertyValue($name, 'updated');
				// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($ref->getStaticPropertyValue($name));
			}
			catch(Exception $e)
			{
				echo "EXCEPTION\n";
			}
		}
	}
}

$ref = \BetterReflection\Reflection\ReflectionClass::createFromName('Test');

foreach(array('pub', 'pro', 'pri') as $name)
{
	try
	{
		// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($ref->getStaticPropertyValue($name));
		// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($ref->getStaticPropertyValue($name));
		$ref->setStaticPropertyValue($name, 'updated');
		// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($ref->getStaticPropertyValue($name));
	}
	catch(Exception $e)
	{
		echo "EXCEPTION\n";
	}
}

Test::testing();
TestDerived::testing();

?>
===DONE===
<?php require 'vendor/autoload.php'; exit(0); ?>
--EXPECT--
string(3) "pub"
string(3) "pub"
string(7) "updated"
EXCEPTION
EXCEPTION
string(7) "updated"
string(7) "updated"
string(7) "updated"
EXCEPTION
EXCEPTION
string(7) "updated"
string(7) "updated"
string(7) "updated"
EXCEPTION
EXCEPTION
===DONE===
