    <?php
    class AlbumesModel {
        private $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=tpeweb2musica;charset=utf8', 'root', '');
        }

        /**
         * Obtiene y devuelve de la base de datos todos los albumes.
         */
        function getAlbum() {
            $query = $this->db->prepare('SELECT albumes.*, artistas.`Nombre del Artista` AS nombreArtista FROM albumes
                LEFT JOIN artistas ON albumes.artistaID = artistas.ID');
            $query->execute();
        
            $albumes = $query->fetchAll(PDO::FETCH_OBJ);
        
            return $albumes;
        }
        

        /**
         * Inserta el album en la base de datos
         */
        function insertAlbum($tituloAlbum, $anioLanzamiento, $artistaID) {
            $query = $this->db->prepare('INSERT INTO albumes (Título del Álbum , Año de Lanzamiento, Artista ID) VALUES(?,?,?)');
            $query->execute([$tituloAlbum, $anioLanzamiento, $artistaID]);

            return $this->db->lastInsertId();
        }

        
    function deleteAlbum($id) {
        $query = $this->db->prepare('DELETE FROM albumes WHERE id = ?');
        $query->execute([$id]);
    }

    function updateAlbum($id) {    
        $query = $this->db->prepare('UPDATE albumes SET albumes = 1 WHERE id = ?');
        $query->execute([$id]);
    }
    }