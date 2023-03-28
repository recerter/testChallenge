<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function index()
    {
        return view('information');
    }
    
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
    
        if (Hash::check($request->current_password, $user->password)) {
            if($request->new_password == $request->new_password_r){
                $user->password = Hash::make($request->new_password);
                $user->save();
            }else{
                return redirect()->back()->withErrors(['current_password' => 'La contraseña nueva no coinciden.']);
            }
            
            return redirect()->back()->with('successPassword', 'Contraseña actualizada exitosamente.');
        }
    
        return redirect()->back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
    }
    public function updateName(Request $request)
    {
        $user = Auth::user();
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
        ]);

        $user->name = $validatedData['name'];
        $user->lastname = $validatedData['lastname'];
        $user->save();

        return redirect()->back()->with('successName', 'Información personal actualizada exitosamente.');
    }
    
    public function updatePhoto(Request $request)
    {
        // Validamos los datos de la petición
        $validatedData = $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Obtenemos el usuario actualmente autenticado
        $user = Auth::user();

        // Guardamos la imagen de perfil en la carpeta de almacenamiento
        $image = $request->file('profile_picture');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images/profile', $imageName);

        // Actualizamos el campo de imagen de perfil en la base de datos
        $user->photo = 'storage/images/profile/'.$imageName;
        $user->save();

        // Redireccionamos al usuario a su perfil con un mensaje de éxito
        return redirect()->back()->with('success', 'La imagen de perfil se ha actualizado correctamente.');
    }
}
