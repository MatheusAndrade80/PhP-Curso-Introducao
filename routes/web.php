<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    //n - n
    $user = User::with('roles')->find(1);
    $user->roles()->attach(2);
    //$user->roles()->detach(1);
    dd($user);

    /*
    //1 - n
    $user = User::with('posts')->find(1);
    $user->posts()->create([
        'title' => 'Eita Relação 1 pra N',
        'body' => 'Meu texto'  
    ]);
    dd($user);
    
    //1 - 1
    $user = User::with('profile')->find(2);
    $user->profile()->create([
        'type' => 'PJ',
        'document_number' => '9876545345'  
    ]);
    dd($user->profile->document_number);
   
    $post = new \App\Models\Post();
    $post->title = 'Meu primeiro post';
    $post->body = 'Texto texto';
    $post->save();    
    dd($post);

    //$post = Post::where('title', 'Meu primeiro post')->first();
    $input = [
        'title' => 'Meu primeiro post',
        'body' => 'Texto texto'
    ];

    $post = Post::find(1);
    $post->fill($input);
    $post->save(); 
    dd($post);

    $post = Post::find(1);
    $post->delete();    
    dd($post);*/

    return view('welcome');
});

Route::get('admin/usuarios', [UserController::class, 'index']);
Route::get('admin/usuarios/cadastrar', [UserController::class, 'create'])->name('users.create');
Route::post('admin/usuarios/cadastrar', [UserController::class, 'store'])->name('users.store');
Route::get('admin/usuarios/{user}', [UserController::class, 'show']);
