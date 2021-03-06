--TEST--
Test ReflectionProperty class errors.
--FILE--
<?php require 'vendor/autoload.php';

class C {
    public static $p;
}

try {
	\BetterReflection\Reflection\ReflectionProperty::createFromName();
} catch (TypeError $re) {
	echo "Ok - ".$re->getMessage().PHP_EOL;
}
try {
	\BetterReflection\Reflection\ReflectionProperty::createFromName('C::p');
} catch (TypeError $re) {
	echo "Ok - ".$re->getMessage().PHP_EOL;
}

try {
	\BetterReflection\Reflection\ReflectionProperty::createFromName('C', 'p', 'x');
} catch (TypeError $re) {
	echo "Ok - ".$re->getMessage().PHP_EOL;
}


$rp = \BetterReflection\Reflection\ReflectionProperty::createFromName('C', 'p');
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rp->getName(1));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rp->isPrivate(1));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rp->isProtected(1));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rp->isPublic(1));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rp->isStatic(1));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rp->getModifiers(1));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rp->isDefault(1));

?>
--EXPECTF--
Ok - ReflectionProperty::__construct() expects exactly 2 parameters, 0 given
Ok - ReflectionProperty::__construct() expects exactly 2 parameters, 1 given
Ok - ReflectionProperty::__construct() expects exactly 2 parameters, 3 given

Warning: ReflectionProperty::getName() expects exactly 0 parameters, 1 given in %s on line %d
NULL

Warning: ReflectionProperty::isPrivate() expects exactly 0 parameters, 1 given in %s on line %d
NULL

Warning: ReflectionProperty::isProtected() expects exactly 0 parameters, 1 given in %s on line %d
NULL

Warning: ReflectionProperty::isPublic() expects exactly 0 parameters, 1 given in %s on line %d
NULL

Warning: ReflectionProperty::isStatic() expects exactly 0 parameters, 1 given in %s on line %d
NULL

Warning: ReflectionProperty::getModifiers() expects exactly 0 parameters, 1 given in %s on line %d
NULL

Warning: ReflectionProperty::isDefault() expects exactly 0 parameters, 1 given in %s on line %d
NULL
