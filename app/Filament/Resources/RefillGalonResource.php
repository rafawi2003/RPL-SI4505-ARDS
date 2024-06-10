<?php
namespace App\Filament\Resources;

use App\Filament\Resources\RefillGalonResource\Pages;
use App\Models\RefillGalon;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ViewField;

class RefillGalonResource extends Resource
{
    protected static ?string $model = RefillGalon::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nim')
                    ->label('NIM')
                    ->required(),
                TextInput::make('nomor_kamar')
                    ->label('Nomor Kamar')
                    ->required(),
                TextInput::make('jumlah_galon')
                    ->label('Jumlah Galon')
                    ->required()
                    ->numeric(),
                TextInput::make('total_harga')
                    ->label('Total Harga')
                    ->required()
                    ->numeric(),
                ViewField::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->view('components.bukti-pembayaran'),
                Select::make('metode_pembayaran')
                    ->label('Metode Pembayaran')
                    ->options([
                        'Cash' => 'Cash',
                        'Transfer' => 'Transfer',
                    ])
                    ->required()
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')->label('NIM'),
                TextColumn::make('nomor_kamar')->label('Nomor Kamar'),
                TextColumn::make('jumlah_galon')->label('Jumlah Galon'),
                TextColumn::make('total_harga')->label('Total Harga')->money('IDR', true),
                ImageColumn::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->getStateUsing(fn ($record) => asset('bukti_pembayaran/' . $record->bukti_pembayaran)),
                TextColumn::make('metode_pembayaran')->label('Metode Pembayaran'),
                TextColumn::make('created_at')->label('Tanggal Dibuat')->dateTime(),
                TextColumn::make('updated_at')->label('Tanggal Diperbarui')->dateTime(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
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
            'index' => Pages\ListRefillGalons::route('/'),
            'create' => Pages\CreateRefillGalon::route('/create'),
            'edit' => Pages\EditRefillGalon::route('/{record}/edit'),
        ];
    }
}


