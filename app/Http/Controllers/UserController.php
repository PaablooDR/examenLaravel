<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    // Return the view of the login
    public function index()
    {
        return view('login');
    }

    // Validate the login's data
    public function login(Request $request) {
        // Comprobamos que el nick y la contraseña han sido introducidos
	    $request->validate([
	        'nick' => 'required',
	        'password' => 'required',
	    ]);
	
	    // Almacenamos las credenciales de email y contraseña
	    $credentials = $request->only('nick', 'password');
	
	    // Si el usuario existe lo logamos y lo llevamos a la vista de "logados" con un mensaje
        if(Auth::attempt(($credentials))) {
            return redirect()->route('user.home')->withSuccess('Logged in successfully');
        }
	
	    // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
	    return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dni' => 'required|string|max:9',
            'address' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'sex' => 'required|boolean',
        ]);

        try {
            $userExist = User::where('dni', $validatedData['dni'])->first();
            if($userExist) {
                return redirect()->back()->with('Already registered');
            } else {
                $validatedData['password'] = bcrypt($validatedData['password']);
                $user = User::create($validatedData);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('user.index')->with('success', 'Inscription successfully created!');
    }

    public function logout(Request $request) {
		Auth::logout();
		$request->session()->invalidate();
        $request->session()->regenerateToken();

		return redirect()->route('user.index')->withSuccess('Logged out successfully');
	}

}
