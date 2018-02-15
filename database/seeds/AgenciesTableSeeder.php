<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Entities\AgencyRoles;
use App\Repositories\Eloquent\UsersRepositoryEloquent;

class AgenciesTableSeeder extends Seeder {

    /**
     *
     * @var UsersRepositoryEloquent 
     */
    public $usersRepository;

    /**
     * 
     * @param UsersRepositoryEloquent $usersRepository
     */
    public function __construct(UsersRepositoryEloquent $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = Storage::disk('public')->allFiles('agencies/logos');
        Storage::disk('public')->delete($files);

        $numberOfAgencies = 10;
        $roles = AgencyRoles::all();
        $randomUsers = $this->usersRepository->getRandom($numberOfAgencies * count($roles))->toArray();

        factory(App\Agency::class, $numberOfAgencies)->create()->each(function ($agency) use ($roles, $randomUsers) {
            foreach ($roles as $role) {
                $user = array_pop($randomUsers);
                $agency->users()->attach($user['id'], ['role' => $role]);
            }
        });
    }

}
