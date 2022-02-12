<?php

namespace App\Exports;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class UsersExport implements FromQuery,ShouldQueue
{
    use Exportable, Queueable;

    public function query()
    {
        return User::query();
    }
}
