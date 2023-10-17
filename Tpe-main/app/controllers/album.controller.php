<?php
require_once './app/models/album.model.php';
require_once './app/views/album.view.php';
require_once './app/helpers/auth.helper.php';

class AlbumController {
    private $view;
    private $model;

    public function __construct() {
        //AuthHelper::verify();
        $this->view = new AlbumView();
        $this->model = new AlbumesModel();
    } 

    public function showAlbum() {
        // Obtén los albumes desde el modelo
        $albumes = $this->model->getAlbum();
        // Muestra los albumes desde la vista
        $this->view->showAlbum($albumes);
    }



    public function addAlbum() {
        // Verificar si los parámetros POST requeridos existen
        if (isset($_POST['tituloAlbum'], $_POST['anioLanzamiento'], $_POST['artistaID'])) {
            // Obtener los datos de la solicitud POST
            $tituloAlbum = $_POST['tituloAlbum'];
            $anioLanzamiento = $_POST['anioLanzamiento'];
            $artistaID = $_POST['artistaID'];
    
            // Realizar validaciones adicionales si es necesario
            if (empty($tituloAlbum) || empty($anioLanzamiento)) {
                $this->view->showError("Debe completar todos los campos");
                return;
            }
    
            $id = $this->model->insertAlbum($tituloAlbum, $anioLanzamiento, $artistaID);
            if ($id) {
                header('Location: ' . BASE_URL);
            } else {
                $this->view->showError("Error al insertar la canción");
            }
        } else {
            // Manejar el caso en el que falten parámetros POST requeridos
            $this->view->showError("Faltan parámetros POST");
        }
    }


    public function removeAlbum($id) {
        $this->model->deleteAlbum($id);
        header('Location: ' . BASE_URL);
    }
    
    public function editarAlbum($id) {
        $this->model->updateAlbum($id);
        header('Location: ' . BASE_URL);
    }
}

