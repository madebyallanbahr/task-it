<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PriorityEnum;
use App\Enums\StatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->enum('status', [StatusEnum::NONE->value, StatusEnum::IN_PROGRESS->value, StatusEnum::BLOCKED->value, StatusEnum::TO_PLANING->value, StatusEnum::TO_REVIEW->value, StatusEnum::FINISHED->value])->default(StatusEnum::IN_PROGRESS->value);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('project_id')->nullable()->constrained('projects');
            $table->boolean('is_completed')->default(false);
            $table->date('due_date')->nullable();
            $table->enum('priority', [PriorityEnum::NONE->value, PriorityEnum::LOW->value, PriorityEnum::MEDIUM->value, PriorityEnum::HIGH->value])->default(PriorityEnum::MEDIUM->value);
            $table->boolean('favorite')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
