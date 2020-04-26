<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_new', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('status');
            $table->timestamps();
        });

        DB::unprepared('CREATE TRIGGER AddNewProduct AFTER INSERT ON products FOR EACH ROW
            BEGIN
            INSERT INTO product_new (name, status, created_at, updated_at) VALUES(NEW.name, "new", NOW(), NOW());
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
        Schema::dropIfExists('product_new');

        // triggers
        DB::unprepared('DROP TRIGGER IF EXISTS AddNewProduct');
    }
}
