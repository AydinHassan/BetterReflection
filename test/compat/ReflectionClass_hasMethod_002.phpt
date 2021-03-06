--TEST--
ReflectionClass::hasMethod() - error cases
--CREDITS--
Robin Fernandes <robinf@php.net>
Steve Seear <stevseea@php.net>
--FILE--
<?php require 'vendor/autoload.php';
class C {
	function f() {}
}

$rc = \BetterReflection\Reflection\ReflectionClass::createFromName("C");
echo "Check invalid params:\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->hasMethod());
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->hasMethod("f", "f"));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->hasMethod(null));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->hasMethod(1));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->hasMethod(1.5));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->hasMethod(true));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->hasMethod(array(1,2,3)));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->hasMethod(new C));
?>
--EXPECTF--
Check invalid params:

Warning: ReflectionClass::hasMethod() expects exactly 1 parameter, 0 given in %s on line 8
NULL

Warning: ReflectionClass::hasMethod() expects exactly 1 parameter, 2 given in %s on line 9
NULL
bool(false)
bool(false)
bool(false)
bool(false)

Warning: ReflectionClass::hasMethod() expects parameter 1 to be string, array given in %s on line 14
NULL

Warning: ReflectionClass::hasMethod() expects parameter 1 to be string, object given in %s on line 15
NULL
