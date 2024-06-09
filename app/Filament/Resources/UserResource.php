<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
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
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Illuminate\Support\Facades\Log;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nim')->unique(ignorable: fn($record) => $record),
                        TextInput::make('name'),
                                                
                        Select::make('status')
                           
                            ->options([
                                null => 'Null',
                                'Belum Melakukan Check-in' => 'Belum Melakukan Check-in',
                                'Menunggu Update Kamar oleh Admin' => 'Menunggu Update Kamar oleh Admin',
                                'Proses Pengunduran Diri' => 'Proses Pengunduran Diri',
                                'Mohon Hubungi Admin' => 'Mohon Hubungi Admin'
                            ]),
                        
                            
                        Select::make('kamar')
                            ->options(function (callable $get) {
                                $gender = $get('gender');
                                $availableRooms = Room::whereNull('penghuni')
                                    ->where(function ($query) use ($gender) {
                                        if ($gender === 'putra') {
                                            $query->whereIn('gedung', ['A01', 'A02', 'A03', 'A04', 'A05', 'A06', 'A07', 'A08', 'A09', 'A10']);
                                        } else {
                                            $query->whereIn('gedung', ['A11', 'A12', 'B01', 'B02', 'B03', 'B04', 'B05', 'B06']);
                                        }
                                    })
                                    ->pluck('kamar', 'kamar');
                                $options = [];
                                foreach ($availableRooms as $kamar) {
                                    $label = $kamar ?? '';
                                    $options[$kamar] = $label;
                                }
                                return $options;
                            }),
                        TextInput::make('email'),
                        Select::make('jurusan')->options([
                            'D3 Teknik Telekomunikasi' => 'D3 Teknik Telekomunikasi',
                            'D3 Teknik Informatika' => 'D3 Teknik Informatika',
                            'D3 Sistem Informasi' => 'D3 Sistem Informasi',
                            'D3 Teknik Komputer' => 'D3 Teknik Komputer',
                            'D3 Digital Accounting (Sistem Informasi Akuntansi)' => 'D3 Digital Accounting (Sistem Informasi Akuntansi)',
                            'D3 Digital Marketing' => 'D3 Digital Marketing',
                            'S1 Terapan Digital Creative Multimedia (DCM)' => 'S1 Terapan Digital Creative Multimedia (DCM)',
                            'S1 Teknik Telekomunikasi' => 'S1 Teknik Telekomunikasi',
                            'S1 Teknik Telekomunikasi (International Class)' => 'S1 Teknik Telekomunikasi (International Class)',
                            'S1 Teknik Elektro' => 'S1 Teknik Elektro',
                            'S1 Teknik Elektro (International Class)' => 'S1 Teknik Elektro (International Class)',
                            'S1 Teknik Komputer' => 'S1 Teknik Komputer',
                            'S1 Smart Science & Technology' => 'S1 Smart Science & Technology',
                            'S1 Teknik Biomedis' => 'S1 Teknik Biomedis',
                            'S1 Electrical Energy Engineering' => 'S1 Electrical Energy Engineering',
                            'S1 Sistem Informasi' => 'S1 Sistem Informasi',
                            'S1 Sistem Informasi (International Class)' => 'S1 Sistem Informasi (International Class)',
                            'S1 Teknik Industri' => 'S1 Teknik Industri',
                            'S1 Teknik Industri (International Class)' => 'S1 Teknik Industri (International Class)',
                            'S1 Digital Supply Chain' => 'S1 Digital Supply Chain',
                            'S1 Terapan Digital Creative Multimedia' => 'S1 Terapan Digital Creative Multimedia',
                            'S1 Desain Komunikasi Visual' => 'S1 Desain Komunikasi Visual',
                            'S1 Desain Komunikasi Visual (International Class)' => 'S1 Desain Komunikasi Visual (International Class)',
                            'S1 Desain Interior' => 'S1 Desain Interior',
                            'S1 Desain Produk & Inovasi' => 'S1 Desain Produk & Inovasi',
                            'S1 Kriya (Fashion & Textile Design)' => 'S1 Kriya (Fashion & Textile Design)',
                            'S1 Creative Arts (Intermedia Visual Arts)' => 'S1 Creative Arts (Intermedia Visual Arts)',
                            'S1 Film dan Animasi' => 'S1 Film dan Animasi',
                            'S1 Ilmu Komunikasi' => 'S1 Ilmu Komunikasi',
                            'S1 Ilmu Komunikasi (International Class)' => 'S1 Ilmu Komunikasi (International Class)',
                            'S1 Administrasi Bisnis' => 'S1 Administrasi Bisnis',
                            'S1 Digital Public Relation' => 'S1 Digital Public Relation',
                            'S1 Digital Content Broadcasting' => 'S1 Digital Content Broadcasting',
                            'S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)' => 'S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)',
                            'S1 MBTI (International Class)' => 'S1 MBTI (International Class)',
                            'S1 Akuntansi' => 'S1 Akuntansi',
                            'S1 Akuntansi (International Class)' => 'S1 Akuntansi (International Class)',
                            'S1 Leisure Management' => 'S1 Leisure Management',
                            'S1 Informatika' => 'S1 Informatika',
                            'S1 Informatika (International Class)' => 'S1 Informatika (International Class)',
                            'S1 Rekayasa Perangkat Lunak' => 'S1 Rekayasa Perangkat Lunak',
                            'S1 Teknologi Informasi' => 'S1 Teknologi Informasi',
                            'S1 Data Sains' => 'S1 Data Sains'
                        ]),
                        TextInput::make('nama_ibu'),
                        TextInput::make('nomor_telepon'),
                        TextInput::make('telefon_darurat'),
                        Select::make('usertype')->options([
                            'admin' => 'admin',
                            'penghuni' => 'penghuni',
                        ]),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')->sortable()->searchable(),
                TextColumn::make('gender')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('jurusan')->sortable()->searchable(),
                TextColumn::make('kamar')->sortable()->searchable(),
                TextColumn::make('status')->sortable()->searchable(),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function saved(Form $form, User $user): void
    {
        Log::info('saved method triggered');
        if ($user->isDirty('kamar')) {
            Log::info('kamar field is dirty');
            $kamarBaru = $user->kamar;
            Log::info('kamarBaru: ' . $kamarBaru);

            if ($kamarBaru) {
                $room = Room::where('kamar', $kamarBaru)->first();
                if ($room) {
                    $room->penghuni = $user->nim;
                    $saved = $room->save();
                    Log::info('Room update status: ' . ($saved ? 'success' : 'failed'));
                } else {
                    Log::info('Room not found for kamar: ' . $kamarBaru);
                }
            } else {
                Log::info('$kamarBaru is not set');
            }
        } else {
            Log::info('kamar field is not dirty');
        }
    }
}