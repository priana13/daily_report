<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TugasResource\Pages;
use App\Filament\Resources\TugasResource\RelationManagers;
use App\Models\Tugas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TugasResource extends Resource
{
    protected static ?string $model = Tugas::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    protected static ?string $navigationLabel = "Tugas";

    protected static ?string $slug = "tugas";
    
    protected static ?string $breadcrumb = "Tugas";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('deskripsi')
                    ->columnSpanFull(),
                Forms\Components\Select::make('kategori_id')->relationship('kategori' , 'title')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull(),
                    ])
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('divisi_id')->relationship('divisi' , 'nama')
                    ->visible(auth()->user()->level == "Manajer")
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {

                if (auth()->user()->level != "Manajer") {

                    $query->where('divisi_id' , auth()->user()->divisi_id);

                }
                return $query;
            })
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('divisi.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                   
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
            'index' => Pages\ListTugas::route('/'),
            // 'create' => Pages\CreateTugas::route('/create'),
            // 'edit' => Pages\EditTugas::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderby('id', 'desc');
    }
}
