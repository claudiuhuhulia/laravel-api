<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies =  Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technology = new Technology();

        return view('admin.technologies.create', compact('technology'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => ['required', 'string', 'max:50', 'unique:technologies'],
            'color' => 'nullable',
            'icon' => 'required|string',

        ], [
            'label.required' => 'Il nome è obbligatorio',
            'label.max' => 'Il nome deve essere lungo massimo :max caratteri',
            'label.unique' => "Esiste già una tecnologia dal nome $request->label",
            'icon.required' => "l'icona è richiesta",

        ]);
        $data = $request->all();

        $technology = new Technology();
        $technology->fill($data);
        $technology->save();
        return to_route('admin.technologies.show', compact('technology'))->with('alert-type', 'success')->with('alert-message', 'Tecnologia aggiunta con successo');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        $projects = $technology->projects;
        return view('admin.technologies.show', compact('technology', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {

        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'label' => ['required', 'string', 'max:50', 'unique:technologies'],
            'color' => 'nullable',
            'icon' => 'required|string',

        ], [
            'label.required' => 'Il nome è obbligatorio',
            'label.max' => 'Il nome deve essere lungo massimo :max caratteri',
            'label.unique' => "Esiste già una tecnologia dal nome $request->label",
            'icon.required' => "l'icona è richiesta",

        ]);
        $data = $request->all();
        $technology->update($data);

        return to_route('admin.technologiess.index', $technology)->with('alert-type', 'success')->with('alert-message', 'Tecnologia modificata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->forceDelete();
        return to_route('admin.technologies.index')->with('alert-message', "Tecnologia eliminata definitivamente")->with('alert-type', 'danger');
    }
}
