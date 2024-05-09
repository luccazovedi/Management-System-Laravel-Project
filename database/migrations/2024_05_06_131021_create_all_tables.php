<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key', 191 )->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key', 191)->primary();
            $table->string('owner');
            $table->integer('expiration');
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 191)->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue');
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id', 191)->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids', 191);
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id', 191)->primary();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent');
            $table->longText('payload');
            $table->unsignedInteger('last_activity');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 191)->primary();
            $table->string('token', 191);
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('prisioners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('lastname', 100)->nullable();
            $table->string('document', 20)->nullable();
            $table->integer('age')->nullable();
            $table->enum('gender', ['Masculino', 'Feminino', 'Outro'])->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('number', 20)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('cell', 20)->nullable();
            $table->string('crime', 255)->nullable();
            $table->string('observation', 255)->nullable();
            $table->date('date_entry')->nullable();
            $table->date('date_out')->nullable();
            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('document', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 20)->nullable();
            $table->integer('age')->nullable();
            $table->enum('gender', ['Masculino', 'Feminino', 'Outro'])->nullable();
            $table->string('zipcode', 10)->nullable();
            $table->string('address')->nullable();
            $table->string('number', 10)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->enum('role', ['Zelador', 'Cozinheiro', 'Motorista','Outro'])->nullable();
            $table->string('other', 100)->nullable();
            $table->date('date_admission')->nullable();
            $table->integer('salary')->nullable();
            $table->timestamps();
        });        

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('document', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('access_level', ['admin', 'visitor_management', 'prisioner_management']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('lastname', 100)->nullable();
            $table->string('document', 20)->nullable();
            $table->integer('age')->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->enum('gender', ['Masculino', 'Feminino', 'Outro'])->nullable();
            $table->date('visit_date')->nullable();
            $table->time('visit_time')->nullable();
            $table->unsignedBigInteger('prisioner_id')->nullable();
            $table->timestamps();

            $table->foreign('prisioner_id')->references('id')->on('prisioners')->onDelete('cascade');
        });

        User::create([
            'name' => 'Admin',
            'lastname' => 'Admin',
            'document' => '000.000.000-00',
            'phone' => '(00) 00000-0000',
            'email' => 'admin@email',
            'password' => bcrypt('senha123'),
            'access_level' => 'admin',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('prisioners');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('migrations');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('cache');
    }
}