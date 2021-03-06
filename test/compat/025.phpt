--TEST--
ReflectionFunction basic tests
--SKIPIF--
<?php extension_loaded('reflection') or die('skip'); ?>
--INI--
opcache.save_comments=1
--FILE--
<?php require 'vendor/autoload.php';

/**
hoho
*/
function test ($a, $b = 1, $c = "") {
	static $var = 1;
}

$func = \BetterReflection\Reflection\ReflectionFunction::createFromName("test");

// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->export("test"));
echo "--getName--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->getName());
echo "--isInternal--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->isInternal());
echo "--isUserDefined--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->isUserDefined());
echo "--getFilename--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->getFilename());
echo "--getStartline--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->getStartline());
echo "--getEndline--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->getEndline());
echo "--getDocComment--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->getDocComment());
echo "--getStaticVariables--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->getStaticVariables());
echo "--invoke--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->invoke(array(1,2,3)));
echo "--invokeArgs--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->invokeArgs(array(1,2,3)));
echo "--returnsReference--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->returnsReference());
echo "--getParameters--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->getParameters());
echo "--getNumberOfParameters--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->getNumberOfParameters());
echo "--getNumberOfRequiredParameters--\n";
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($func->getNumberOfRequiredParameters());

echo "Done\n";

?>
--EXPECTF--	
/**
hoho
*/
Function [ <user> function test ] {
  @@ %s 6 - 8

  - Parameters [3] {
    Parameter #0 [ <required> $a ]
    Parameter #1 [ <optional> $b = 1 ]
    Parameter #2 [ <optional> $c = '' ]
  }
}

NULL
--getName--
string(4) "test"
--isInternal--
bool(false)
--isUserDefined--
bool(true)
--getFilename--
string(%d) "%s025.php"
--getStartline--
int(6)
--getEndline--
int(8)
--getDocComment--
string(%d) "/**
hoho
*/"
--getStaticVariables--
array(1) {
  ["var"]=>
  int(1)
}
--invoke--
NULL
--invokeArgs--
NULL
--returnsReference--
bool(false)
--getParameters--
array(3) {
  [0]=>
  object(ReflectionParameter)#2 (1) {
    ["name"]=>
    string(1) "a"
  }
  [1]=>
  object(ReflectionParameter)#3 (1) {
    ["name"]=>
    string(1) "b"
  }
  [2]=>
  object(ReflectionParameter)#4 (1) {
    ["name"]=>
    string(1) "c"
  }
}
--getNumberOfParameters--
int(3)
--getNumberOfRequiredParameters--
int(1)
Done
