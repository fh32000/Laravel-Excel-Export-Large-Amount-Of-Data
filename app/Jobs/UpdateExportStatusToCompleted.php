<?php

namespace App\Jobs;

use App\Models\Export;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class UpdateExportStatusToCompleted implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $export;

    public function __construct(Export $export)
    {
        $this->export = $export;
    }

    public function handle()
    {
        $this->export->update([
            'status' => 'completed',
        ]);
    }
}
