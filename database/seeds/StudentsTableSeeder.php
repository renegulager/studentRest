<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StudentsTableSeeder extends Seeder
{
  /**
  * Seeds the student table wit students for testing
  *
  * @return void
  */
  public function run()
  {
    factory(App\Student::class, 10)->create()->each(function ($student) {
      $papersCount = rand(1, 5);

      while ($papersCount > 0) {
        $student->papers()->save(factory(App\Paper::class)->make());
        $papersCount--;
      }
    });

    }
}
