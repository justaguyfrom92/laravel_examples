<?php
// Laravel Controller Logic (UserController.php)

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function saveUsers(Request $request)
    {
        // Save the received user data to the database
        $users = $request->all();
        
        foreach ($users as $user) {
            User::create([
                'name' => $user['name']['first'] . ' ' . $user['name']['last'],
                'email' => $user['email'],
                'profile_picture' => $user['picture']['large'],
            ]);
        }

        return response()->json(['message' => 'Users saved successfully']);
    }
}
