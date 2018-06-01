<?php

class BeerSong
{
    public function verse($number)
    {
        $bottleNumber     = BottleNumber::factory($number);

        return ucfirst($bottleNumber) . " of beer on the wall, " .
            "{$bottleNumber} of beer." . PHP_EOL .
            "{$bottleNumber->action()}, " .
            "{$bottleNumber->successor()} of beer on the wall." . PHP_EOL;
    }

    public function verses($start, $end)
    {
        $verses = [];

        for ($i = $start; $i >= $end; $i--) {
            $verses[] = $this->verse($i);
        }

        return implode(PHP_EOL, $verses);
    }

    public function lyrics()
    {
        return $this->verses(99, 0);
    }
}
