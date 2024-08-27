<?php

class DbConnection
{
    const DSN = 'mysql:host=mysql;dbname=garage';
    const USER = 'root';
    const PASSWORD = '';

    // définition de notre variable qui stockera notre PDO
    static ?PDO $pdo = null;

    public static function getPdo(): PDO
    {
        // si pdo existe et a déjà été rempli avec le new PDO on le retourne directement pour éviter
        // d'enregistrer x pdo et ouvrir x connexion à notre bdd
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        // ici seulement si self::pdo n'est pas défini on ouvre notre connexion à la base
        self::$pdo = new PDO(self::DSN, self::USER, self::PASSWORD);

        // et on retourne la valeur
        return self::$pdo;
    }
}
