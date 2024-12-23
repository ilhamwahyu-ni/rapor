<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TahsinResource\Pages;
use App\Filament\Resources\TahsinResource\RelationManagers;
use App\Models\Tahsin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TahsinResource extends Resource
{
    protected static ?string $model = Tahsin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    //add navigationgroups
    protected static ?string $navigationGroup = 'Nilai';

    //add navigation sort order
    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->relationship('student', 'name')
                    ->required(),
                Forms\Components\TextInput::make('fluency')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('izhar_harqi')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('qalqalah')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('lafaz_jalalah')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('evaluation_date')
                    ->required(),
                Forms\Components\Textarea::make('note')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('score')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fluency')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('izhar_harqi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('qalqalah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lafaz_jalalah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('evaluation_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('score')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTahsins::route('/'),
            'create' => Pages\CreateTahsin::route('/create'),
            'edit' => Pages\EditTahsin::route('/{record}/edit'),
        ];
    }
}
