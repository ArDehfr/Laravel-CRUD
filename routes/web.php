<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterUserController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('data-users', MasterUserController::class);

Route::put('users/{id}', function ($id) {
    $user = User::findOrFail($id);

    $data = $request->validated();

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('data-users.index')->with('success', 'User updated successfully.');
})->name('users.update');

Route::delete('users/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('data-users.index')->with('success', 'User deleted successfully.');
})->name('data-users.destroy');

