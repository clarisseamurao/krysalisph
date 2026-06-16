<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentBookings extends BaseWidget
{
    protected static ?string $heading = 'Recent Booking Requests';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Booking::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Client')
                    ->searchable(),

                Tables\Columns\TextColumn::make('business_name')
                    ->label('Business')
                    ->default('N/A'),

                Tables\Columns\TextColumn::make('service_needed')
                    ->label('Service'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'new',
                        'info' => 'contacted',
                        'success' => 'scheduled',
                        'gray' => 'closed',
                        'danger' => 'cancelled',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Submitted')
                    ->since(),
            ]);
    }
}