--TEST--
ReflectionExtension::__construct()
--CREDITS--
Gerrit "Remi" te Sligte <remi@wolerized.com>
Leon Luijkx <leon@phpgg.nl>
--FILE--
<?php require 'vendor/autoload.php';
$obj = \BetterReflection\Reflection\ReflectionExtension::createFromName('reflection');
$test = $obj instanceof ReflectionExtension;
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($test);
?>
==DONE==
--EXPECT--
bool(true)
==DONE==
