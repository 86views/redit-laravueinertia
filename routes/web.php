<?php


use Inertia\Inertia;
use App\Http\Controllers\Backend;
use App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [Frontend\WelcomeController::class, 'welcome'])->name('welcome');

Route::get('/r/{slug}', [Frontend\CommunityController::class, 'show'])
    ->name('frontend.communities.show');
Route::get('/r/{community_slug}/posts/{post:slug}', [Frontend\PostController::class, 'show'])
    ->name('frontend.communities.posts.show');

Route::post('/r/{community_slug}/posts/{post:slug}/comments', [Frontend\PostCommentController::class, 'store'])
    ->name('frontend.posts.comments');

Route::post('/r/{community_slug}/posts/{post:slug}/comments', [Frontend\PostCommentController::class, 'store'])
    ->name('frontend.posts.comments');





Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/communities', Backend\CommunityController::class);

    Route::resource('/communities.posts', Backend\CommunityPostController::class);
    Route::post('/posts/{post:slug}/upVote', [Backend\PostVoteController::class, 'upVote'])
        ->name('posts.upVote');
    Route::post('/posts/{post:slug}/downVote', [Backend\PostVoteController::class, 'downVote'])
        ->name('posts.downVote');     
});



require __DIR__ . '/auth.php';
