<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->string('units')->nullable();
            $table->timestamps();
        });

        DB::unprepared('CREATE PROCEDURE getProducts() 
            BEGIN 
            SELECT * FROM products; 
            END'
        );

        DB::unprepared('CREATE PROCEDURE getProduct(IN _id int(4)) 
            BEGIN 
            SELECT * FROM products WHERE id = _id; 
            END'
        );

        DB::unprepared('CREATE PROCEDURE deleteProduct(IN _id int(4))
            BEGIN
            DELETE FROM products WHERE id = _id;
            END'
        );

        DB::unprepared('CREATE PROCEDURE getUser(IN _id int(4)) 
            BEGIN 
            SELECT name, email, created_at FROM users WHERE id = _id; 
            END'
        );

//        DB::unprepared('CREATE TRIGGER AddDeletedProduct AFTER DELETE ON products FOR EACH ROW
//            BEGIN
//            INSERT INTO product_delete (product_id, name, status) VALUES(OLD.id, OLD.name, "deleted");
//            END;'
//        );
//
//        DB::unprepared('CREATE TRIGGER AddNewProduct AFTER DELETE ON products FOR EACH ROW
//            BEGIN
//            INSERT INTO product_new (name, status) VALUES(NEW.name, "new");
//            END;'
//        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');

        // procedures
        DB::unprepared('DROP PROCEDURE IF EXISTS getProducts');
        DB::unprepared('DROP PROCEDURE IF EXISTS getProduct');
        DB::unprepared('DROP PROCEDURE IF EXISTS deleteProduct');

//        // triggers
//        DB::unprepared('DROP TRIGGER IF EXISTS AddDeletedProduct');
//        DB::unprepared('DROP TRIGGER IF EXISTS AddNewProduct');
    }
}
