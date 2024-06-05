<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Izin;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\IzinResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\IzinResource\RelationManagers;

class IzinResource extends Resource
{
    protected static ?string $model = Izin::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("nim")
                    ->disabled(),
                TextInput::make("alasan")
                    ->disabled(),
                DateTimePicker::make('start')
                    ->required(),
                DateTimePicker::make('end')
                    ->required(),
                Select::make('status')
                    ->required()
                    ->options([
                        'disetujui' => 'disetujui',
                        'ditolak' => 'ditolak',
                    ]),
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')->sortable()->searchable(),
                TextColumn::make('alasan')->sortable()->searchable(),
                TextColumn::make('status')->sortable()->searchable()

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListIzins::route('/'),
            'create' => Pages\CreateIzin::route('/create'),
            'edit' => Pages\EditIzin::route('/{record}/edit'),
        ];
    }    
}
