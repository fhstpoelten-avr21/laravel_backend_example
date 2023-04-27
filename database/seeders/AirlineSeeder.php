<?php

namespace Database\Seeders;

use App\Contracts\AirlineRequestInterface;
use App\Models\Airline;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

/**
 * Class AirlineSeeder
 *
 * Fetch airlines from an API and store it in the DB
 *
 * @package Database\Seeders
 */
class AirlineSeeder extends Seeder
{
    /** @var \App\Contracts\AirlineRequestInterface */
    protected $airlineRequest = null;

    /**
     * AirlineController constructor.
     */
    public function __construct()
    {
        $this->airlineRequest = resolve(AirlineRequestInterface::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            // Fetch airlines from API and map it to an eloquent model
            $airlines = resolve(AirlineRequestInterface::class)->get('/');
            $collection = collect($airlines)->map(function ($airline) {
                if (array_key_exists('name', $airline) && ! empty($airline['name'])) {
                    // Only Airlines with a unique 'name' attribute makes sense
                    return Airline::insertOrIgnore(array_filter([
                        'id' => array_key_exists('id', $airline) && ! empty($airline['id']) ? (int) $airline['id'] : null,
                        'name' => $airline['name'],
                        'country' => array_key_exists('country', $airline) ? $airline['country'] : '',
                        'logo' => array_key_exists('logo', $airline) ? $airline['logo'] : '',
                        'slogan' => array_key_exists('slogan', $airline) ? $airline['slogan'] : '',
                        'head_quaters' => array_key_exists('head_quaters', $airline) ? $airline['head_quaters'] : '',
                        'website' => array_key_exists('website', $airline) ? $airline['website'] : '',
                        'established' => array_key_exists('established', $airline) ? $airline['established'] : '',
                        'created_at' => Carbon::now(),
                    ]));
                }
            });

            DB::beginTransaction();
            foreach ($collection as $item) {
                /** @var Airline $item */
                $item->save();
            }
            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();
            Log::error(config('app.name').'::'.
                Lang::get('error.seeder.airline', [
                    'url' => $this->airlineRequest->getServiceBaseUrl() ?: '',
                    'item' => isset($item) && !empty($item->id) ? $item->id : '',
                ]).'::'.$exception->getMessage());
        }
    }
}
