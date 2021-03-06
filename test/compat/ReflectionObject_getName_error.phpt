--TEST--
ReflectionObject::getname() - invalid params
--FILE--
<?php require 'vendor/autoload.php';
class C { }
$myInstance = new C;
$r2 = \BetterReflection\Reflection\ReflectionObject::createFromInstance($myInstance);

$r3 = \BetterReflection\Reflection\ReflectionObject::createFromInstance($r2);

// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($r3->getName(null));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($r3->getName('x','y'));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($r3->getName(0));
?>
--EXPECTF--
Warning: ReflectionClass::getName() expects exactly 0 parameters, 1 given in %s on line %d
NULL

Warning: ReflectionClass::getName() expects exactly 0 parameters, 2 given in %s on line %d
NULL

Warning: ReflectionClass::getName() expects exactly 0 parameters, 1 given in %s on line %d
NULL
