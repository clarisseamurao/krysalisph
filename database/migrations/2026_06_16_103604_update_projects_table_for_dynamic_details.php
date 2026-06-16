<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('projects', 'slug')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->string('slug')->nullable()->unique()->after('title');
            });
        }

        if (! Schema::hasColumn('projects', 'description')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->longText('description')->nullable()->after('short_description');
            });
        }

        if (! Schema::hasColumn('projects', 'problem')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->text('problem')->nullable()->after('description');
            });
        }

        if (! Schema::hasColumn('projects', 'solution')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->text('solution')->nullable()->after('problem');
            });
        }

        if (! Schema::hasColumn('projects', 'result')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->text('result')->nullable()->after('solution');
            });
        }
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'slug')) {
                $table->dropColumn('slug');
            }

            if (Schema::hasColumn('projects', 'description')) {
                $table->dropColumn('description');
            }

            if (Schema::hasColumn('projects', 'problem')) {
                $table->dropColumn('problem');
            }

            if (Schema::hasColumn('projects', 'solution')) {
                $table->dropColumn('solution');
            }

            if (Schema::hasColumn('projects', 'result')) {
                $table->dropColumn('result');
            }
        });
    }
};