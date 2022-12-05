<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Site;

class SitesTable extends DataTableComponent
{
    protected $model = Site::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setPerPage(100);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id"),
            Column::make("דומיין", "domain"),
            Column::make("תאריך הקמה", "start_date"),
            Column::make("נפח אחסון", "disk_limit"),
            Column::make("נפח נוצל", "disk_used"),
            Column::make("IP", "ip"),
            Column::make("סוג", "type"),
            Column::make("Created at", "created_at")->sortable(),
            Column::make("Updated at", "updated_at")->sortable(),
        ];
    }
}
