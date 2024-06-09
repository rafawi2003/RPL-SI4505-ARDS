<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Room;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\RoomResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RoomResource\RelationManagers;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('kamar')
                            ->unique(ignorable: fn ($record) => $record)
                            ->disabled(),
                        TextInput::make('penghuni')
                            ->unique(ignorable: fn ($record) => $record),
                            
                       
                    ]),
                // Only include these fields in the create context
                Card::make()
                    ->schema([
                        Select::make('gender')
                            ->options([
                                'putra' => 'Putra',
                                'putri' => 'Putri',
                            ])
                            ->reactive(),
                        Select::make('gedung')
                        ->options(function (callable $get) {
                            $gender = $get('gender');
                            if ($gender === 'putra') {
                                return array_combine(
                                    ['A01', 'A02', 'A03', 'A04', 'A05', 'A06', 'A07', 'A08', 'A09', 'A10'],
                                    ['A01', 'A02', 'A03', 'A04', 'A05', 'A06', 'A07', 'A08', 'A09', 'A10']
                                );
                            } else {
                                return array_combine(
                                    ['A11', 'A12', 'B01', 'B02', 'B03', 'B04', 'B05', 'B06'],
                                    ['A11', 'A12', 'B01', 'B02', 'B03', 'B04', 'B05', 'B06']
                                );
                            }
                        })
                        ->reactive(),
                    Select::make('lantai')
                        ->options([
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                        ])
                        ->reactive(),
                        Select::make('bed')
                            ->options([
                                'B1' => 'B1',
                                'B2' => 'B2',
                                'B3' => 'B3',
                                'B4' => 'B4',
                            ])
                            ->reactive(),
                        Select::make('kamar')
                            ->options(function (callable $get) {
                                $lantai = $get('lantai');
                                $gedung = $get('gedung');
                                $bed = $get('bed');
                                if ($lantai === null || $gedung === null || $bed === null) {
                                    return [];
                                }
                                switch ($lantai) {
                                    case '1':
                                        $kamarRange = range(101, 124);
                                        break;
                                    case '2':
                                        $kamarRange = range(201, 224);
                                        break;
                                    case '3':
                                        $kamarRange = range(301, 324);
                                        break;
                                    case '4':
                                        $kamarRange = range(401, 424);
                                        break;
                                    default:
                                        $kamarRange = [];
                                }
                                $options = [];
                                foreach ($kamarRange as $value) {
                                    $options["{$gedung}_{$value}_{$bed}"] = "{$value}";
                                }
                                return $options;
                            })
                            ->reactive(),
                    ])
                    ->visible(fn ($livewire) => $livewire instanceof Pages\CreateRoom),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('penghuni')->sortable()->searchable(),
                TextColumn::make('gender')->sortable()->searchable(),
                TextColumn::make('kamar')->sortable()->searchable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
