<?php

use Illuminate\Database\Seeder;
use App\Repositories\Eloquent\TripItemsRepositoryEloquent;

class TripItemsTableSeeder extends Seeder {

    /**
     *
     * @var TripItemsRepositoryEloquent 
     */
    public $tripItemsRepository;

    /**
     * 
     * @param TripItemsRepositoryEloquent $tripItemsRepository
     */
    public function __construct(TripItemsRepositoryEloquent $tripItemsRepository)
    {
        $this->tripItemsRepository = $tripItemsRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->tripItemsRepository->create(['name' => 'visa issueing']);
        $this->tripItemsRepository->create(['name' => 'visa fees']);
        $this->tripItemsRepository->create(['name' => 'travel insurance']);
        $this->tripItemsRepository->create(['name' => 'transportation']);
        $this->tripItemsRepository->create(['name' => 'flight']);
    }

}
