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
                    Select::make('penghuni')->unique(ignorable: fn($record) => $record),
                    Select::make('gender')->options([
                        'Putra' => 'Putra',
                        'Putri'=> 'Putri',
                    ])
                    ->reactive(),
                    Select::make('gedung')
                    ->options(function (callable $get) {
                        $gender = $get('gender');
                        if ($gender === 'Putra') {
                            return array_combine(
                            ['A01', 'A02', 'A03', 'A04', 'A05', 'A06', 'A07', 'A08', 'A09','A10'],
                            ['A01', 'A02', 'A03', 'A04', 'A05', 'A06', 'A07', 'A08', 'A09','A10'],
                            );
                        } else {
                            return array_combine(
                            ['A11', 'A12', 'B01', 'B02', 'B03', 'B04', 'B05', 'B06'],
                            ['A11', 'A12', 'B01', 'B02', 'B03', 'B04', 'B05', 'B06']
                            );
                        }
                    })
                    ->afterStateUpdated(function ($state, $get, $set) {
                        $gender = $get('gender');
                        if ($gender === 'Putra') {
                            $set('gedung', array_combine(
                            ['A01', 'A02', 'A03', 'A04', 'A05', 'A06', 'A07', 'A08', 'A09','A10'],
                            ['A01', 'A02', 'A03', 'A04', 'A05', 'A06', 'A07', 'A08', 'A09','A10'],
                            ));
                        } else {
                            $set('gedung', array_combine(
                            ['A11', 'A12', 'B01', 'B02', 'B03', 'B04', 'B05', 'B06'],
                            ['A11', 'A12', 'B01', 'B02', 'B03', 'B04', 'B05', 'B06']
                            ));
                        }
                    }),
                    Select::make('lantai')->options([1,2,3,4])
                    ->reactive(),
                    Select::make('kamar')
                    ->options(function (callable $get) {
                        $lantai = $get('lantai');
                        switch ($lantai) {
                            case 0:
                                return array_combine(range(101, 124), range(101,124));
                            case 1:
                                return array_combine(range(201, 224), range(201,224));
                            case 2:
                                return array_combine(range(301, 324), range(301,324));
                            case 3:
                                return array_combine(range(401, 424), range(401,424));
                            default:
                                return [];
                        }
                    })
                    ->afterStateUpdated(function ($state, $get, $set) {
                        $lantai = $get('lantai');
                        switch ($lantai) {
                            case 1:
                                $set('kamar', array_combine([101, 102, 103, 104, 105], [101, 102, 103, 104, 105]));
                                break;
                            case 2:
                                $set('kamar', array_combine([201, 202, 203, 204, 205], [201, 202, 203, 204, 205]));
                                break;
                            case 3:
                                $set('kamar', array_combine([301, 302, 303, 304], [301, 302, 303, 304]));
                                break;
                            default:
                                $set('kamar', []);
                        }
                    }),
            ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('penghuni')->sortable()->searchable(),
                TextColumn::make('gender')->sortable()->searchable(), 
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
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
