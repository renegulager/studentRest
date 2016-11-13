<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssociatPapersWithStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('papers', function (Blueprint $table) {
            $table->integer('student_id')->after('id')->unsigned();
            $table->index('student_id');

        $table
          ->foreign('student_id')
          ->references('id')
          ->on('students')
          ->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('papers', function (Blueprint $table) {
          // Drop the foreign key first
          $table->dropForeign('papers_student_id_foreign');
          // Now drop the basic index
          $table->dropIndex('papers_student_id_index');
          // Lastly, now it's safe to drop the column
          $table->dropColumn('student_id');
        });
    }
}
