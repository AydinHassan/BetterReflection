--TEST--
ReflectionExtension::getClassNames() method on an extension which actually returns some information
--CREDITS--
Felix De Vliegher <felix.devliegher@gmail.com>
--FILE--
<?php require 'vendor/autoload.php';
$standard = \BetterReflection\Reflection\ReflectionExtension::createFromName('standard');
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($standard->getClassNames());
?>
==DONE==
--EXPECTF--
array(4) {
  [0]=>
  %s(22) "__PHP_Incomplete_Class"
  [1]=>
  %s(15) "php_user_filter"
  [2]=>
  %s(9) "Directory"
  [3]=>
  %s(14) "AssertionError"
}
==DONE==
