<?php

class BeerSong
{
    public function verse($verse)
    {
        switch ($verse) {
            case 0:
                return $this->emptyVerse();
            case 1:
                return $this->singularVerse();
            default:
                return $this->pluralVerse($verse);
        }
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

    private function emptyVerse()
    {
        return "No more bottles of beer on the wall, no more bottles of beer." . PHP_EOL . "Go to the store and buy some more, 99 bottles of beer on the wall.";
    }

    private function singularVerse()
    {
        return "1 bottle of beer on the wall, 1 bottle of beer." . PHP_EOL . "Take it down and pass it around, no more bottles of beer on the wall." . PHP_EOL;
    }

    private function pluralVerse($bottles)
    {
        $sentence = '%1$d %2$s of beer on the wall, %1$d %2$s of beer.';
        $sentence .= PHP_EOL;
        $sentence .= 'Take one down and pass it around, %3$d %4$s of beer on the wall.';
        $sentence .= PHP_EOL;

        return sprintf($sentence, $bottles, $this->plural($bottles), $bottles - 1, $this->plural($bottles - 1));
    }

    private function plural($bottles)
    {
        if ($bottles == 1) {
            return "bottle";
        }

        return "bottles";
    }

}