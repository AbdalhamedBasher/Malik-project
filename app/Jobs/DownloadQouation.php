<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PDF;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
class DownloadQouation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            // Generate PDF
            $dompdf = new PDF();
            $dompdf->loadHtml('<h1>Hello, PDF!</h1>');
            $dompdf->render();
            $output = $dompdf->output();

            // Log success message
            Log::info('PDF generated successfully.');

            // Save PDF to storage
            $pdfPath = storage_path('app/reports/' . $this->data['quote']->reference . '.pdf');
            file_put_contents($pdfPath, $output);

            // Log success message
            Log::info('PDF saved successfully: ' . $pdfPath);
        } catch (\Exception $e) {
            // Log error message
            Log::error('Error generating PDF: ' . $e->getMessage());
        }
    }
}
