<?php

namespace App\Http\Controllers;

use App\Models\WorkoutType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WorkoutTypeController extends Controller
{
    public function getAllWorkoutTypes(): JsonResponse{
        return response()->json(WorkoutType::all());
    }

}
