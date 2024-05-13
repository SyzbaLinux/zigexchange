<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GoldPriceResource\Pages;
use App\Filament\Resources\GoldPriceResource\RelationManagers;
use App\Models\GoldPrice;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GoldPriceResource extends Resource
{
    protected static ?string $model = GoldPrice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('price')
                    ->label('Gold Price per Gram')
                    ->numeric()
                    ->required(),

                Forms\Components\Toggle::make('is_official')->default(false),

                TextInput::make('source'),
                TextInput::make('source_url')->url(),
                Forms\Components\DatePicker::make('date_fetched')->native(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('price'),
                Tables\Columns\ToggleColumn::make('is_official'),
                TextColumn::make('source'),
                TextColumn::make('source_url'),
                TextColumn::make('date_fetched'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\DeleteAction::make()->button(),
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
            'index' => Pages\ListGoldPrices::route('/'),
            'create' => Pages\CreateGoldPrice::route('/create'),
            'edit' => Pages\EditGoldPrice::route('/{record}/edit'),
        ];
    }
}
