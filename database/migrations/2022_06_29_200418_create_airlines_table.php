<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airlines', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100)->nullable(false);
            $table->string('description', 300)->nullable(true);
            $table->float('price', 15, 4)->default(0);
            $table->integer('scales')->default(0);
            $table->date('duration_at')->nullable(true);
            $table->date('duration_end')->nullable(true);
            $table->string('short_code', 5)->nullable(true);
            $table->string('long_code', 20)->nullable(true);
            $table->integer('order_record')->nullable(true);
            $table->boolean('is_active')->default(true);
            $table->uuid('created_by')->nullable(true);
            $table->uuid('updated_by')->nullable(true);
            $table->uuid('deleted_by')->nullable(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')
            ->references('id')
            ->on('users');

            $table->foreign('updated_by')
            ->references('id')
            ->on('users');

            $table->foreign('deleted_by')
            ->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airlines');
    }
}
