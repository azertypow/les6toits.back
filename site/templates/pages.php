<?php
header("Access-Control-Allow-Origin: *");

require_once ('./global/imageResponce.php');

/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */

echo json_encode( $page->children()->map(function ($value) {

  return $value->contentstructure()->toStructure()->map( function ($structureValue) {

    return [
      'title' => $structureValue->title()->value(),
      'text' => $structureValue->text()->value(),
      'image' => $structureValue->image()->toFile() ? imageApiResponse( $structureValue->image()->toFile() ) : null,
    ];
  }) -> data();
})->data() );
