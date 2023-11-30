<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * public string $title,
     * public string $text,
     * public string $html,
     * public string $markdown,
     * public string $spacy,
     * public string $spacy_markdown,
     * public array $keywords,
     * public array $images,
     * public array $entities,
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('link_id');
            $table->string('title');
            $table->text('text');
            $table->text('html');
            $table->text('markdown');
            $table->text('spacy');
            $table->text('spacy_markdown');
            $table->json('keywords');
            $table->json('images');
            $table->json('entities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
