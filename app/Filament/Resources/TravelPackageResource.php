<?php

namespace App\Filament\Resources;

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
use Filament\Tables\Columns\TextColumn;
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
                    ->options([
                        'Indonesia' => 'Indonesia',
                        'Malaysia' => 'Malaysia',
                        'Singapore' => 'Singapore',
                        'Thailand' => 'Thailand',
                        'Japan' => 'Japan',
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
                RichEditor::make('description')
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->columnSpan(2),
                FileUpload::make('images')
                    ->required()
                    ->multiple()
                    ->image()
                    ->directory('travel-package-images')
                    ->maxSize(1024)
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('type'),
                TextColumn::make('location'),
                TextColumn::make('country'),
                TextColumn::make('price'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
