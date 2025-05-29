use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuApiController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/menus', [MenuApiController::class, 'index']);       
    Route::get('/menus/{id}', [MenuApiController::class, 'show']); 
    Route::post('/menus', [MenuApiController::class, 'store']);
    Route::put('/menus/{id}', [MenuApiController::class, 'update']);
    Route::delete('/menus/{id}', [MenuApiController::class, 'destroy']);
});