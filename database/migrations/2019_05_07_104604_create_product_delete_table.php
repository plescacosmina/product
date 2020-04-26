<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDeleteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_delete', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_id');
            $table->string('name');
            $table->string('status');
            $table->timestamps();
        });

        DB::unprepared('CREATE TRIGGER AddDeletedProduct AFTER DELETE ON products FOR EACH ROW
            BEGIN
            INSERT INTO product_delete (product_id, name, status, created_at, updated_at) VALUES(OLD.id, OLD.name, "deleted", NOW(), NOW());
            END;'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_delete');

        // triggers
        DB::unprepared('DROP TRIGGER IF EXISTS AddDeletedProduct');
    }
}
