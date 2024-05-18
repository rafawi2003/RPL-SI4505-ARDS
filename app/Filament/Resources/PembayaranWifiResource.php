<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembayaranWifiResource\Pages;
use App\Models\PembayaranWifi;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class PembayaranWifiResource extends Resource
{
    protected static ?string $model = PembayaranWifi::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('jenis_transaksi')
                    ->required(),
                TextInput::make('nominal_transaksi')
                    ->required()
                    ->numeric(),
                Select::make('status_transaksi')
                    ->options([
                        'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                        'Dibayar' => 'Dibayar',
                        'Gagal' => 'Gagal',
                    ]),
                TextInput::make('nim')
                    ->required(),
                TextInput::make('kamar')
                    ->required(),
                TextInput::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jenis_transaksi'),
                TextColumn::make('nominal_transaksi')->money('IDR', true),
                TextColumn::make('status_transaksi'),
                TextColumn::make('nim'),
                TextColumn::make('kamar'),
                TextColumn::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->formatStateUsing(function ($state) {
                        return "<img src='{$state}' alt='Bukti Pembayaran' style='max-width: 150px;' />";
                    })
                    ->html(),
                TextColumn::make('created_at')->dateTime(),
                TextColumn::make('updated_at')->dateTime(),
            ])
            ->filters([
                Filter::make('status_transaksi')
                    ->query(fn ($query) => $query->where('status_transaksi', 'Dibayar')),
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
            'index' => Pages\ListPembayaranWifis::route('/'),
            'create' => Pages\CreatePembayaranWifi::route('/create'),
            'edit' => Pages\EditPembayaranWifi::route('/{record}/edit'),
        ];
    }
}
