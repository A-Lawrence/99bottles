<?php

class BeerSong
{
    public function verse($number)
    {
        $bnum = new BottleNumber($number);
        $nnum = new BottleNumber($bnum->successor());

        return ucfirst($bnum->quantity()) . " {$bnum->container()} of beer on the wall, " .
            "{$bnum->quantity()} {$bnum->container()} of beer." . PHP_EOL .
            "{$bnum->action()}, " .
            "{$nnum->quantity()} {$nnum->container()} of beer on the wall." .
            PHP_EOL;
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
