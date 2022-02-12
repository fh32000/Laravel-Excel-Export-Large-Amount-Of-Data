<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class UsersExport implements FromQuery,ShouldQueue
{
    use Exportable;

    public function query()
    {
        return User::query();
    }
}
