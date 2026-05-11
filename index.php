<?php

require 'vendor/autoload.php';

use App\MagicClass;

echo "<h1>Demonstration of Magic Methods</h1>";

// __construct
echo "<h3>1. __construct:</h3>";
$obj = new MagicClass();

// __set and __get
echo "<h3>2. __set and __get:</h3>";
$obj->unknownProperty = "some value";
echo $obj->unknownProperty;

// __call
echo "<h3>3. __call:</h3>";
$obj->nonExistentMethod("arg1", "arg2");

// __toString
echo "<h3>4. __toString:</h3>";
echo $obj;

// __invoke
echo "<h3>5. __invoke:</h3>";
$obj("test argument");

// __isset
echo "<h3>6. __isset:</h3>";
isset($obj->someProperty);

// __unset
echo "<h3>7. __unset:</h3>";
unset($obj->someProperty);

// __sleep and __wakeup
echo "<h3>8. __sleep and __wakeup:</h3>";
$serialized = serialize($obj);
unserialize($serialized);

// __clone
echo "<h3>9. __clone:</h3>";
$obj2 = clone $obj;

// __destruct (вызывается автоматически в конце скрипта)
echo "<h3>10. __destruct:</h3>";
echo "Object will be destroyed at script end<br>";

