<?php

use Illuminate\Database\Seeder;
use App\Repositories\Eloquent\AgenciesRepositoryEloquent;
use App\Repositories\Eloquent\TripItemsRepositoryEloquent;
use App\Repositories\Eloquent\DestinationsRepositoryEloquent;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

class TripsTableSeeder extends Seeder {

    /**
     *
     * @var AgenciesRepositoryEloquent 
     */
    public $agenciesRepository;

    /**
     *
     * @var TripItemsRepositoryEloquent 
     */
    public $tripItemsRepository;

    /**
     *
     * @var DestinationsRepositoryEloquent 
     */
    public $destinationsRepository;

    /**
     *
     * @var Faker 
     */
    public $faker;

    /**
     * 
     * @param AgenciesRepositoryEloquent $agenciesRepository
     * @param TripItemsRepositoryEloquent $tripItemsRepository
     * @param DestinationsRepositoryEloquent $destinationsRepository
     * @param Faker $faker
     */
    public function __construct(AgenciesRepositoryEloquent $agenciesRepository, TripItemsRepositoryEloquent $tripItemsRepository, DestinationsRepositoryEloquent $destinationsRepository, Faker $faker)
    {
        $this->agenciesRepository = $agenciesRepository;
        $this->tripItemsRepository = $tripItemsRepository;
        $this->destinationsRepository = $destinationsRepository;
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = Storage::disk('public')->allFiles('trips/media');
        Storage::disk('public')->delete($files);

        $agencies = $this->agenciesRepository->all();

        foreach ($agencies as $agency) {

            // create trips
            $trips = factory(App\Trip::class, 2)->make();

            // save them and link them to agencies
            $agency->trips()->saveMany($trips);

            $trips->each(function($trip) {
                // trip media
                $trip->media()->saveMany(factory(App\TripMedia::class, 1)->make());

                // trip items
                $randomTripItems = $this->tripItemsRepository->getRandom(3);
                $tripItems = [];
                $order = 1;
                foreach ($randomTripItems as $item) {
                    $tripItems[$item->id] = ['order' => $order, 'extra_details' => $this->faker->text, 'included' => $this->faker->boolean];
                    $order++;
                }
                $trip->items()->attach($tripItems);

                // trip destinations
                $randomDestinations = $this->destinationsRepository->getRandom(4);
                $tripDestinations = [];
                $order = 1;
                foreach ($randomDestinations as $destination) {
                    $tripDestinations[$destination->id] = ['order' => $order, 'extra_details' => $this->faker->text, 'start_date' => $this->faker->date(), 'end_date' => $this->faker->date()];
                    $order++;
                }
                $trip->destinations()->attach($tripDestinations);
            });
        }
    }

}
