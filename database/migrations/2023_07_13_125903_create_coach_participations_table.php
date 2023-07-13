<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Coach;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach_participations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Coach::class)->unique();
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('question1')->nullable()->comment('My friends and/or family have been coming to me for advice and guidance for years');
            $table->string('question2')->nullable()->comment('I enjoy helping people feel loved, happy, and significant ');
            $table->string('question3')->nullable()->comment('I enjoy working with people and helping them feel successful');
            $table->string('question4')->nullable()->comment('I feel a sense of satisfaction when I help others become better people');
            $table->string('question5')->nullable()->comment('I am excited and passionate about life');
            $table->string('question6')->nullable()->comment('I value honesty and integrity');
            $table->string('question7')->nullable()->comment('I have leadership qualities that I could utilize to be an ARITAE Self-Leadership Coach');
            $table->string('question8')->nullable()->comment('I have worked with people in the past helping them achieve and/or learn something');
            $table->string('question9')->nullable()->comment('I love to laugh and be happy');
            $table->string('question10')->nullable()->comment('I love to help others feel great about themselves');
            $table->string('question11')->nullable()->comment('I have self-confidence');
            $table->string('question12')->nullable()->comment('I am motivated to work on improving myself');
            $table->string('question13')->nullable()->comment('I have the desire/determination to become an ARITAE Self-Leadership Coach?');
            $table->string('question14_1')->nullable()->comment('You have the heart, desire, and natural ability to become an ARITAE Coach. You should consider taking the ARITAE Self-Leadership Coach Training program and become an ARITAE Coach');
            $table->string('question14_2')->nullable()->comment('You have the potential to become an ARITAE Coach. We recommend that you take the ARITAE Self-Leadership Coach training program. It is also recommended you improve your personal attributes and coaching skills by listening to podcasts or reading literature that will improve your ability to work with young people.');
            $table->string('question14_3')->nullable()->comment('You have the potential to become an ARITAE Coach. We recommend that you take the ARITAE Self-Leadership Coach training program. It is also recommended you improve your personal attributes and coaching skills by listening to podcasts or reading literature that will improve your ability to work with young people.');
            $table->text('question15')->nullable()->comment('The number of training openings to become an ARITAE Self-Leadership Coach are limited. Please write, in as many words as you feel necessary, why you should be one of the people selected to become an ARITAE Coach.');
            $table->boolean('question16_1')->nullable()->comment('Yes, I would like to be considered as one of the coaches selected for the ASLC program.');
            $table->boolean('question16_2')->nullable()->comment('If selected for the academy, I agree to a background check by ARITAE.');
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
        Schema::dropIfExists('coach_participations');
    }
};
