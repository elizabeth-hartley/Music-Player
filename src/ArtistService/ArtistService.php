<?php

namespace CodersCanine\ArtistService;

use CodersCanine\AlbumService\AlbumService;
use CodersCanine\ArtistHydrator\ArtistHydrator;
use CodersCanine\SongService\SongService;

class ArtistService
{
 public function createArtistProfile(AlbumService $albumService, SongService $songService): array
 {
     $artistArray = [];
     $artistProfileArray = [];
     $artists = ArtistHydrator::getArtists();
     foreach ($artists as $artist) {
       $artistAlbums = $albumService->createAlbumProfile($artist->getId(), $songService);
       $artistProfileArray[] = ['name' => $artist->getName(), 'albums' => $artistAlbums];
       $artistArray = ['artists' => $artistProfileArray];
     }
     return $artistArray;
 }
}