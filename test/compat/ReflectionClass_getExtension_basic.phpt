--TEST--
ReflectionClass::getExtension() method - basic test for getExtension() method
--SKIPIF--
<?php extension_loaded('dom') or die('skip - dom extension not loaded'); ?>
--CREDITS--
Rein Velt <rein@velt.org>
#testFest Roosendaal 2008-05-10
--FILE--
<?php require 'vendor/autoload.php';
 	$rc=\BetterReflection\Reflection\ReflectionClass::createFromName('domDocument');
 	// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($rc->getExtension()) ;
?>
--EXPECTF--
object(ReflectionExtension)#%d (1) {
  ["name"]=>
  string(3) "dom"
}
