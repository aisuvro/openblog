<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Blog;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BlogResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BlogResource\RelationManagers;
use Filament\Forms\Components\Select;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(6)
                ->schema([
                    Card::make()
                        ->schema([
                            FileUpload::make('featured_image')
                                ->image(),
                            TextInput::make('image_caption')
                                ->maxLength(250),
                            TextInput::make('title')
                                ->required()
                                ->maxLength(250)
                                ->reactive()
                                ->afterStateUpdated(fn(callable $set, $state) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                                ->maxLength(250)
                                ->reactive(),
                            Textarea::make('description'),
                        ])
                        ->columnSpan(4),

                        Grid::make()
                            ->schema([
                                Card::make()
                                    ->schema([
                                        Toggle::make('is_published')
                                    ]),
                                Card::make()
                                    ->schema([
                                        Select::make('ChildCategories')
                                            ->multiple()
                                            ->relationship('ChildCategories', 'title')
                                    ]),
                            ])
                            ->columnSpan(2),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->circular(),
                ToggleColumn::make('is_published')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'view' => Pages\ViewBlog::route('/{record}'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
