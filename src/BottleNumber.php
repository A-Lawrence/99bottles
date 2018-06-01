<?php

class BottleNumber
{
    public $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function container()
    {
        if ($this->number == 1) {
            return "bottle";
        }

        return "bottles";
    }

    public function pronoun()
    {
        if ($this->number == 1) {
            return "it";
        }

        return "one";
    }

    public function quantity()
    {
        if ($this->number == 0) {
            return "no more";
        }

        return $this->number;
    }

    public function action()
    {
        if ($this->number == 0) {
            return "Go to the store and buy some more";
        }

        return "Take {$this->pronoun()} down and pass it around";
    }

    public function successor()
    {
        if ($this->number == 0) {
            return 99;
        }

        return $this->number - 1;
    }
}