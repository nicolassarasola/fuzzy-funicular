    <?php
    require_once './app/controllers/cancion.controller.php';
    require_once './app/controllers/album.controller.php';
    require_once './app/controllers/auth.controller.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $action = 'listar'; // accion por defecto
    if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
    }

    // listar    ->         cancionController->showCanciones();
    // agregar   ->         cancionController->addCanciones();
    // eliminar/:ID  ->     cancionController->removeCanciones($id); 
    // finalizar/:ID  ->    cancionController->editarCanciones($id);
    // Album ->             albumController->showAlbum();
    // agregar   ->         albumController->addAlbum();
    // eliminar/:ID  ->     albumController->removeAlbum($id); 
    // finalizar/:ID  ->    albumController->editarAlbum($id);
    // login ->             authContoller->showLogin();
    // logout ->            authContoller->logout();
    // auth                 authContoller->auth(); // toma los datos del post y autentica al usuario

    // parsea la accion para separar accion real de parametros
    $params = explode('/', $action);

    switch ($params[0]) {
        case 'listar':
            $controller = new CancionController();
            $controller->showCanciones();
            break;
        case 'agregar':
            $controller = new CancionController();
            $controller->addCanciones();
            break;
        case 'eliminar':
            $controller = new CancionController();
            $controller->removeCanciones($params[1]);
            break;
        case 'editarCanciones':
            $controller = new CancionController();
            $controller->editarCanciones($params[1]);
            break;



            
            
        case 'album':
            $controller = new AlbumController();
            $controller->showAlbum();
            break;
        case 'agregarAlbum':
            $controller = new AlbumController();
            $controller->addAlbum();
            break;
        case 'eliminarAlbum':
            $controller = new AlbumController();
            $controller->removeAlbum($params[1]);
            break;
        case 'editarAlbum':
            $controller = new AlbumController();
            $controller->editarAlbum($params[1]);
            break;




        case 'login':
            $controller = new AuthController();
            $controller->showLogin(); 
            break;
        case 'auth':
            $controller = new AuthController();
            $controller->auth();
            break;
        case 'logout':
            $controller = new AuthController();
            $controller->logout();
            break;
        default: 
            echo "404 Page Not Found";
            break;
    }