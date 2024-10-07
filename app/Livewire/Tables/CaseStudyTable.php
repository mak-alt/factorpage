<?php

namespace App\Livewire\Tables;

use App\Models\CaseStudy;
use Illuminate\Database\Query\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class CaseStudyTable extends DataTableComponent
{
    protected $model = CaseStudy::class;

    public $columnSearch = [
        'name' => null
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSingleSortingDisabled()
            ->setFilterLayoutSlideDown()
            ->setRememberColumnSelectionDisabled()
            ->setUseHeaderAsFooterEnabled()
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setLoadingPlaceholderStatus(true)
            ->setDefaultSort('created_at', 'desc');
    }

    public function columns(): array
    {
        return [
            ImageColumn::make('Image','media')
            ->eagerLoadRelations()
            ->location(function($row) {
                return $row->photo;
            })
            ->label(
                fn($row, Column $column) => $this->getSomeOtherValue($row->getFirstMediaUrl('case-studies'), $column)
            )
            ->attributes(function($row) {
                return [
                    'class' => 'w-8 h-8 rounded-full',
                ];
            }),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            BooleanColumn::make('Status')
                ->setCallback(function(string $value, $row) {
                    if ($value === 'active') {
                        return true;
                    } elseif ($value === 'inactive') {
                        return false;
                    }
                }),
            DateColumn::make("Created at", "created_at")
                ->outputFormat('d M, Y')
                ->sortable(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Status')
                ->setFilterPillTitle('Status')
                ->setFilterPillValues([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])
                ->options([
                    '' => 'All',
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value === 'active') {
                        $builder->where('status', 'active');
                    } elseif ($value === 'inactive') {
                        $builder->where('status', 'inactive');
                    }
                })
        ];
    }
    
    public function query(): Builder
    {
        return CaseStudy::query()
            ->whereTenantId(currentTenantId())
            ->when($this->columnSearch['name'] ?? null, fn ($query, $name) => $query->where('case_studies.name', 'like', '%' . $name . '%'));
    }

    public function bulkActions(): array
    {
        return [
            'activate' => 'Activate',
            'deactivate' => 'Deactivate',
        ];
    }
 
    public function activate()
    {
        CaseStudy::whereIn('id', $this->getSelected())->update(['status' => 'active']);
 
        $this->clearSelected();
    }
 
    public function deactivate()
    {
        CaseStudy::whereIn('id', $this->getSelected())->update(['status' => 'inactive']);
 
        $this->clearSelected();
    }
}
