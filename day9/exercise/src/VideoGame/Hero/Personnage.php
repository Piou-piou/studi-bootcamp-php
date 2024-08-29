<?php

namespace App\VideoGame\Hero;

use App\VideoGame\PlayerInformation\Player;

class Personnage
{
    private const SANTE_MAX = 100;

    private null|Equipement $equipement = null;

    private null|Player $player = null;

    public function __construct(private string $nom, private int $sante, private int $force, private int $defense = 0)
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

    public function getDefense()
    {
        return $this->defense;
    }


    public function attaque(Personnage $personnage)
    {
        if ($this->getForce() < $personnage->getDefense()) {
            return;
        }

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

    public function getEquipement(): ?Equipement
    {
        return $this->equipement;
    }

    public function setEquipement(Equipement $equipement): self
    {
        $this->equipement = $equipement;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): void
    {
        $this->player = $player;
    }


}
