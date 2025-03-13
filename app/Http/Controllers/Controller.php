<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
abstract class Controller
{
    //
}

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'age' => 'required|integer|min:18',
        ]);

        // Agar validatsiya muvaffaqiyatli o‘tsa, ma’lumotlarni saqlash
        User::create($request->all());

        return redirect()->back()->with('success', 'Foydalanuvchi muvaffaqiyatli qo‘shildi!');
    }
}


class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return redirect()->back()->with('success', 'Foydalanuvchi muvaffaqiyatli qo‘shildi!');
    }
}

