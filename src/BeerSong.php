<?php

class BeerSong
{
    public function verse($number)
    {
        return ucfirst($this->quantity($number)) . " {$this->container($number)} of beer on the wall, " .
            "{$this->quantity($number)} {$this->container($number)} of beer." . PHP_EOL .
            "{$this->action($number)}, " .
            "{$this->quantity($this->successor($number))} {$this->container($this->successor($number))} of beer on the wall." .
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

    private function container($number)
    {
        if ($number == 1) {
            return "bottle";
        }

        return "bottles";
    }

    private function pronoun($number)
    {
        if ($number == 1) {
            return "it";
        }

        return "one";
    }

    private function quantity($number)
    {
        if ($number == 0) {
            return "no more";
        }

        return $number;
    }

    private function action($number)
    {
        if ($number == 0) {
            return "Go to the store and buy some more";
        }

        return "Take {$this->pronoun($number)} down and pass it around";
    }

    private function successor($number)
    {
        if ($number == 0) {
            return 99;
        }

        return $number - 1;
    }
}
