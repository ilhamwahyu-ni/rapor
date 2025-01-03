<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TahfizhResource\Pages;
use App\Filament\Resources\TahfizhResource\RelationManagers;
use App\Models\Tahfizh;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TahfizhResource extends Resource
{
    protected static ?string $model = Tahfizh::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    //add navigationgroups
    protected static ?string $navigationGroup = 'Nilai';

    //add navigation sort order
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->relationship('student', 'name')
                    ->required(),
                Forms\Components\TextInput::make('surah_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ayat')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('score')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('evaluation_date')
                    ->required(),
                Forms\Components\Textarea::make('note')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('student.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('surah_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ayat')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('score')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('evaluation_date')
                    ->date()
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
            'index' => Pages\ListTahfizhs::route('/'),
            'create' => Pages\CreateTahfizh::route('/create'),
            'edit' => Pages\EditTahfizh::route('/{record}/edit'),
        ];
    }
}
