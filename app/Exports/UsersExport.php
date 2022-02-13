<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class UsersExport implements FromQuery, ShouldQueue
{
    use Exportable, Queueable;

    public $export;

    public function __construct($export)
    {
        $this->export = $export;
    }

    public function query()
    {
        return User::query();
    }

    public function failed(Throwable $exception)
    {
        $this->export->update([
            'status' => 'failed',
        ]);
    }

}
