<?php

class CancionModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpeweb2musica;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getCanciones() {
        $query = $this->db->prepare('SELECT canciones.*, albumes.tituloAlbum AS tituloAlbum FROM canciones LEFT JOIN albumes ON canciones.albumID = albumes.ID');
        $query->execute();
    
        // $canciones es un arreglo de canciones
        $canciones = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $canciones;
    }
    

    /**
     * Inserta la tarea en la base de datos
     */
    function insertCanciones($titulo, $duracion, $albumID) {
        $query = $this->db->prepare('INSERT INTO canciones (titulo, Duración, albumID) VALUES(?,?,?)');
        $query->execute([$titulo, $duracion, $albumID]);

        return $this->db->lastInsertId();
    }

    
function deleteCanciones($id) {
    $query = $this->db->prepare('DELETE FROM canciones WHERE id = ?');
    $query->execute([$id]);
}

function updateCanciones($id) {    
    $query = $this->db->prepare('UPDATE canciones SET canciones = 1 WHERE id = ?');
    $query->execute([$id]);
}
}