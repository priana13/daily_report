<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanHarianResource\Pages;
use App\Filament\Resources\LaporanHarianResource\RelationManagers;
use App\Models\LaporanHarian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporanHarianResource extends Resource
{
    protected static ?string $model = LaporanHarian::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationLabel = "Laporan Harian";
    protected static ?string $slug = "laporan";
    protected static ?string $breadcrumb = "Laporan";

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')->required()->maxLength(255)->columnSpanFull(),
                Forms\Components\Select::make('tugas_id')->relationship('tugas' , 'judul')->searchable()->preload()->required(),
                Forms\Components\DatePicker::make('tanggal')->default(now())
                    ->required(),
                
                // Forms\Components\Select::make('user_id')->relationship('user', 'name')->default(auth()->user()->id)
                //     ->required(),

                // Forms\Components\Select::make('divisi_id')->relationship('divisi' , 'nama')->default( auth()->user()->divisi_id )
                //     ->required(),
                Forms\Components\Select::make('kategori_id')->relationship('kategori' , 'title')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull(),
                    ])
                    ->required(),                
                Forms\Components\RichEditor::make('deskripsi')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('file'),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        "On Progress" => "On Progress",
                        "Selesai" => "Selesai"
                    ])
                    ->default("Selesai"),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {

                if (auth()->user()->level != "Manajer") {

                    $query->where('user_id' , auth()->id());

                }

                return $query;

            })
            ->columns([
                Tables\Columns\TextColumn::make('judul')->searchable(),
                Tables\Columns\TextColumn::make('kategori.title')->sortable(),           
                Tables\Columns\TextColumn::make('tanggal')->date()->sortable(),
                Tables\Columns\TextColumn::make('tugas.judul')->sortable(),
                Tables\Columns\TextColumn::make('user.name')->visible(fn () => auth()->user()->level == "Manajer")->sortable(),
                Tables\Columns\TextColumn::make('divisi.nama')->sortable(),
                Tables\Columns\BadgeColumn::make('status')->colors([
                    'On Progress' => 'yellow',
                    'Selesai' => 'green',
                ])->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('kategori_id')->relationship('kategori', 'title')->label('Kategori')->searchable()->preload(),
                SelectFilter::make('tugas_id')->relationship('tugas', 'judul')->label('Tugas')->searchable()->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->hiddenLabel(),
                Tables\Actions\DeleteAction::make()->hiddenLabel(),
                // Tables\Actions\Action::make("show")->url(fn (LaporanHarian $record) => route('filament.admin.resources.laporan.show', $record)),
                Tables\Actions\ReplicateAction::make()->hiddenLabel(),
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
            'index' => Pages\ListLaporanHarians::route('/'),
            'show' => Pages\ShowLaporanHarian::route('/{record}'),
            // 'create' => Pages\CreateLaporanHarian::route('/create'),
            // 'edit' => Pages\EditLaporanHarian::route('/{record}/edit'),
        ];
    }



}
