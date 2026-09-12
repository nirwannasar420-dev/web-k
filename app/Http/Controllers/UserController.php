<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Pastikan hanya Admin yang bisa mengakses User Management.
     */
    private function checkAdmin(): void
    {
        abort_unless(
            Auth::check() &&
            Auth::user()->role === 'admin',
            403
        );
    }


    /**
     * Menampilkan daftar user.
     */
    public function index()
    {
        $this->checkAdmin();

        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }


    /**
     * Menampilkan form tambah user.
     */
    public function create()
    {
        $this->checkAdmin();

        return view('users.create');
    }


    /**
     * Menyimpan user baru.
     */
    public function store(Request $request)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'role' => [
                'required',
                'in:admin,sales',
            ],
        ]);


        User::create([
            'name' => $validated['name'],

            'email' => $validated['email'],

            'password' => Hash::make(
                $validated['password']
            ),

            'role' => $validated['role'],
        ]);


        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User berhasil ditambahkan.'
            );
    }


    /**
     * Menampilkan detail user.
     */
    public function show(User $user)
    {
        $this->checkAdmin();

        return view(
            'users.show',
            compact('user')
        );
    }


    /**
     * Menampilkan form edit user.
     */
    public function edit(User $user)
    {
        $this->checkAdmin();

        return view(
            'users.edit',
            compact('user')
        );
    }


    /**
     * Memperbarui user.
     */
    public function update(
        Request $request,
        User $user
    ) {
        $this->checkAdmin();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],

            'role' => [
                'required',
                'in:admin,sales',
            ],
        ]);


        $user->name = $validated['name'];

        $user->email = $validated['email'];

        $user->role = $validated['role'];


        if (
            !empty($validated['password'])
        ) {
            $user->password = Hash::make(
                $validated['password']
            );
        }


        $user->save();


        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User berhasil diperbarui.'
            );
    }


    /**
     * Menghapus user.
     */
    public function destroy(User $user)
    {
        $this->checkAdmin();


        /*
         * Admin tidak boleh menghapus akun
         * yang sedang digunakan.
         */
        if ($user->id === Auth::id()) {

            return redirect()
                ->route('users.index')
                ->with(
                    'error',
                    'Akun yang sedang digunakan tidak dapat dihapus.'
                );
        }


        $user->delete();


        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User berhasil dihapus.'
            );
    }
}