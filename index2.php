<?php

//1
$categories = [

    0 => [
            "code" => "cat0",
            "nom" => "categorieA",
            "produits" => [
                  0 => [
                    "nom" => "produitA",
                    "reference" => "refA",
                    "prix" => 1500,
                    "quantite" => 4
                  ],
                  1 => [
                    "nom" => "produitB",
                    "reference" => "refB",
                    "prix" => 2500,
                    "quantite" => 6
                  ]
            ]
         ],

    1 => [
            "code" => "cat1",
            "nom" => "categorieB",
            "produits" => []
         ]
];

//2
function afficherCategoriesSansProduits(array $categories): void{
    foreach ($categories as  $categorie ) {
        if (empty($categorie["produits"])) {
            echo $categorie["nom"]."\n";
        }
    }
}
afficherCategoriesSansProduits($categories);
























































?>