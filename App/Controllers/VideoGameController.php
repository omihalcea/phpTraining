<?php

namespace App\Controllers;

use App\Models\Videogame;

class VideoGameController
{
    //funcio index
    public function index()
    {
        //obtenim tots els jocs
        $videogames = Videogame::getAll();

        //pasem les pelis a la vista
        return view('videogames/index', ['videogames' => $videogames]);
    }

    //funcio per anar a la vista create
    public function create()
    {
        return view('videogames/create');
    }

    //funcio per guardar les dades i tornar a la vista principal
    public function store($data)
    {
        //cridem funcio create del model
        Videogame::create($data);
        //retornar a la vista principal
        header('location: /videogames');
        exit;
    }

   //funcio per a la vista edit
    public function edit($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /videogames');
            exit;
        }

        //busquem la peli
        $videogame = Videogame::find($id);

        //si no ens passen cap peli mostrar 404
        if (!$videogame) {
            require '../../resources/views/errors/404.blade.php';
            return;
        }

        //retornem la vista i li passem la peli indicada
        return view('videogames/edit', ['videogames' => $videogame]);
    }

    public function show($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /videogames');
            exit;
        }

        //busquem la peli
        $videogame = Videogame::find($id);

        //si no ens passen cap peli mostrar 404
        if (!$videogame) {
            require '../../resources/views/errors/404.blade.php';
            return;
        }

        //retornem la vista i li passem la peli indicada
        return view('videogames/show', ['videogame' => $videogame]);
    }

    //funcio update per a modificar la peli a la base de dades
    public function update($id, $data)
    {
        //modifiquem
        Videogame::update($id, $data);

        //retonem a la pàgina principal
        header('location: /videogames');
        exit;
    }

    //funcio per anar a la vista delete
    public function delete($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /videogames');
            exit;
        }

        //busquem la peli
        $videogame = Videogame::find($id);
        //retornem la vista en la peli
        return view('videogames/delete', ['videogame' => $videogame]);

    }

    //funcio per eliminar la peli de la base de dades
    public function destroy($id)
    {

        //utilizem la funcio delete del model
        Videogame::delete($id);

        //retornar a la vista
        header('location: /videogames');
    }


}