<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RaporSummaryResource\Pages;
use App\Filament\Resources\RaporSummaryResource\RelationManagers;
use App\Models\RaporSummary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RaporSummaryResource extends Resource
{
    protected static ?string $model = RaporSummary::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    //add navigationgroups
    protected static ?string $navigationGroup = 'Nilai';

    //add navigation sort order
    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ([Forms\Components\TextInput::make('student_name')->required(), Forms\Components\TextInput::make('gender')->required(), Forms\Components\TextInput::make('school_id')->required(), Forms\Components\TextInput::make('avg_fluency')->required(), Forms\Components\TextInput::make('avg_izhar_harqi')->required(), Forms\Components\TextInput::make('avg_qalqalah')->required(), Forms\Components\TextInput::make('avg_lafaz_jalalah')->required(), Forms\Components\TextInput::make('avg_tahsin_score')->required(), Forms\Components\TextInput::make('total_surah_memorized')->required(), Forms\Components\TextInput::make('total_ayat_memorized')->required(), Forms\Components\TextInput::make('avg_tahfizh_score')->required(),]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([


                Tables\Columns\TextColumn::make('student_name'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('school_id'),
                Tables\Columns\TextColumn::make('avg_fluency'),
                Tables\Columns\TextColumn::make('avg_izhar_harqi'),
                Tables\Columns\TextColumn::make('avg_qalqalah'),
                Tables\Columns\TextColumn::make('avg_lafaz_jalalah'),
                Tables\Columns\TextColumn::make('avg_tahsin_score'),
                Tables\Columns\TextColumn::make('total_surah_memorized'),
                Tables\Columns\TextColumn::make('total_ayat_memorized'),
                Tables\Columns\TextColumn::make('avg_tahfizh_score'),
            ])
            ->defaultSort('student_id')
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
            'index' => Pages\ListRaporSummaries::route('/'),
            // 'create' => Pages\CreateRaporSummary::route('/create'),
            // 'edit' => Pages\EditRaporSummary::route('/{record}/edit'),
        ];
    }
}
