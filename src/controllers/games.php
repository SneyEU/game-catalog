<?php

$games = json_decode(
    file_get_contents(__DIR__ . '/../data/games.json'),
    true
);

usort($games, fn($a, $b) => $b['rating'] <=> $a['rating']);

echo '<h1>Liste des jeux</h1>';
echo '<a href="/">← Retour accueil</a><hr>';

foreach ($games as $game) {
    echo '<div style="margin-bottom:20px;">';
    echo '<h2>' . htmlspecialchars($game['title']) . '</h2>';
    echo '<p>Plateforme : ' . $game['platform'] . '</p>';
    echo '<p>Genre : ' . $game['genre'] . '</p>';
    echo '<p>Rating : ' . $game['rating'] . '/10</p>';

    echo '<a href="/games?id=' . $game['id'] . '">';
    echo '<button>Voir le jeu</button>';
    echo '</a>';

    echo '</div><hr>';
}
