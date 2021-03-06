--TEST--
Bug #39884 (ReflectionParameter::getClass() throws exception for type hint self)
--FILE--
<?php require 'vendor/autoload.php';
class stubParamTest
{
    function paramTest(self $param)
    {
        // nothing to do
    }
}
$test1 = new stubParamTest();
$test2 = new stubParamTest();
$test1->paramTest($test2);
$refParam = \BetterReflection\Reflection\ReflectionParameter::createFromName(array('stubParamTest', 'paramTest'), 'param');
// @todo see https://github.com/Roave/BetterReflection/issues/155 --- var_dump($refParam->getClass());
?>
--EXPECT--	
object(ReflectionClass)#4 (1) {
  ["name"]=>
  string(13) "stubParamTest"
}
