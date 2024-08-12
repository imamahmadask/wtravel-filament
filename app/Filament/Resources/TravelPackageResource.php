<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\TravelPackageResource\Pages;
use App\Filament\Resources\TravelPackageResource\RelationManagers;
use App\Models\TravelPackage;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Str;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TravelPackageResource extends Resource
{
    protected static ?string $model = TravelPackage::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('slug', Str::slug($state));
                    })
                    ->placeholder('City Tour'),
                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated(),
                Select::make('country')
                    ->multiple()
                    ->options([
                        'Indonesia' => 'Indonesia',
                        'Malaysia' => 'Malaysia',
                        'Singapura' => 'Singapura',
                        'Thailand' => 'Thailand',
                        'Vietnam' => 'Vietnam',
                        'Jepang' => 'Jepang',
                    ]),
                TextInput::make('location')
                    ->required()
                    ->placeholder('Lombok'),
                TextInput::make('type')
                    ->required()
                    ->placeholder('3D2N'),
                TextInput::make('price')
                    ->numeric()
                    ->inputMode('decimal'),
                FileUpload::make('images')
                    ->required()
                    ->multiple()
                    ->image()
                    ->directory('travel-package-images')
                    ->maxSize(1024),
                FileUpload::make('mobile_images')
                    ->multiple()
                    ->image()
                    ->directory('travel-package-images-mobile')
                    ->maxSize(1024),
                TinyEditor::make('description')
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type'),
                TextColumn::make('location')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('country')
                    ->searchable(),
                TextColumn::make('price')
                    ->numeric(),
                ImageColumn::make('images')
                    ->circular()
                    ->stacked()
                    ->ring(2)
                    ->limit(3)
                    ->limitedRemainingText(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTravelPackages::route('/'),
            'create' => Pages\CreateTravelPackage::route('/create'),
            'edit' => Pages\EditTravelPackage::route('/{record}/edit'),
        ];
    }
}
