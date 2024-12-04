<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::beginTransaction();
        try{
            Schema::dropIfExists('blogs');
            Schema::create('blogs', function($table){
                $table->id('id');
                $table->string('code');
                $table->text('title');
                $table->text('thumbnail')->nullable();
                $table->longText('blog')->nullable();

                $table->unsignedBigInteger('user_id', false);
                $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');

                $table->softDeletes();
                $table->timestamps();
            });

            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }catch(\Throwable $e){
            DB::rollback();
            throw $e;


            
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
