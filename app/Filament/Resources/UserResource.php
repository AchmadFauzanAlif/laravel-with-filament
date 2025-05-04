<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table; 
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Get;
use Filament\Tables\Columns\ImageColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Pegawai')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextINput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                DateTimePicker::make('joining_date')
                    ->required(),
                Textarea::make('address')
                    ->required(),
                FileUpload::make('photo')

                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->label('Foto'),
                TextColumn::make('name')
                    ->label('Nama Pegawai')
                    ->searchable(),
                TextColumn::make('email'),
                TextColumn::make('phone')
                    ->label('No. Telepon'),
                TextColumn::make('address')
                    ->label('Alamat'),
                TextColumn::make('joining_date')
                    ->label('Tanggal Bergabung')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Ubah Data'),
                // Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
