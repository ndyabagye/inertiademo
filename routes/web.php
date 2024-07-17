<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;

//use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/', function () {
        return Inertia::render('Home', [
            'username' => Auth::user()->name
        ]);
    })->name('home');

    Route::get('/users', function () {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user),
                    ]
                ]),
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', 'App\Models\User'),
            ]
        ]);
    })->name('users');

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->name('users.create')->can('create', User::class);

    Route::post('/users/create', function () {
        $attributes = Request::validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);
        User::create($attributes);
        return redirect('/users');
    });

    Route::get('/users/edit/{id}', function ($id) {
        $user = User::findOrFail($id);
        return Inertia::render('Users/Edit', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]
        ]);
    })->name('users.edit');

    Route::put('/users/edit/{id}', function ($id) {
        $user = User::findOrFail($id);


        $attributes = Request::validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);


        $user->update($attributes);
        return redirect('/users');
    });

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    })->name('settings');
});

require __DIR__ . '/auth.php';
