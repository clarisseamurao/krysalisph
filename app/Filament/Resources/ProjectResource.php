<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Projects';

    protected static ?string $navigationGroup = 'Website Content';

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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Project Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation === 'create') {
                                    $set('slug', Str::slug($state));
                                }
                            }),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('category')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Example: Restaurant Systems'),

                        Forms\Components\TextInput::make('business_type')
                            ->maxLength(255)
                            ->placeholder('Example: Restaurant'),

                        Forms\Components\Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->default('published')
                            ->required(),

                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Project'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Project Content')
                    ->schema([
                        Forms\Components\Textarea::make('short_description')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->rows(5)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('problem')
                            ->rows(4),

                        Forms\Components\Textarea::make('solution')
                            ->rows(4),

                        Forms\Components\Textarea::make('result')
                            ->rows(4),

                        Forms\Components\Textarea::make('features')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Media Uploads')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Project Image')
                            ->image()
                            ->directory('projects')
                            ->disk('public')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(4096),

                        Forms\Components\FileUpload::make('qr_code')
                            ->label('QR Code')
                            ->image()
                            ->directory('projects/qr-codes')
                            ->disk('public')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(2048),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->label('Image')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('business_type')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'gray' => 'draft',
                        'success' => 'published',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}