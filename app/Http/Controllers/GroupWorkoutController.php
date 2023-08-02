<?php

namespace App\Http\Controllers;

use App\Models\GroupWorkout;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroupWorkoutController extends Controller
{
    //добавдение групповых тренировок происходит из расписания занятий
    public function preparation() : void{

        //признак первого запуска
        $first = GroupWorkout::all()->count();

        //находим мах дату - если запуск не первый
        if(!$first) $max_date = GroupWorkout::all()->max('event');

        //проверка нужно ли обновлять таблицу групповые тренеровки
        //если первый запуск (max даты нет заполняем на 2 нед)
        if($first) $count = 14;

        //вычисляем кол-во дней которые нужно добавить
        
        //если от текущей даты до max даты в таблице должно пройти меньше 2 недель - добавляем записи

        //цикл по кол-ву дней
            //
                //узнаем день недели текущей даты - если первый запуск
                //                   след дата после макс даты - если не первый запуск

                //вытаскиваем все расписание за день недели

                    //если на этот день недели есть расписание то заходим в цикл
                        //цикл по расписанию за день недели
                             //
                                //добавление записи в таблицу
                            //
                    //

                //шагаем на следующую дату
            //
    }

    // получить все записи (вывод всех групповых тренировок)
    public function getGroupWorkouts(): JsonResponse{
        return response()->json(GroupWorkout::with( 'schedule.gym','schedule.workout_type', 'schedule.coach','schedule.day')->orderByDesc('event')->get());
    }

    // получить все записи (вывод всех групповых тренировок) постранично
    public function groupWorkouts(): JsonResponse{
        return response()->json(GroupWorkout::with( 'schedule.gym','schedule.workout_type', 'schedule.coach','schedule.day')->orderByDesc('event')->paginate(12));
    }

    //получить всю информацию о групповой тренировки по id
    public function groupWorkoutById($id): JsonResponse {
        return response()->json(GroupWorkout::with( 'schedule.gym','schedule.workout_type', 'schedule.coach','schedule.day')->where('id',$id)->first());
    }
}
