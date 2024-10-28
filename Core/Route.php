<?php
//Fitxer per gestionar les rutes
namespace Core;

use RuntimeException;

class Route
{
    //creem array en les rutes
    protected $routes = [];

    //creem funcio per afegir rutes a l'array
    public function register($route)
    {
        $this->routes[] = $route;
    }

    //funcio per rebre un array de rutes i assignar a la propietat routes
    public function define($route)
    {
        $this->routes = $route;
        return $this;
    }

    //funcio per redirigir la url solicitada a un controlador
    public function redirect($uri)
    {
        //partim la url
        $parts = explode('/', trim($uri,'/'));
        //indiquem ruta del controlador
        $controller = 'App\Controllers\FilmController';
        $controllerLandingPage = 'App\Controllers\landingPageController';
        $controllerVideogames = 'App\Controllers\VideoGameController';

        //Inici
        if ($uri === '/') {
            require '../App/Controllers/landingPageController.php';
            //creem nova instancia
            $controllerInstance = new $controllerLandingPage();
            return $controllerInstance->landingPage();
        }

        if ($uri === '/films') {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            return $controllerInstance->index();
        }

        if ($uri === '/videogames') {
            require '../App/Controllers/VideoGameController.php';
            //creem nova instancia
            $controllerInstance = new $controllerVideogames();
            return $controllerInstance->index();
        }

        //create
        if (isset($_SERVER['HTTP_REFERER'])) {
            $referer = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
            $refererParts = explode('/', trim($referer, '/'));

            if (end($parts) === 'create') {
                if ($refererParts[0] === 'films') {
                    require '../App/Controllers/FilmController.php';
                    $controllerInstance = new $controller();
                    return $controllerInstance->create();
                } elseif ($refererParts[0] === 'videogames') {
                    require '../App/Controllers/VideoGameController.php';
                    $controllerInstance = new $controllerVideogames();
                    return $controllerInstance->create();
                }
            }
        }

        //Utilitzant POST guardem
        if ($parts[0] === 'store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            // Comprovar el referer per determinar des de quina secció s'ha fet la sol·licitud POST
            if (isset($_SERVER['HTTP_REFERER'])) {
                // Verificar si el referer és 'films' o 'videogames'
                if ($_POST['type'] === 'films') {
                    require '../App/Controllers/FilmController.php';
                    $controllerInstance = new $controller();
                    $data = $_POST;
                    return $controllerInstance->store($data);
                } elseif ($_POST['type'] === 'videogames') {
                    require '../App/Controllers/VideoGameController.php';
                    $controllerInstance = new $controllerVideogames();
                    $data = $_POST;
                    return $controllerInstance->store($data);
                }
            }
        }

        //delete en GET  mirem que sigue delete en la id
        if (isset($_SERVER['HTTP_REFERER'])) {
            $referer = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
            $refererParts = explode('/', trim($referer, '/'));

            if($parts[0] === 'delete' && $parts[1]) {
                if ($refererParts[0] === 'films') {
                    require '../App/Controllers/FilmController.php';
                    $controllerInstance = new $controller();
                    return $controllerInstance->delete($parts[1]);
                } elseif ($refererParts[0] === 'videogames') {
                    require '../App/Controllers/VideoGameController.php';
                    $controllerInstance = new $controllerVideogames();
                    return $controllerInstance->delete($parts[1]);
                }
            }
        }


        //destroy en POST
        if ($parts[0] === 'destroy' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['id']) || !isset($_POST['type'])) {
                throw new RuntimeException('No id or type provided');
            }

            // Seleccionem el controlador en funció del tipus d'element
            $controller = null;
            if ($_POST['type'] === 'films') {
                require '../App/Controllers/FilmController.php';
                $controller = 'App\Controllers\FilmController';
            } elseif ($_POST['type'] === 'videogames') {
                require '../App/Controllers/VideoGameController.php';
                $controller = 'App\Controllers\VideoGameController';
            }

            // Creem la instància del controlador correcte i cridem a destroy
            $controllerInstance = new $controller();
            return $controllerInstance->destroy($_POST['id']);
        }


        //edit en GET
        if (isset($_SERVER['HTTP_REFERER'])) {
            $referer = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
            $refererParts = explode('/', trim($referer, '/'));

            if($parts[0] === 'edit' && $parts[1]) {
                if ($refererParts[0] === 'films') {
                    require '../App/Controllers/FilmController.php';
                    $controllerInstance = new $controller();
                    return $controllerInstance->edit($parts[1]);
                } elseif ($refererParts[0] === 'videogames') {
                    require '../App/Controllers/VideoGameController.php';
                    $controllerInstance = new $controllerVideogames();
                    return $controllerInstance->edit($parts[1]);
                }
            }
        }

        if (isset($_SERVER['HTTP_REFERER'])) {
            $referer = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
            $refererParts = explode('/', trim($referer, '/'));

            if($parts[0] === 'show' && $parts[1]) {
                if ($refererParts[0] === 'films') {
                    require '../App/Controllers/FilmController.php';
                    $controllerInstance = new $controller();
                    return $controllerInstance->show($parts[1]);
                } elseif ($refererParts[0] === 'videogames') {
                    require '../App/Controllers/VideoGameController.php';
                    $controllerInstance = new $controllerVideogames();
                    return $controllerInstance->show($parts[1]);
                }
            }
        }

        //Actualitzar en POST
        if ($parts[0] === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['type'] === 'films') {
                require '../App/Controllers/FilmController.php';
                $controllerInstance = new $controller();
                $data = $_POST;
                return $controllerInstance->update($_POST['id'], $data);
            } elseif ($_POST['type'] === 'videogames') {
                require '../App/Controllers/VideoGameController.php';
                $controllerInstance = new $controllerVideogames();
                $data = $_POST;
                return $controllerInstance->update($_POST['id'], $data);
            }
            //comprovem si pasen id
            if (!isset($_POST['id'])){
                throw new RuntimeException('No id provided');
            }
        }

        //si no es cap dels anteriors retornem la vista 404
        return require '../resources/views/errors/404.blade.php';
    }

}