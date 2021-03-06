--TEST--
Test ReflectionProperty::setAccessible().
--FILE--
<?php require 'vendor/autoload.php';
class A {
    protected $protected = 'a';
    protected static $protectedStatic = 'b';
    private $private = 'c';
    private static $privateStatic = 'd';
}

class B extends A {}

$a               = new A;
$protected       = \BetterReflection\Reflection\ReflectionProperty::createFromName($a, 'protected');
$protectedStatic = \BetterReflection\Reflection\ReflectionProperty::createFromName('A', 'protectedStatic');
$private         = \BetterReflection\Reflection\ReflectionProperty::createFromName($a, 'private');
$privateStatic   = \BetterReflection\Reflection\ReflectionProperty::createFromName('A', 'privateStatic');

try {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($protected->getValue($a));
}

catch (ReflectionException $e) {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($e->getMessage());
}

try {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($protectedStatic->getValue());
}

catch (ReflectionException $e) {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($e->getMessage());
}

try {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($private->getValue($a));
}

catch (ReflectionException $e) {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($e->getMessage());
}

try {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($privateStatic->getValue());
}

catch (ReflectionException $e) {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($e->getMessage());
}

$protected->setAccessible(TRUE);
$protectedStatic->setAccessible(TRUE);
$private->setAccessible(TRUE);
$privateStatic->setAccessible(TRUE);

// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($protected->getValue($a));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($protectedStatic->getValue());
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($private->getValue($a));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($privateStatic->getValue());

$protected->setValue($a, 'e');
$protectedStatic->setValue('f');
$private->setValue($a, 'g');
$privateStatic->setValue('h');

// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($protected->getValue($a));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($protectedStatic->getValue());
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($private->getValue($a));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($privateStatic->getValue());

$a               = new A;
$b               = new B;
$protected       = \BetterReflection\Reflection\ReflectionProperty::createFromName($b, 'protected');
$protectedStatic = \BetterReflection\Reflection\ReflectionProperty::createFromName('B', 'protectedStatic');
$private         = \BetterReflection\Reflection\ReflectionProperty::createFromName($a, 'private');

try {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($protected->getValue($b));
}

catch (ReflectionException $e) {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($e->getMessage());
}

try {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($protectedStatic->getValue());
}

catch (ReflectionException $e) {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($e->getMessage());
}

try {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($private->getValue($b));
}

catch (ReflectionException $e) {
    // @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($e->getMessage());
}

$protected->setAccessible(TRUE);
$protectedStatic->setAccessible(TRUE);
$private->setAccessible(TRUE);

// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($protected->getValue($b));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($protectedStatic->getValue());
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($private->getValue($b));

$protected->setValue($b, 'e');
$protectedStatic->setValue('f');
$private->setValue($b, 'g');

// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($protected->getValue($b));
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($protectedStatic->getValue());
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($private->getValue($b));
?>
--EXPECT--
string(44) "Cannot access non-public member A::protected"
string(50) "Cannot access non-public member A::protectedStatic"
string(42) "Cannot access non-public member A::private"
string(48) "Cannot access non-public member A::privateStatic"
string(1) "a"
string(1) "b"
string(1) "c"
string(1) "d"
string(1) "e"
string(1) "f"
string(1) "g"
string(1) "h"
string(44) "Cannot access non-public member B::protected"
string(50) "Cannot access non-public member B::protectedStatic"
string(42) "Cannot access non-public member A::private"
string(1) "a"
string(1) "b"
string(1) "c"
string(1) "e"
string(1) "f"
string(1) "g"
