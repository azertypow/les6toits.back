<?php

/** @var Page $page*/

use Kirby\Cms\{File, Page};

function imageApiResponse(File $image): array {
    try {
        return [
            "originalUrl"   => $image->url(),
            "largeUrl"      => $image->resize(2400)->url(),
            "mediumUrl"     => $image->resize(1280)->url(),
            "smallUrl"      => $image->resize(150)->url(),
        ];
    } catch (\Kirby\Exception\InvalidArgumentException $e) {
        return [];
    }
}
