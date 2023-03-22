<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Image;

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
            $user->password = Hash::make($request->new_password);
            $user->save();
    
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

}
