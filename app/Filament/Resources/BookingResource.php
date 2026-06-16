<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ActivityLogger;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Bookings';

    protected static ?string $navigationGroup = 'Business Requests';

    public static function canViewAny(): bool
    {
        return in_array(Filament::auth()->user()?->role, ['admin', 'super_admin']);
    }

    public static function canCreate(): bool
    {
        return in_array(Filament::auth()->user()?->role, ['admin', 'super_admin']);
    }

    public static function canEdit(Model $record): bool
    {
        return in_array(Filament::auth()->user()?->role, ['admin', 'super_admin']);
    }

    public static function canDelete(Model $record): bool
    {
        return in_array(Filament::auth()->user()?->role, ['admin', 'super_admin']);
    }
private static function updateBookingStatus(Booking $record, string $newStatus): void { $oldStatus = $record->status; $record->update([ 'status' => $newStatus, ]); ActivityLogger::log( 'updated', 'Booking', 'Booking ' . ($record->reference_number ?? '#' . $record->id) . ' status changed from ' . $oldStatus . ' to ' . $newStatus ); }
    public static function form(Form $form): Form
    {
        
        return $form
            ->schema([
                Forms\Components\Section::make('Client Details')
                    ->schema([
                        Forms\Components\TextInput::make('reference_number')
                            ->label('Reference Number')
                            ->disabled()
                            ->dehydrated(false),

                        Forms\Components\TextInput::make('full_name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('phone')
                            ->maxLength(50),

                        Forms\Components\TextInput::make('business_name')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('business_type')
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Booking Details')
                    ->schema([
                        Forms\Components\TextInput::make('service_needed')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('preferred_date'),

                        Forms\Components\TimePicker::make('preferred_time'),

                        Forms\Components\Select::make('status')
                            ->options([
                                'new' => 'New',
                                'reviewing' => 'Reviewing',
                                'contacted' => 'Contacted',
                                'scheduled' => 'Scheduled',
                                'closed' => 'Closed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('new')
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Message and Notes')
                    ->schema([
                        Forms\Components\Textarea::make('message')
                            ->rows(4),

                        Forms\Components\Textarea::make('admin_notes')
                            ->rows(4),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('reference_number')
                ->label('Reference')
                ->searchable()
                ->sortable()
                ->copyable()
                ->badge()
                ->color('warning'),

            Tables\Columns\TextColumn::make('full_name')
                ->label('Client')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('email')
                ->searchable(),

            Tables\Columns\TextColumn::make('business_name')
                ->label('Business')
                ->searchable()
                ->placeholder('N/A'),

            Tables\Columns\TextColumn::make('service_needed')
                ->label('Service')
                ->searchable(),

            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->colors([
                    'warning' => 'new',
                    'primary' => 'reviewing',
                    'info' => 'contacted',
                    'success' => 'scheduled',
                    'gray' => 'closed',
                    'danger' => 'cancelled',
                ])
                ->formatStateUsing(fn (string $state): string => ucfirst($state)),

            Tables\Columns\TextColumn::make('preferred_date')
                ->date()
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ])
        ->defaultSort('created_at', 'desc')
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'new' => 'New',
                    'reviewing' => 'Reviewing',
                    'contacted' => 'Contacted',
                    'scheduled' => 'Scheduled',
                    'closed' => 'Closed',
                    'cancelled' => 'Cancelled',
                ]),
        ])
        ->actions([
    Tables\Actions\ActionGroup::make([
        Tables\Actions\EditAction::make(),

        Tables\Actions\Action::make('mark_reviewing')
            ->label('Mark Reviewing')
            ->icon('heroicon-o-eye')
            ->color('primary')
            ->visible(fn (Booking $record): bool => $record->status !== 'reviewing')
            ->action(function (Booking $record): void {
                self::updateBookingStatus($record, 'reviewing');

                Notification::make()
                    ->title('Booking marked as reviewing')
                    ->success()
                    ->send();
            }),

        Tables\Actions\Action::make('mark_contacted')
            ->label('Mark Contacted')
            ->icon('heroicon-o-phone')
            ->color('info')
            ->visible(fn (Booking $record): bool => $record->status !== 'contacted')
            ->action(function (Booking $record): void {
                self::updateBookingStatus($record, 'contacted');

                Notification::make()
                    ->title('Booking marked as contacted')
                    ->success()
                    ->send();
            }),

        Tables\Actions\Action::make('mark_scheduled')
            ->label('Mark Scheduled')
            ->icon('heroicon-o-calendar-days')
            ->color('success')
            ->visible(fn (Booking $record): bool => $record->status !== 'scheduled')
            ->requiresConfirmation()
            ->modalHeading('Mark booking as scheduled?')
            ->modalDescription('Use this after confirming the schedule with the client.')
            ->modalSubmitActionLabel('Yes, mark scheduled')
            ->action(function (Booking $record): void {
                self::updateBookingStatus($record, 'scheduled');

                Notification::make()
                    ->title('Booking marked as scheduled')
                    ->success()
                    ->send();
            }),

        Tables\Actions\Action::make('mark_closed')
            ->label('Mark Closed')
            ->icon('heroicon-o-check-circle')
            ->color('gray')
            ->visible(fn (Booking $record): bool => $record->status !== 'closed')
            ->requiresConfirmation()
            ->modalHeading('Close this booking?')
            ->modalDescription('Use this when the booking is completed or no further action is needed.')
            ->modalSubmitActionLabel('Yes, close booking')
            ->action(function (Booking $record): void {
                self::updateBookingStatus($record, 'closed');

                Notification::make()
                    ->title('Booking closed')
                    ->success()
                    ->send();
            }),

        Tables\Actions\Action::make('cancel_booking')
            ->label('Cancel')
            ->icon('heroicon-o-x-circle')
            ->color('danger')
            ->visible(fn (Booking $record): bool => $record->status !== 'cancelled')
            ->requiresConfirmation()
            ->modalHeading('Cancel this booking?')
            ->modalDescription('This will mark the booking as cancelled. The record will not be deleted.')
            ->modalSubmitActionLabel('Yes, cancel booking')
            ->action(function (Booking $record): void {
                self::updateBookingStatus($record, 'cancelled');

                Notification::make()
                    ->title('Booking cancelled')
                    ->success()
                    ->send();
            }),

        Tables\Actions\DeleteAction::make(),
    ]),
])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}