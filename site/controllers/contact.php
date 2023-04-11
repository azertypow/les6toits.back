<?php
return function($kirby, $pages, $page) {

    $alert = null;

    if($kirby->request()->is('POST')) {

        $data = [
            'firstname' => get('firstname'),
            'name'      => get('name'),
            'email'     => get('email'),
            'message'   => get('message'),
        ];

        $rules = [
            'firstname' => ['required', 'minLength' => 3],
            'name'      => ['required', 'minLength' => 3],
            'email'     => ['required', 'email'],
//            'message'   => ['required', 'minLength' => 0, 'maxLength' => 3000],
        ];

        $messages = [
            'firstname'  => 'Entrez un prénom valide',
            'name'       => 'Entrez un nom valide',
            'email'      => 'Entrez une adresse mail valide',
//            'message'    => 'Please enter a text between 0 and 3000 characters'
        ];

        // some of the data is invalid
        if($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;

            // the data is fine, let's send the email
        } else {
            try {
                $firstname  = esc($data['firstname']);
                $name       = esc($data['name']);
                $message    = esc($data['message']);

                $kirby->email([
                    'from'     => 'contact@les6toits.ch',
                    'to'       => [
                        'azertypow@icloud.com',
                        'contact+siteweb@les6toits.ch',
                    ],
                    'body'     =>
                        "Nouvelle prise de contacte de $name:"
                        ."\n\nNOM\n$name"
                        ."\n\nPRÉNOM\n$firstname"
                        ."\n\nMESSAGE\n$message"
                    ,
                    'replyTo'  => $data['email'],
                    'subject'  => 'contact les6toits.ch | ' . esc($data['name']) . " vous a envoyé un message depuis l'application web les6toits.ch",
                ]);

            } catch (Exception $error) {
                if(option('debug')):
                    $alert['error'] = 'The form could not be sent: <strong>' . $error->getMessage() . '</strong>';
                else:
                    $alert['error'] = 'The form could not be sent!';
                endif;
            }

            // no exception occurred, let's send a success message
            if (empty($alert) === true) {
                $success = 'Votre message a bien été envoyé. Nous revenons vers vous au plus vite.';
                $data = [];
            }
        }
    }

    return [
        'alert'   => $alert,
        'data'    => $data ?? false,
        'success' => $success ?? false,
    ];
};
