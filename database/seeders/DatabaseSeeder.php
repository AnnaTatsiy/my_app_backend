<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\coach;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('days')->insert([
            ['title'=>"ПН"],
            ['title'=>"ВТ"],
            ['title'=>"СР"],
            ['title'=>"ЧТ"],
            ['title'=>"ПТ"],
            ['title'=>"СБ"],
            ['title'=>"ВС"]
        ]);

        DB::table('workout_types')->insert([
            ['title'=>"Аэробика"],
            ['title'=>"Кикбоксинг"],
            ['title'=>"Тай-бо"],
            ['title'=>"Кангу Джампс"],
            ['title'=>"Body Sculpt"],
            ['title'=>"Йога"],
            ['title'=>"Body Pump"],
            ['title'=>"Круговой тренинг"],
            ['title'=>"Тренировка с петлями"],
            ['title'=>"Кроссфит"],
            ['title'=>"Пилатес"],
            ['title'=>"Зумба"],
            ['title'=>"Стретчинг"],
            ['title'=>"Бодифлекс"]
        ]);

        DB::table('subscription_types')->insert([
            ['title'=>'Простой', 'spa'=>false, 'pool'=>false, 'group'=>false],
            ['title'=>'Простой+', 'spa'=>false, 'pool'=>false, 'group'=>true],
            ['title'=>'Умный', 'spa'=>false, 'pool'=>true, 'group'=>true],
            ['title'=>'Все включено', 'spa'=>true, 'pool'=>true, 'group'=>true]
        ]);

        Coach::factory(20)->create();
        Customer::factory(100)->create();


    }
}
