<?php

class BottleNumber
{
    public $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public static function factory($number)
    {
        $class = "BottleNumber" . $number;

        if (class_exists($class)) {
            return new $class($number);
        }

        return new BottleNumber($number);
    }

    public function container()
    {
        return "bottles";
    }

    public function pronoun()
    {
        return "one";
    }

    public function quantity()
    {
        return $this->number;
    }

    public function action()
    {
        return "Take {$this->pronoun()} down and pass it around";
    }

    public function successor()
    {
        return BottleNumber::factory($this->number - 1);
    }

    public function __toString()
    {
        return $this->quantity() . " " . $this->container();
    }
}
