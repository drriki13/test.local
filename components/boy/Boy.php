<?php

namespace app\components\boy;

class Boy
{
    /**
     * @var Chalk
     */
    private $chalk;

    /**
     * @param Chalk $chalk
     * @return $this
     */
    public function takeInHand(Chalk $chalk): Boy
    {
        $this->chalk = $chalk;
        return $this;
    }

    /**
     * @param string $text
     */
    public function writeText(string $text)
    {
        $this->chalk->write($text);
    }
}