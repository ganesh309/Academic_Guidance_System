<?php

namespace App\Jobs;

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class GenerateSummaryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mentee_id;

    public function __construct($mentee_id)
    {
        $this->mentee_id = $mentee_id;
    }

    public function handle()
    {
        try{
$data = DB::table('interactions')
            ->where('mentee_id', $this->mentee_id)
            ->select('interaction', 'problem_understood', 'remedy', 'observation')
            ->get();

        $text = '';
        foreach ($data as $row) {
            $text .= $row->interaction . ' ';
            $text .= $row->problem_understood . ' ';
            $text .= $row->remedy . ' ';
            $text .= $row->observation . ' ';
        }

        Log::info("data taken: ",(array) $text);

        // Hugging Face API call
        $response = Http::withToken(env('HUGGINGFACE_API_KEY'))

            ->post('https://api-inference.huggingface.co/models/facebook/bart-large-cnn', [
                'inputs' => $text,
            ]);

            
        if ($response->successful()) {
            Log::info("response got: ",(array)$response->json()[0]['summary_text'] ?? null);
            $summary = $response->json()[0]['summary_text'] ?? null;

            DB::table('mentees')
                ->where('id', $this->mentee_id)
                ->update(['summary' => $summary]);
        }
        else{
            Log::info("Not Successfull");
        }
        }catch(ValidationException $e){
            Log::info("Validation exception from GenerateSummaryJob controller: ",(array) $e);
        }
        catch(Exception $e){
            Log::info("Exception from GenerateSummaryJob controller: ",(array) $e);
        }


    }
}
