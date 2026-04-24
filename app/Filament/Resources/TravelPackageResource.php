<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\TravelPackageResource\Pages;
use App\Filament\Resources\TravelPackageResource\RelationManagers;
use App\Models\TravelPackage;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Str;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class TravelPackageResource extends Resource
{
    protected static ?string $model = TravelPackage::class;

    protected static ?int $navigationSort = 1;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rocket-launch';

    public static function form(Schema $form): Schema
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
                    ->inputMode('decimal')
                    ->required(),
                TextInput::make('min_pax')
                    ->required(),
                TextInput::make('disc'),
                TextInput::make('disc_price')
                    ->numeric(),
                Select::make('group_package')
                    ->options([
                        'International Package' => 'International Package',
                        'Lombok Package' => 'Lombok Package',
                        'Rinjani Package' => 'Rinjani Package',
                        'Sembalun Package' => 'Sembalun Package',
                        'Honeymoon Package' => 'Honeymoon Package',
                        'Other' => 'Other',
                    ])
                    ->required(),
                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
                Toggle::make('is_popular')
                    ->label('Popular')
                    ->default(false),
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
                TextColumn::make('type')
                    ->label('Duration'),
                TextColumn::make('min_pax')
                    ->sortable(),
                TextColumn::make('group_package')
                    ->searchable(),
                TextColumn::make('price')
                    ->numeric(),                
                IconColumn::make('is_popular')
                    ->label('Popular')
                    ->boolean()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->sortable(),
                // ImageColumn::make('images')
                //     ->circular()
                //     ->stacked()
                //     ->ring(2)
                //     ->limit(3)
                //     ->limitedRemainingText(),
            ])
            ->filters([
                SelectFilter::make('group_package')
                    ->options([
                        'International Package' => 'International Package',
                        'Lombok Package' => 'Lombok Package',                        
                        'Rinjani Package' => 'Rinjani Package',
                        'Sembalun Package' => 'Sembalun Package',
                        'Honeymoon Package' => 'Honeymoon Package',
                        'Other' => 'Other',
                    ]),
                SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Non Active',
                    ]),
                SelectFilter::make('is_popular')
                    ->label('Popular')
                    ->options([
                        '1' => 'Popular',
                        '0' => 'Non Popular',
                    ]),
            ])
            ->defaultSort(function (Builder $query): Builder {
                return $query                    
                    ->orderBy('is_active', 'desc')
                    ->orderBy('group_package', 'asc')
                    ->orderBy('title', 'asc')
                    ->orderBy('created_at', 'desc');
            })
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
