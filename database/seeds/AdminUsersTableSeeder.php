<?php

use Illuminate\Database\Seeder;
use App\Repositories\Eloquent\UsersRepositoryEloquent;
use App\Entities\Roles;

class AdminUsersTableSeeder extends Seeder {

    /**
     * Users Repository.
     * 
     * @var UsersRepositoryEloquent 
     */
    public $usersRepository;

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
        $this->usersRepository->create([
            'name' => 'Omar Furrer',
            'email' => 'omar.furrer@gmail.com',
            'password' => '123456',
            'phone_number' => '00201005214486',
            'dob' => '1992-09-15',
            'role' => Roles::SUPER_ADMIN
        ]);
    }

}
