<?php

class Personnage
{
    private const SANTE_MAX = 100;

    public function __construct(private string $nom, private int $sante, private int $force)
    {
        if ($this->sante > self::SANTE_MAX) {
            $this->sante = self::SANTE_MAX;
        }
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getSante()
    {
        return $this->sante;
    }

    public function setSante(int $sante)
    {
        if ($sante > self::SANTE_MAX) {
            $sante = self::SANTE_MAX;
        }

        $this->sante = $sante;
    }

    public function getForce()
    {
        return $this->force;
    }

    public function attaque(Personnage $personnage)
    {
        $personnage->setSante($personnage->getSante() - $this->getForce());
    }

    public function appliqueSoins()
    {
        if ($this->nom === 'Merlin') {
            $this->setSante(100);

            return;
        }

        $this->setSante($this->getSante() + 5);
    }
}