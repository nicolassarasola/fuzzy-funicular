<?php


class AlbumView {
    public function showAlbum($Albumes) {
        $count = count($Albumes);

        // mostrar el template
        require 'templates/albumes.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}