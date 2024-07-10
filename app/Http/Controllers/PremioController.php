<?php
namespace App\Http\Controllers;

use App\Models\Premio;
use App\Http\Requests\StorePremioRequest;
use App\Http\Requests\UpdatePremioRequest;
use App\Http\Resources\PremioResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PremioController extends Controller
{
    public function index()
    {
        return PremioResource::collection(Premio::all());
    }

    public function premiosActivos()
    {
        $premios = Premio::where('estado', true)->get();
        foreach ($premios as $premio) {
            $premio->imagen_url = asset('storage/' . $premio->imagen_url);
        }
        return PremioResource::collection($premios);
    }
    
  

    public function store(StorePremioRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('imagen_url')) {
            $path = $request->file('imagen_url')->store('premios', 'public');
            $validatedData['imagen_url'] = $path;
        }

        $premio = Premio::create($validatedData);
        return new PremioResource($premio);
    }

    public function show(Premio $premio)
    {
        $premio->imagen_url = asset('storage/' . $premio->imagen_url);
        return new PremioResource($premio);
    }
    

    public function update(UpdatePremioRequest $request, Premio $premio)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('imagen_url')) {
            // Eliminar la imagen anterior
            if ($premio->imagen_url) {
                Storage::disk('public')->delete($premio->imagen_url);
            }
            $path = $request->file('imagen_url')->store('premios', 'public');
            $validatedData['imagen_url'] = $path;
        } else {
            $validatedData['imagen_url'] = $premio->imagen_url;
        }

        $premio->update($validatedData);
        return new PremioResource($premio);
    }

    public function destroy(Premio $premio)
    {
        // Eliminar la imagen asociada
        if ($premio->imagen_url) {
            Storage::disk('public')->delete($premio->imagen_url);
        }
        $premio->delete();
        return response()->json(null, 204);
    }

    public function desactivar($id)
    {
        $premio = Premio::findOrFail($id);
        $premio->estado = false;
        $premio->save();
        return new PremioResource($premio); 
    }
}
