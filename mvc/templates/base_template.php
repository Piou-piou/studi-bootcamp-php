<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            Mon super garage
        </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
              crossorigin="anonymous">

        <link rel="stylesheet" href="assets/css/style.css">
        <script rel="stylesheet" src="assets/js/main.js" defer></script>
    </head>
    <body>
        <header>
            <nav>
                <a href="/">lien vers index</a>
                <a href="/ajout_voiture">Ajouter un voiture</a>
                <a href="/inscription/create">Inscription</a>
            </nav>
        </header>

        <main class="container">
            <!-- inclure mon contenu -->
            <?php require_once $page ?>
        </main>

        <footer>
            Copyrights 2024
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous"></script>
    </body>
</html>
