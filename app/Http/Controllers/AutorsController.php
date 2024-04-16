<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use App\Http\Resources\Autors;
use APP\Http\Requests\AuthorsRequest;
use Illuminate\Http\Client\Request;
class AutorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Autors::collection(Autor::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAutorRequest $request)
    {   
        $faker = \Faker\Factory::create(1);
        $author = Autor::create([
            'name' => $faker->name
        ]);
        return new Autors( $author);
    }

    /**
     * Display the specified resource.
     */
    public function show(Autor $autor)
    {
        
    return new Autors($autor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autor $autor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAutorRequest $request, Autor $autor)
    {
        $autor->update([
            'name' => $request->input('name')
        ]);
        return new Autors($autor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return response(null,204);
    }
}
