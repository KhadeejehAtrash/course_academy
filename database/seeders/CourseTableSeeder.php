<?php

namespace Database\Seeders;


use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Courses')->delete();
        $Courses = [
            ['en'=> 'English', 'ar'=> 'English'],
            ['en'=> 'Arabic', 'ar'=> 'Arabic'],
            ['en'=> ' French', 'ar'=> 'French'],
        ];

        foreach ($Courses as $Course) {
            Course::create(['Name' => $Course]);
        }
    }
}
