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



//3

function saisirTexte(string $message): string
{
    return readline($message);
}


function verifierChampObligatoire(string $value, string $message): bool
{
    if (empty($value)) {
        echo $message . "\n";
        return false;
    }

    return true;
}


function rechercherCategorieParCle(array $categories, string $key, string $value): int|bool {

    foreach ($categories as $index => $categorie) {

        if ($categorie[$key] === $value) {
            return $index;
        }

    }

    return false;
}


function saisirChampObligatoireEtUnique(array $categories, string $smsSaisie, string $smsError, string $key): string {

    $valueIsValid = false;

    do {

        $value = saisirTexte($smsSaisie);

        $valueIsValid = verifierChampObligatoire($value, $smsError);

        if ($valueIsValid) {

            $index = rechercherCategorieParCle($categories, $key, $value);

            if ($index !== false) {
                echo "le $key existe deja ...\n";
                $valueIsValid = false;
            }
        }

    } while (!$valueIsValid);

    return $value;
}


function ajouterCategorie(): void
{
    global $categories;

    $code = saisirChampObligatoireEtUnique($categories, "Saisir le code : ", "Le code est obligatoire", "code");

    $nom = saisirChampObligatoireEtUnique($categories, "Saisir le nom : ", "Le nom est obligatoire", "nom");

    $categorie = [
        "code" => $code,
        "nom" => $nom,
        "produits" => []
    ];

    $categories[] = $categorie;
}

ajouterCategorie();

print_r($categories);


//4

function rechercherProduitParCle(array $categories, string $key, string $value): bool {

    foreach ($categories as $categorie) {

        foreach ($categorie["produits"] as $produit) {

            if ($produit[$key] === $value) {
                return true;
            }

        }

    }

    return false;
}

function saisirChampProduitObligatoireEtUnique(array $categories, string $smsSaisie, string $smsErreur, string $key): string {

    do {

        $value = saisirTexte($smsSaisie);

        $valueIsValid = verifierChampObligatoire($value, $smsErreur);

        if ($valueIsValid) {

            if (
                rechercherProduitParCle($categories, $key, $value)
            ) {
                echo "Le $key existe deja ...\n";
                $valueIsValid = false;
            }

        }

    } while (!$valueIsValid);

    return $value;
}

function saisirEntierPositif(string $message): int
{
    do {

        $nombre = (int) saisirTexte($message);

    } while ($nombre < 0);

    return $nombre;
}

function ajouterProduit(): void{
    global $categories;

    $code = saisirTexte("Saisir le code : ");

    $index = rechercherCategorieParCle($categories, "code", $code);

    if ($index !== false) {

        $nom = saisirChampProduitObligatoireEtUnique($categories, "Saisir le nom : ", "Le nom est obligatoire","nom");

        $reference = saisirChampProduitObligatoireEtUnique($categories,"Saisir la reference : ","La reference est obligatoire","reference");

        $prix = saisirEntierPositif("Saisir le prix : ");
        $quantite = saisirEntierPositif("Saisir la quantite : ");

        $produit = [
            "nom" => $nom,
            "reference" => $reference,
            "prix" => $prix,
            "quantite" => $quantite
        ];

        $categories[$index]["produits"][] = $produit;

    } else {

        echo "Desole, la categorie n'existe pas...";

    }
}

ajouterProduit();

print_r($categories);























































?>