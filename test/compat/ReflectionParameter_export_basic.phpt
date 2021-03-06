--TEST--
ReflectionParameter::export()
--CREDITS--
Stefan Koopmanschap <stefan@stefankoopmanschap.nl>
--FILE--
<?php require 'vendor/autoload.php';
function ReflectionParameterTest($test, $test2 = null) {
	echo $test;
}
$reflect = \BetterReflection\Reflection\ReflectionFunction::createFromName('ReflectionParameterTest');
foreach($reflect->getParameters() as $key => $value) {
	echo ReflectionParameter::export('ReflectionParameterTest', $key);
}
?>
==DONE==
--EXPECT--
Parameter #0 [ <required> $test ]
Parameter #1 [ <optional> $test2 = NULL ]
==DONE==
