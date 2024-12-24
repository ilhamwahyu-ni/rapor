<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TahfizhResource\Pages;
use App\Filament\Resources\TahfizhResource\RelationManagers;
use App\Models\Tahfizh;
use Filament\Forms;
use Filament\Forms\Components\Section;
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
                Section::make('Tahfizh')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('surah_name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('ayat')
                                    ->required()
                                    ->numeric(),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('score')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\DatePicker::make('evaluation_date')
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('surah_name')
                    ->sortable(),

                Tables\Columns\TextColumn::make('score')
                    ->sortable(),
                Tables\Columns\TextColumn::make('evaluation_date')
                    ->date()
                    ->sortable(),

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
                ])
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
