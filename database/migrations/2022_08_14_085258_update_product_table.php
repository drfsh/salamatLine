<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price_usd',18,0)->nullable()->after('price');//قیمت دلار
            $table->decimal('price_AED',18,0)->nullable()->after('price');//قیمت درهم
            $table->integer('value_added')->default(0)->after('price');//ارزش افزوده
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price_usd');
            $table->dropColumn('price_AED');
            $table->dropColumn('value_added');
        });
    }
}
