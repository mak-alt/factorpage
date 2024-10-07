<?php

namespace App\Livewire\CaseStudy;

use stdClass;
use Livewire\Component;
use App\Models\CaseStudy;
use Filament\Tables\Table;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Filament\Forms\Contracts\HasForms;
// use Filament\Notifications\Collection;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Collection;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Concerns\InteractsWithTable;

class Manage extends Component implements HasForms, HasTable
{
    // use WithPagination;
    use InteractsWithTable;
    use InteractsWithForms;

    #[Url]
    public bool $isTableReordering = false;
    
    /**
     * @var array<string, mixed> | null
     */
    #[Url]
    public ?array $tableFilters = null;
    
    #[Url]
    public ?string $tableGrouping = null;
    
    #[Url]
    public ?string $tableGroupingDirection = null;
    
    /**
     * @var ?string
     */
    #[Url]
    public $tableSearch = '';
    
    #[Url]
    public ?string $tableSortColumn = null;
    
    #[Url]
    public ?string $tableSortDirection = null;

    public function table(Table $table): Table
    {
        return $table
            ->query(CaseStudy::whereTenantId(currentTenantId())->latest())
            ->recordUrl(
                fn (CaseStudy $record): string => route('case-study.edit', ['id' => $record])
            )
            ->heading('Case Studies')
            ->description('Manage your case studies here.')
            ->deferLoading()
            ->striped()
            ->columns([
                TextColumn::make('#')
                ->rowIndex(),
                ImageColumn::make('Image')
                ->getStateUsing(function (CaseStudy $record): string {
                    return $record->photo;
                })
                ->extraImgAttributes([
                    'img' => 'src'
                ])
                ->circular(),
                TextColumn::make('name')
                ->searchable()
                ->weight(FontWeight::Bold),
                IconColumn::make('status')
                ->icon(fn (string $state): string => match ($state) {
                    'active' => 'heroicon-o-check-circle',
                    'inactive' => 'heroicon-o-x-circle',
                })
                ->color(fn (string $state): string => match ($state) {
                    'active' => 'primary',
                    'inactive' => 'danger',
                    default => 'gray',
                }),
                TextColumn::make('created_at')
                ->date()
            ])
            ->filters([
                SelectFilter::make('status')
                ->options([
                    '' => 'All',
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make()
                    ->url(
                        fn (CaseStudy $record): string => route('case-study.edit', ['id' => $record])
                    ),
                    DeleteAction::make(),
                ])
                ->icon('heroicon-m-ellipsis-vertical')
                ->tooltip(''),
            ])
            ->headerActions([
                CreateAction::make()
                ->url(
                    fn (): string => route('case-study.create')
                )
                ->label('Create New Case Study')
            ])
            ->bulkActions([
                BulkAction::make('delete')
                ->requiresConfirmation()
                ->action(fn (Collection $records) => $records->each->delete())
                ->deselectRecordsAfterCompletion()
            ]);
    }

    public function render()
    {
        // $case_studies = CaseStudy::with('media')->whereTenantId(currentTenantId())->latest()->paginate(3);
    

        return view('livewire.case-study.manage')
                ->layout('components.app-layout')
                ->title('Manage Case Studies | FactorPage');
    }
}
