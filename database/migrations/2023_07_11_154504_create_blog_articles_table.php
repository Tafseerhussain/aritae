<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BlogCategory;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->id();
            $table->string('img', 255);
            $table->foreignIdFor(BlogCategory::class);
            $table->string('title', 255);
            $table->string('subtitle', 255);
            $table->text('introduction');
            $table->text('more_imgs')->nullable();
            $table->text('quote')->nullable();
            $table->string('quote_by', 255)->nullable();
            $table->longText('long_text');
            $table->text('foot_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_articles');
    }
};
