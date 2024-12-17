<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsToOcProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oc_product', function (Blueprint $table) {
            $table->dropColumn('stock_status_id');
            $table->dropColumn('points');
            $table->dropColumn('tax_class_id');
            $table->dropColumn('weight');
            $table->dropColumn('weight_class_id');
            $table->dropColumn('length');
            $table->dropColumn('width');
            $table->dropColumn('height');
            $table->dropColumn('length_class_id' );
            $table->dropColumn('subtract');
            $table->dropColumn('minimum');
            $table->dropColumn('sort_order');
            $table->dropColumn('market_price');
            $table->dropColumn('shipping');
            $table->dropColumn('price');
            $table->dropColumn('user_name');
            $table->json('quality')->nullable();
            $table->string('video')->nullable(true)->change();
            $table->integer('episode_duration')->default(0);
            $table->string('warning')->nullable();
            $table->integer('year_manufacture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oc_product', function (Blueprint $table) {
            $table->integer('stock_status_id');
            $table->integer('points')->default(0);
            $table->integer('tax_class_id');
            $table->decimal('weight')->default('0.00000000');
            $table->integer('weight_class_id')->default(0);
            $table->decimal('length')->default('0.00000000');
            $table->decimal('width')->default('0.00000000');
            $table->decimal('height')->default('0.00000000');
            $table->integer('length_class_id')->default(0);
            $table->tinyInteger('subtract')->default(1);
            $table->integer('minimum')->default(1);
            $table->integer('sort_order')->default(0);
            $table->decimal('market_price')->nullable();
            $table->tinyInteger('shipping')->default(1);
            $table->decimal('price')->default('0.00000000');
            $table->string('user_name', 128)->nullable();
            $table->string('video')->nullable(false)->change();
            $table->dropColumn('quality');
            $table->dropColumn('episode_duration');
            $table->dropColumn('warning');
            $table->dropColumn('year_manufacture');
        });
    }
}
