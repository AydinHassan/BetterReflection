--TEST--
ReflectionProperty::getModifiers()
--CREDITS--
Robin Fernandes <robinf@php.net>
Steve Seear <stevseea@php.net>
--FILE--
<?php require 'vendor/autoload.php';

function reflectProperty($class, $property) {
	$propInfo = \BetterReflection\Reflection\ReflectionProperty::createFromName($class, $property);
	
	echo "**********************************\n";
	echo "Reflecting on property $class::$property\n\n";
	
	echo "getModifiers():\n";
	// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($propInfo->getModifiers());
	
	echo "\n**********************************\n";
}

class TestClass
{
    public $pub;
    static public $stat = "static property";
    /**
 	 * This property has a comment. 
 	 */
    protected $prot = 4;
    private $priv = "keepOut";
}

reflectProperty("TestClass", "pub");
reflectProperty("TestClass", "stat");
reflectProperty("TestClass", "prot");
reflectProperty("TestClass", "priv");

?>
--EXPECT--
**********************************
Reflecting on property TestClass::pub

getModifiers():
int(256)

**********************************
**********************************
Reflecting on property TestClass::stat

getModifiers():
int(257)

**********************************
**********************************
Reflecting on property TestClass::prot

getModifiers():
int(512)

**********************************
**********************************
Reflecting on property TestClass::priv

getModifiers():
int(1024)

**********************************
