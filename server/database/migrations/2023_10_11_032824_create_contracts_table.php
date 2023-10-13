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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('idContract');
            $table->string('result');
            $table->boolean('passed');
            $table->string('nip')->unsigned()->nullable();
            $table->string('idStudy')->unsigned()->nullable();
            $table->string('nim')->unsigned()->nullable();
            $table->date('date');
            $table->timestamps();
        });

        Schema::table('contracts', function($table) {
            $table->foreign('nip')->references('nip')->on('dosens')->onDelete('cascade');
            $table->foreign('idStudy')->references('idStudy')->on('studies')->onDelete('cascade');
            $table->foreign('nim')->references('nim')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
