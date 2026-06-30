<?php

// 1
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

foreach ($categories as  $categorie ) {
        if (empty($categorie["produits"])) {
            echo $categorie["nom"]."\n";
        }
}

//3

$codeIsValid = true;
    
do { 
        
        $code = readline("saisir le code :");
        if (empty($code)) {
            echo "le code est obligatoire \n";
             $codeIsValid = false;
        }else{
            foreach ($categories as  $categorie ) {
               if (($categorie["code"]) === $code) {
                    $codeIsValid = false;
                    echo "le code existe deja ...\n"; 
                }
            }  
        }
} while (!$codeIsValid);
    

$nomIsValid = true;

do { 
        
        $nom = readline("saisir le nom : ");
        if (empty($nom)) {
            echo "le nom est obligatoire";
             $nomIsValid= false;
        }else{
            foreach ($categories as  $categorie ) {
                if (($categorie["nom"]) === $nom) {
                    $nomIsValid = false;
                    echo "le nom existe deja ..."; 
                }
            }  
        }
} while (!$nomIsValid);



$categorie  =   [
            "code" => $code,
            "nom" => $nom,
            "produits" => []
        ];

$categories[] = $categorie;




















?>