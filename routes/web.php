<?php

use App\Http\Livewire\Expense\ExpenseCreate;
use App\Http\Livewire\Expense\ExpenseEdit;
use App\Http\Livewire\Expense\ExpenseList;
use Illuminate\Support\Facades\Route;
use App\Models\Expense;
use \Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\File;
use \App\Http\Livewire\Plan\PlanList;
use \App\Http\Livewire\Plan\PlanCreate;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum','verified'])->group(function () {

    Route::prefix('expenses')->name('expenses.')->group(function(){

        Route::get('/', ExpenseList::class)->name('index');
        Route::get('/create', ExpenseCreate::class)->name('create');
        Route::get('/edit/{expense}', ExpenseEdit::class)->name('edit');

        Route::get('/{expense}/photo', function ($expense) {
            $expense = auth()->user()->expenses()->findOrFail($expense);

            //Pegar a imagem
            //$image nesse momento está como tex/html assim imprimi caracteres... não é o que quero
            if(!Storage::disk('public')->exists($expense->photo))
                return abort(404,'Image not found!');

            $image = Storage::disk('public')->get($expense->photo);
            //mimeType é o tipo da imagem(png, jpg...)
            $mimeType = File::mimeType(storage_path('app/public/'.$expense->photo));
            //Retornar imagem como imagem...
            //dd($expense->photo);
            return response($image)->header('Content-Type',$mimeType);
        })->name('photo');
    });

    Route::prefix('plans')->name('plans.')->group(function(){
        Route::get('/',PlanList::class)->name('index');
        Route::get('/create',PlanCreate::class)->name('create');
    });
});

Route::get('subscription',\App\Http\Livewire\Payment\CreditCard::class)->name('plan.subscription');
