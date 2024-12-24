<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll()
    {

        $bands = $this->getBands();

        return response()->json(
            $bands
        );
    }

    public function getById($id)
    {
        return response()->json(
            $this->getBandById($id)
        );
    }

    public function getBandsByGenre($genre)
    {
        $bands = $this->getBands();
        $bandsByGenre = [];
        foreach ($bands as $band) {
            if ($band['genre'] == $genre) {
                $bandsByGenre[] = $band;
            }
        }
        return response()->json(
            $bandsByGenre
        );
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'id' => 'numeric',
            'name' => 'required|min:3',
            'genre' => 'required',
            'albums' => 'numeric',
            'tracks' => 'numeric'
        ]);

        return response()->json([
            'message' => 'Banda cadastrada com sucesso',
            'band' => $request->all()
        ]);

    }

    protected function getBands(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Metallica',
                'genre' => 'Heavy Metal',
                'albums' => 10,
                'tracks' => 120
            ],
            [
                'id' => 2,
                'name' => 'Iron Maiden',
                'genre' => 'Heavy Metal',
                'albums' => 15,
                'tracks' => 150
            ],
            [
                'id' => 3,
                'name' => 'AC/DC',
                'genre' => 'Rock',
                'albums' => 20,
                'tracks' => 200
            ]
        ];
    }

    private function getBandById($id): array
    {
        $bands = $this->getBands();
        foreach ($bands as $band) {
            if ($band['id'] == $id) {
                return $band;
            }
        }
        return ['a Banda id= ' . $id . ' não foi encontrada'];
    }

}
