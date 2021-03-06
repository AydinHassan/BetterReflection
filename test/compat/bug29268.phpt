--TEST--
Reflection Bug #29268 (__autoload() not called with reflectionProperty->getClass())
--FILE--
<?php require 'vendor/autoload.php';
function __autoload($classname) {
	echo "__autoload($classname)\n";
	eval("class $classname {}");
}

class B{
	public function doit(A $a){
	}
}

$ref = \BetterReflection\Reflection\ReflectionMethod::createFromName('B','doit');
$parameters = $ref->getParameters();	
foreach($parameters as $parameter)
{
	$class = $parameter->getClass();
	echo $class->name."\n";
}
echo "ok\n";
?>
--EXPECT--
__autoload(A)
A
ok
