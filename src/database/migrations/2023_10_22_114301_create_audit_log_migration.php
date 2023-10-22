<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditLogMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squad_audit_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->string("action", 256);
            $table->string('table', 256);
            $table->string('model', 256);
            $table->string('primary_keys', 256);
            
            $table->text('old_values')->nullable();
            $table->text('new_values')->nullable();
            $table->timestamps();

            $table->index(['table', 'action']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('squad_audit_logs');
    }
}
