<?php
header("Access-Control-Allow-Origin: *");

require_once ('./global/imageResponce.php');

/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */

echo json_encode([
  'events' => array_values($page->children()->listed()->map(fn($listedPage) => [
    'dates'         => $listedPage->content()->dates()->toStructure()->map(fn($date) => [
      'jours'           => $date->date()->value(),
      'hours'           => array_map(fn($hour) => $hour['heure'],$date->heures()->value())
    ])->data(),

    'tags'          => $listedPage->content()->tags()->value(),
    'imageCoverURL' => imageApiResponse( $listedPage->imageCoverURL()->toFile() ),
    'title'         => $listedPage -> title()->value(),
    'subtitle'      => $listedPage -> subtitle() -> value(),
    'linkCoverURL'  => $listedPage -> linkCoverURL() -> value(),
    'textContent'   => $listedPage -> textContent()->value(),
    'credit'        => $listedPage -> credit()->value(),
    'location'      => $listedPage -> location()->value(),

  ])->data()),

  'archives' => array_values($page->children()->unlisted()->map(fn($listedPage) => [
    'dates'         => $listedPage->content()->dates()->toStructure()->map(fn($date) => [
      'jours'           => $date->date()->value(),
      'hours'           => array_map(fn($hour) => $hour['heure'],$date->heures()->value())
    ])->data(),

    'tags'          => $listedPage->content()->tags()->value(),
    'imageCoverURL' => imageApiResponse( $listedPage->imageCoverURL()->toFile() ),
    'title'         => $listedPage -> title()->value(),
    'subtitle'      => $listedPage -> subtitle() -> value(),
    'linkCoverURL'  => $listedPage -> linkCoverURL() -> value(),
    'textContent'   => $listedPage -> textContent()->value(),
    'credit'        => $listedPage -> credit()->value(),
    'location'      => $listedPage -> location()->value(),

  ])->data()),
]);
