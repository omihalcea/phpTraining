<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Demo PHP</title>
    </head>
    <body>
        <h1>
            <?php
                $greeting = "Hello World!<br>";
                echo $greeting;
                $a = 8;
                $b = 5;
                echo "Resultat: " , $a + $b , "<br>";
                $films1 = [
                        "Dune",
                    "Star Wars",
                    "Blade Runner 2049",
                    "Avatar",
                    "2001: a space odyssey"
                ];
                var_dump($films1);
                function filterByDirector($films, $director) {
                    $filteredDirectors = [];
                    foreach ($films as $film) {
                        if ($film["director"] == $director) {
                            $filteredDirectors[] = $film;
                        }
                    }
                    return $filteredDirectors;
                }
                function filteredByYear($films, $year) {
                    $filteredYears = [];
                    foreach ($films as $film) {
                        if ($film["year"] >= $year) {
                            $filteredYears[] = $film;
                        }
                    }
                    return $filteredYears;
                }

            $films = [
                [
                        "name" => "Dune",
                    "director" => "Denis Villeneuve",
                    "year" => "2020",
                ],   [
                        "name" => "Star Wars",
                    "director" => "George Lucas",
                    "year" => "1977",
                ], [
                        "name" => "Blade Runner 2049",
                    "director" => "Denis Villeneuve",
                    "year" => "2017",
                ], [
                        "name" => "Mad Max: Fury road",
                    "director" => "George Miller",
                    "year" => "2015",
                ], [
                        "name" => "Avatar",
                    "director" => "James Cameron",
                    "year" => "2009",
                ], [
                        "name" => "2001: a space odyssey",
                    "director" => "Stanley Kubrick",
                    "year" => "1968",
                ]];

            $filteredFilms = array_filter($films, function($film) {
                return $film["year"] >= "2010" && $film["year"] <= "2020";
            });
            ?>
        </h1>
        <br> <p>Filtered By Director</p>
        <ul>
            <?php foreach (filterByDirector($films, "Denis Villeneuve") as $film) : ?>
                <li><?= $film['name'] ?> (<?= $film['year'] ?>) - By <?= $film['director'] ?></li>
            <?php endforeach; ?>
        </ul>
        <br> <p>Filtered By Year</p>
        <ul>
            <?php foreach (filteredByYear($films, "2000") as $film) : ?>
                <li><?= $film['name'] ?> (<?= $film['year'] ?>) - By <?= $film['director'] ?></li>
            <?php endforeach; ?>
        </ul>
        <br> <p>Filtered By Films</p>
        <ul>
            <?php foreach ($filteredFilms as $film) : ?>
                <li><?= $film['name'] ?> (<?= $film['year'] ?>) - By <?= $film['director'] ?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
