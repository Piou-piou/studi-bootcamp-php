<?php

namespace App\VideoGame\Hero;

class Equipement
{
    private int $pointAttaque;
    private int $pointDefense;
    private int $durabilite = 100;



    public function getPointAttaque(): int
    {
        return $this->pointAttaque;
    }

    public function setPointAttaque(int $pointAttaque): self
    {
        $this->pointAttaque = $pointAttaque;

        return $this;
    }

    public function getPointDefense(): int
    {
        return $this->pointDefense;
    }

    public function setPointDefense(int $pointDefense): self
    {
        $this->pointDefense = $pointDefense;

        return $this;
    }

    public function getDurabilite(): int
    {
        return $this->durabilite;
    }

    public function setDurabilite(int $durabilite): self
    {
        $this->durabilite = $durabilite;

        return $this;
    }
}
