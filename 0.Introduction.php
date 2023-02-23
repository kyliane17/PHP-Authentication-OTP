<?php

// Inclusion des dépendances
require_once dirname(__FILE__).'/vendor/autoload.php';
use OTPHP\TOTP;

/***********************
 * Génération d'un secret
***********************/
$otp = TOTP::create();

// Génération à la volée
$secret = $otp->getSecret();

// ou utilisation d'un secret déjà généré par nos soins (pour les tests)
$secret = "XVEZ4O2QCL2FYNIAJCIUNDJAKTAWL45S6SCXKJJEBGZNFN7BB4XFOKA3LNX4U3ERMSLSK4AUMKRVWU3YTYXMBK3WFDQQHPVT745CGMA";

echo "The OTP secret is: {$secret}\n";



/***********************
 * Création du TOTP avec des informations précises
 ***********************/
$otp = TOTP::create(
    $secret,                   // secret utilisé (généré plus haut)
    30,                 // période de validité
    'sha256',           // Algorithme utilisé
    6                   // 6 digits
);
$otp->setLabel('BTS SIO SLAM'); // The label
$otp->setIssuer('Lycée Fenelon');
$otp->setParameter('image', 'https://avatars.githubusercontent.com/u/1199051?v=4'); // FreeOTP can display image
echo "The current OTP is: {$otp->now()}\n";

/***********************
 * Affichage du temps pour information
 ***********************/
// Définition de la zone de temps
date_default_timezone_set('Europe/Paris');
$maintenant = time() ;

// Affichage de maintenant
echo date('Y-m-d H:i:s',$maintenant);