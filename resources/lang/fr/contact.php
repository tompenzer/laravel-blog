<?php

return [
  'form' => [
    'title' => "Envoyer un message a :author",
    'author' => 'l\'auteur',
    'sent' => "Merçi de nous avoir contacté. Votre corrèspondance a été envoyée.",
    'misconfigured' => 'Nous sommes incapable de recevoir des messages à présent. Si vous voulez ressayer plus tard, ça risque d\'être réparé d\'içi la.',
    'invalid_recipient' => 'Le(la) destinataire spéçifié(e) est incapable de receivoir des messages.',
    'failed' => 'Nous n\'avons pas pu envoyer le message au destinataire spécifié. Si vous voulez ressayer plus tard, ça risque d\'être réparé d\'içi la.',
    'email' => 'Votre adresse email',
    'recipient' => 'Le destinataire désiré',
    'message' => 'Le message que vous voulez envoyer'
  ],
  'email' => [
    'subject' => 'Soumission de Forme Contacte - ' . env('APP_NAME'),
    'welcome' => 'Vous avez reçu une soumission de la forme de contacte du site ' . env('APP_NAME'),
    'description' => 'Voiçi les données soumises',
    'from' => 'Envoyeur',
    'message' => 'Message'
  ]
];
