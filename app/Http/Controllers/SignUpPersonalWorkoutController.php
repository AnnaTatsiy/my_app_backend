<?php

namespace App\Http\Controllers;

use App\Models\SignUpPersonalWorkout;
use Illuminate\Http\JsonResponse;

class SignUpPersonalWorkoutController extends Controller
{
    // получить все записи на персональные тренировки
    public function signUpPersonalWorkouts(): JsonResponse{
        return response()->json(SignUpPersonalWorkout::with('customer', 'coach')->orderByDesc('date_begin')->orderByDesc('time_begin')->paginate(14));
    }
}
