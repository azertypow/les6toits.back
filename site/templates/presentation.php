<?php
header("Access-Control-Allow-Origin: *");

require_once ('./global/imageResponce.php');

/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */

echo json_encode([
  'introContent' => $page->text()->value(),
]);
