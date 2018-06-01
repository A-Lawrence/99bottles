<?php

class BottleNumber0 extends BottleNumber
{
    public function quantity()
    {
        return "no more";
    }

    public function action()
    {
        return "Go to the store and buy some more";
    }

    public function successor()
    {
        return BottleNumber::factory(99);
    }
}
