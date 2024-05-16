<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
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
                    Select::make('jurusan')->options([
                    'D3 Teknik Telekomunikasi'=>'D3 Teknik Telekomunikasi', 
                    'D3 Teknik Informatika'=>'D3 Teknik Informatika', 
                    'D3 Sistem Informasi'=>'D3 Sistem Informasi',
                    'D3 Teknik Komputer'=>'D3 Teknik Komputer',
                    'D3 Digital Accounting (Sistem Informasi Akuntansi)'=>'D3 Digital Accounting (Sistem Informasi Akuntansi)',
                    'D3 Digital Marketing'=>'D3 Digital Marketing',
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
                    TextInput::make('status'),
                    Select::make('gender')->options([
                        'Putra' => 'Putra',
                        'Putri'=> 'Putri',
                    ]),
                    TextInput::make('kamar'),
                    TextInput::make('email'),
                    TextInput::make('nama_ibu'),
                    TextInput::make('nomor_telepon'),
                    TextInput::make('telefon_darurat'),
                    TextInput::make('usertype'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
