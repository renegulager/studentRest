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

    DB::table('students')->insert([
    'name' => 'Jack øæålmedû',
    'email' => 'strange.but.valid@hotmail.com',
    'phonenumber' => '+452255-5548',
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),
    ]);

    DB::table('students')->insert([
    'name' => 'Jill daa ØsterGårdé',
    'email' => 'valid@gmail.com',
    'phonenumber' => '004522552222',
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),
    ]);

    }
}
