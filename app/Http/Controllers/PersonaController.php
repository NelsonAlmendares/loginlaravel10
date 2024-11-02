<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    // Muestra la lista de personas
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    // Muestra el formulario para crear una nueva persona
    public function create()
    {
        return view('personas.register');
    }

    // Almacena una nueva persona en la base de datos
    public function store (Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'edad' => 'required|integer',
            'email' => 'required|email|max:100',
        ]);

        Persona::create([
            'Nombre' => $request->nombre,
            'Edad' => $request->edad,
            'Email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Persona registrada con éxito!');
    }


    // Muestra una persona específica
    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.show', compact('persona'));
    }

    // Muestra el formulario para editar una persona
    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.edit', compact('persona'));
    }

    // Actualiza una persona existente en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer',
            'direccion' => 'nullable|string',
        ]);

        $persona = Persona::findOrFail($id);
        $persona->update([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
        ]);

        return redirect()->route('personas.index')->with('success', 'Persona actualizada con éxito!');
    }

    // Elimina una persona de la base de datos
    public function destroy($id)
    {
        Persona::findOrFail($id)->delete();
        return redirect()->route('personas.index')->with('success', 'Persona eliminada con éxito!');
    }
}
