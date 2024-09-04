<?php

namespace App\Controller;

use App\Database\Dbutils;
use PDO;

class Homepage
{
    public function home()
    {
        $query = Dbutils::getPdo()->query('SELECT * FROM voiture');
        $voitures = $query->fetchAll(PDO::FETCH_ASSOC);

        return [
            'template' => 'home/homepage',
            'voitures' => $voitures,
        ];
    }
}
