<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Identitas';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('student_id')
                            ->label('NIS')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->required()
                            ->options([
                                'laki-laki' => 'Laki-Laki',
                                'perempuan' => 'Perempuan',
                            ]),
                        Forms\Components\Select::make('kelas_id')
                            ->relationship('kelas', 'name')
                            ->required()
                            ->label('Kelas'),

                        //add a school id field
                        Forms\Components\Select::make('school_id')
                            ->relationship('school', 'name')
                            ->required()
                            ->label('Sekolah'),


                    ]),
                Fieldset::make('Tahsin')
                    ->relationship('tahsin')
                    ->schema([
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

                    ]),
                Repeater::make('Tahfizh')
                ->relationship('tahfizhs')
                    ->schema([
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
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('gender'),

                Tables\Columns\TextColumn::make('kelas.name')
                    ->numeric()
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
