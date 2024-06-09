<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Help;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\HelpResource\Pages;
use Filament\Forms\Components\Textarea;

class HelpResource extends Resource
{
    protected static ?string $model = Help::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nim')
                    ->label('NIM')
                    ->disabled(),

                TextInput::make('kamar')
                    ->label('Nomor Kamar')
                    ->disabled(),

                Textarea::make('permintaan')
                    ->label('Permintaan')
                    ->disabled(),

                Select::make('status')
                    ->label('Status')
                    ->required()
                    ->options([
                        'selesai' => 'Selesai',
                        'dikerjakan' => 'Dikerjakan',
                        'ditolak' => 'Ditolak'
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')
                    ->label('NIM')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('kamar')
                    ->label('Nomor Kamar')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('permintaan')
                    ->label('Permintaan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->sortable()
                    ->dateTime(),
                
            ])
            ->filters([
                // Define any filters if needed
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
            // Define any relationships if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHelps::route('/'),
            'create' => Pages\CreateHelp::route('/create'),
            'edit' => Pages\EditHelp::route('/{record}/edit'),
        ];
    }
}
