<?php

namespace App\Jobs;
use Dompdf\Dompdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GeneratePdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    protected $filename;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $filename)
    {
        $this->data = $data;
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       // Generate PDF
       $dompdf = new Dompdf();
       $dompdf->loadHtml('<h1>Hello, PDF!</h1>');
       $dompdf->render();
       $output = $dompdf->output();

       // Save PDF to storage
       file_put_contents( resource_path('app/public/' . $this->filename), $output);

    }
}
