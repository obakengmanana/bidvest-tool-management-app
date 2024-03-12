<?php

use App\Http\Controllers\ToolController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Tool;
use App\Models\Category;

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


// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/toolspage', [ToolController::class, 'index'])->name('toolspage');

// Tools
Route::get('tools', [ToolController::class, 'index'])
    ->name('tools');

Route::get('tool/create', [ToolController::class, 'create'])
    ->name('tool.create');

Route::post('tool', [ToolController::class, 'store'])
    ->name('tool.store');

Route::get('tool/{tool}/edit', [ToolController::class, 'edit'])
    ->name('tool.edit');

Route::put('tool/{tool}', [ToolController::class, 'update'])
    ->name('tool.update');

Route::delete('tool/{tool}', [ToolController::class, 'destroy'])
    ->name('tool.destroy');

Route::put('tool/{tool}/restore', [ToolController::class, 'restore'])
    ->name('tool.restore');



// return all tools or tools with specific category ID
Route::get('/tools/{category?}', function ($category = null) {
    if ($category) {
        // Retrieve tools with the specified category_id
        $tools = Tool::where('category_id', $category)->get();
    } else {
        // If no category is provided, retrieve all tools
        $tools = Tool::all();
    }

    return $tools;
});



