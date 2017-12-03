<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Nordpool;
use GuzzleHttp\Client;

class UpdateElspotPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateElspotPrices:Update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Elspotprices from Nordpool';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://www.nordpoolgroup.com/api/map/data/daily/?currency=NOK');
        $obj = json_decode($res->getBody(), true);

        foreach ($obj as $nordpoolStat) {
            if (is_array($nordpoolStat) || is_object($nordpoolStat)) {
                foreach ($nordpoolStat as $elspot) {
                    if (isset($elspot['Area'])) {
                        if (!substr_compare($elspot['Area'], 'NO', 0, 2)) {
                            $elspotprice = Nordpool::updateOrCreate([
                                'area' => $elspot['Area']
                            ], [
                                'price' => $elspot['Value'],
                                'last_updated' => NOW()
                            ]);
                        }
                    }
                }
            }
        }
        Log::info('Eslpot updated');
        $this->info('Elspot updated successfully!');
    }
}
