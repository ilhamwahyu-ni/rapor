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
                Forms\Components\Section::make('Detail Evaluasi Tahsin')
                    ->schema([
                        Forms\Components\Select::make('student_id')
                            ->label('Siswa')
                            ->relationship('student', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('fluency')
                                    ->label('Kelancaran')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('izhar_harqi')
                                    ->label('Izhar Harqi')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('qalqalah')
                                    ->label('Qalqalah')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('lafaz_jalalah')
                                    ->label('Lafaz Jalalah')
                                    ->required()
                                    ->numeric(),
                            ]),
                        Forms\Components\TextInput::make('score')
                            ->label('Nilai')
                            ->required()
                            ->numeric(),

                        Forms\Components\Textarea::make('note')
                            ->label('Catatan')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\DatePicker::make('evaluation_date')
                            ->label('Tanggal Penilaian')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Siswa')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fluency')
                    ->label('Kelancaran')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('izhar_harqi')
                    ->label('Izhar Harqi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('qalqalah')
                    ->label('Qalqalah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lafaz_jalalah')
                    ->label('Lafaz Jalalah')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('score')
                    ->label('Nilai')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('evaluation_date')
                    ->label('Tanggal Penilaian')
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
