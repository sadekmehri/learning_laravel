<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('name_user');
            $table->string('prenom_user');
            $table->string('email_user');
            $table->string('verify_token_user')->nullable();
            $table->string('password_user');
            $table->string('password_reset_token_user')->nullable();
            $table->enum('is_active_user', [0, 1])->default(0);
            $table->integer('id_permission')->unsigned();
            $table->integer('id_question')->nullable()->unsigned();
            $table->string('reponse_question_user')->nullable();
            $table->foreign('id_question')->references('id_question')->on('security_questions');
            $table->foreign('id_permission')->references('id_permission')->on('permissions');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_id_question_foreign');
            $table->dropForeign('users_id_permission_foreign');
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('users');
    }
}
