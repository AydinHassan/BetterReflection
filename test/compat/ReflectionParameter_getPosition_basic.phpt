--TEST--
ReflectionParameter::getPosition()
--CREDITS--
Stefan Koopmanschap <stefan@stefankoopmanschap.nl>
#testfest roosendaal on 2008-05-10
--FILE--
<?php require 'vendor/autoload.php';
function ReflectionParameterTest($test, $test2 = null) {
	echo $test;
}
$reflect = \BetterReflection\Reflection\ReflectionFunction::createFromName('ReflectionParameterTest');
$params = $reflect->getParameters();
foreach($params as $key => $value) {
	// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($value->getPosition());
}
?>
==DONE==
--EXPECT--
int(0)
int(1)
==DONE==
