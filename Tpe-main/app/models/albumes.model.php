<?php
class AlbumesModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpeweb2musica;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getAlbumes() {
        $query = $this->db->prepare('SELECT * FROM albumes');
        $query->execute();

        // $Albumes es un arreglo de Albumes
        $albumes = $query->fetchAll(PDO::FETCH_OBJ);

        return $albumes;
    }

    /**
     * Inserta la tarea en la base de datos
     */
    function insertAlbumes($tituloAlbum, $añoLanzamiento, $artistaID) {
        $query = $this->db->prepare('INSERT INTO albumes (Título del Álbum , Año de Lanzamiento, Artista ID) VALUES(?,?,?)');
        $query->execute([$tituloAlbum, $añoLanzamiento, $artistaID]);

        return $this->db->lastInsertId();
    }

    
function deleteAlbumes($id) {
    $query = $this->db->prepare('DELETE FROM albumes WHERE id = ?');
    $query->execute([$id]);
}

function updateAlbumes($id) {    
    $query = $this->db->prepare('UPDATE albumes SET albumes = 1 WHERE id = ?');
    $query->execute([$id]);
}
}