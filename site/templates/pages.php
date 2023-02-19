<?php
header("Access-Control-Allow-Origin: *");

require_once ('./global/imageResponce.php');

/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */

echo json_encode( $page->children()->map(function ($value) {

  $pageData = [
    'title' => $value->title()->value()
  ];

  return array_merge(
    $pageData,
    ['content' => $value->contentstructure()->toStructure()->map( function ($structureValue) {

      return [
        'text' => $structureValue->text()->value(),
        'image' => $structureValue->image()->toFiles() ? imageApiResponse( $structureValue->image()->toFile() ) : null,
        'allFiles' => $structureValue->image()->toFiles()->toArray(),
      ];
    }) -> data()]
  );
})->data());
