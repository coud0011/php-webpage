<?php

declare(strict_types=1);
require_once('../autoload.php');
const INDICE_MAX = 10;
$webpage = new WebPage();
$webpage->setTitle('Table de Pythagore');

$webpage->appendCSS(
    <<<CSS
    table#pythagore {
          border-spacing : 0;
          border-collapse: collapse;
        }
    table#pythagore td, table#pythagore th {
          width: 1.5em;
          height: 1.5em;
          text-align: right;
          padding: 0.2em;
          border: solid 1px grey;
        }
CSS
);
$webpage->appendContent(
    <<<HTML
    <h1>Table de Pythagore</h1>
        <table id='pythagore'>
          <tr><th>&times;
HTML);

// Première ligne
for ($colonne = 0; $colonne <= INDICE_MAX; $colonne++) {
    $webpage->appendContent( <<<HTML
    <th>$colonne 
HTML);}
// Les lignes de multiplication
for ($ligne = 0; $ligne <= INDICE_MAX; $ligne++) {
    $webpage->appendContent(<<<HTML
    \n          <tr><th>$ligne
HTML
    );
    // Les colonnes de multiplication
    for ($colonne = 0; $colonne <= INDICE_MAX; $colonne++) {
        $resultat=$ligne * $colonne;
        $webpage->appendContent(<<<HTML
    <td>$resultat
HTML
        );
    }
}
$webpage->appendContent( <<<HTML
    \n        </table>\n
HTML);



echo $webpage->toHTML();
