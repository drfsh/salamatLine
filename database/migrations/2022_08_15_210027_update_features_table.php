<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('features', function (Blueprint $table) {
            $table->boolean('is_material_id')->default(1);
            $table->boolean('is_weight')->default(1);
            $table->boolean('is_numberin')->default(1);
            $table->boolean('is_length')->default(1);
            $table->boolean('is_width')->default(1);
            $table->boolean('is_height')->default(1);
            $table->boolean('is_diameter')->default(1);
            $table->boolean('is_volume')->default(1);
            $table->boolean('is_purity')->default(1);
            $table->boolean('is_density')->default(1);
            $table->boolean('is_company_id')->default(1);
            $table->boolean('is_guarantee')->default(1);
            $table->boolean('is_warranty')->default(1);
            $table->boolean('is_teamstar')->default(1);
            $table->boolean('is_expire_at')->default(1);
            $table->boolean('is_kind')->default(1);
            $table->boolean('is_mechanism')->default(1);
            $table->boolean('is_operation')->default(1);
            $table->boolean('is_transport')->default(1);
            $table->boolean('is_days')->default(1);
            $table->boolean('is_content')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('features', function (Blueprint $table) {
            //
        });
    }
}
