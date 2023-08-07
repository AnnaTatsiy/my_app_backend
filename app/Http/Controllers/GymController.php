<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\JsonResponse;

class GymController extends Controller
{
    // вывод всех спортзалов
    public function getAllGyms() : JsonResponse{
        return response()->json(Gym::all());
    }
}
