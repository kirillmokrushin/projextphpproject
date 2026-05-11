<?php

namespace App;

class MagicClass
{
    public function __construct()
    {
        echo "__construct called<br>";
    }

    public function __destruct()
    {
        echo "__destruct called<br>";
    }

    public function __get($name)
    {
        echo "__get called with: $name<br>";
    }

    public function __set($name, $value)
    {
        echo "__set called with: $name = $value<br>";
    }

    public function __call($name, $arguments)
    {
        echo "__call called with: $name, arguments: " . implode(', ', $arguments) . "<br>";
    }

    public function __toString()
    {
        echo "__toString called<br>";
        return "MagicClass object";
    }

    public function __invoke($arg)
    {
        echo "__invoke called with: $arg<br>";
    }

    public function __isset($name)
    {
        echo "__isset called with: $name<br>";
        return false;
    }

    public function __unset($name)
    {
        echo "__unset called with: $name<br>";
    }

    public function __sleep()
    {
        echo "__sleep called<br>";
        return [];
    }

    public function __wakeup()
    {
        echo "__wakeup called<br>";
    }

    public function __clone()
    {
        echo "__clone called<br>";
    }
}
