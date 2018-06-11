<?php

return [
  'form' => [
    'title' => "Send a message to :author",
    'author' => 'the author',
    'sent' => "Thanks for contacting us. Your message has been received.",
    'misconfigured' => 'Either the specified user is currently unable to receive messages, or messaging is currently unavailable.',
    'failed' => 'The message was unable to be sent to the recipient. Please try again later; maybe it\'ll be fixed by then.',
    'email' => 'Your email address',
    'recipient' => 'The desired recipient',
    'message' => 'The message you would like to send'
  ],
  'email' => [
    'subject' => 'Contact Form Submission - ' . env('APP_NAME'),
    'welcome' => 'You have received a contact form submission on the site ' . env('APP_NAME'),
    'description' => 'The entered info was as follows',
    'from' => 'Sender',
    'message' => 'Message'
  ]
];
