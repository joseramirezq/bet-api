<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Http\Resources\UsuarioResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        return UsuarioResource::collection(Usuario::all());
    }
    public function usuariosActivos()
    {
        $usuarios = Usuario::where('estado', true)
        ->where('rol', 'usuario')
        ->get();
        return UsuarioResource::collection($usuarios);
    }
    public function usuariosAdministradores()
    {
        $usuarios = Usuario::where('estado', true)
        ->where('rol', 'admin')
        ->get();
        return UsuarioResource::collection($usuarios);
    }

    public function store(StoreUsuarioRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password_hash'] = Hash::make($validatedData['password']);
        $validatedData['codigo'] = $validatedData['numero_documento'];
        $usuario = Usuario::create($validatedData);
        return new UsuarioResource($usuario);
    }
    public function show(Usuario $usuario)
    {
        return new UsuarioResource($usuario);
    }

    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $data = $request->validated();

        // Si se proporciona una nueva contraseña, encriptarla
        if (!empty($data['password'])) {
            $data['password_hash'] = Hash::make($data['password']);
        }
    
        // Eliminar el campo de contraseña del array si está vacío para evitar sobreescribir la contraseña existente
        unset($data['password']);
    
        $usuario->update($data);
    
        return new UsuarioResource($usuario);
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json(null, 204);
    }
    public function desactivar($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->estado = false;
        $usuario->save();
        return new UsuarioResource($usuario);
    }
}
