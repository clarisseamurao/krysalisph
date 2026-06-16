<?php

namespace App\Filament\Widgets;

use App\Models\ActivityLog;
use Filament\Facades\Filament;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentActivity extends BaseWidget
{
    protected static ?string $heading = 'Recent Activity';

    protected int|string|array $columnSpan = 'full';

    public static function canView(): bool
    {
        return Filament::auth()->user()?->isSuperAdmin() === true;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ActivityLog::query()->latest()->limit(8)
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->default('Public Visitor'),

                Tables\Columns\TextColumn::make('action')
                    ->badge()
                    ->colors([
                        'success' => 'created',
                        'warning' => 'updated',
                        'danger' => 'deleted',
                    ]),

                Tables\Columns\TextColumn::make('module')
                    ->label('Module'),

                Tables\Columns\TextColumn::make('description')
                    ->limit(70),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Time')
                    ->since(),
            ]);
    }
}