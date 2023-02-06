<?php

echo json_encode([
  'succes'  => $success ?? 'null',
  'alert'   => [
    'error'   =>  esc($alert['error'] ?? 'null'),
    'name'    =>  esc($alert['name'] ?? 'null'),
    'email'   =>  esc($alert['email'] ?? 'null'),
    'message'   =>  esc($alert['message'] ?? 'null'),
  ],
  'name'  =>  esc($data['name'] ?? 'null', 'attr'),
  'email' =>  esc($data['email'] ?? 'null', 'attr'),
  'message' =>  esc($data['message'] ?? 'null', 'attr'),
]);
