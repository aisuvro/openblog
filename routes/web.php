<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;

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
    $blogs = Blog::orderBy('id','desc')->paginate(5);

    return view('blog-list', compact('blogs'));
});

Route::get('/blog/{slug}', function ($slug) {
    $blog = Blog::where('slug',$slug)->firstOrFail();
    return view('blog-details', compact('blog'));
})->name('blog.details');
