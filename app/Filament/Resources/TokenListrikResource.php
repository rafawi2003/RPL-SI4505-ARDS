<?php
namespace App\Filament\Resources;

use App\Filament\Resources\TokenListrikResource\Pages;
use App\Models\TokenListrik;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class TokenListrikResource extends Resource
{
    protected static ?string $model = TokenListrik::class;

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('jenis_transaksi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nominal_transaksi')
                    ->required()
                    ->integer(),
                Forms\Components\Select::make('status_transaksi')
                    ->required()
                    ->options([
                        'batal' => 'Batal',
                        'menunggu verifikasi' => 'Menunggu Verifikasi',
                        'berhasil' => 'Berhasil',
                    ])
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set, $get, $record) {
                        if ($state === 'berhasil' && !$record->token) {
                            $record->generateToken();
                        }
                    }),
                Forms\Components\TextInput::make('NIM')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_pengguna')
                    ->maxLength(255),
                Forms\Components\ViewField::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->view('components.bukti-pembayaran')
                    ->statePath('bukti_pembayaran'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenis_transaksi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nominal_transaksi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_transaksi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('NIM')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_pengguna')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->getStateUsing(fn ($record) => $record->bukti_pembayaran ? asset('bukti_pembayaran/' . $record->bukti_pembayaran) : null),
                Tables\Columns\TextColumn::make('token')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->sortable()
                    ->dateTime(),
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
            'index' => Pages\ListTokenListriks::route('/'),
            'create' => Pages\CreateTokenListrik::route('/create'),
            'edit' => Pages\EditTokenListrik::route('/{record}/edit'),
        ];
    }
}


