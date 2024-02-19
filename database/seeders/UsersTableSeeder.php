<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helpers;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_path = __DIR__ . "/users.csv";
        $data = Helpers::getCsvData($file_path);

        foreach ($data as $index => $row) {
            if ($index !== 0) {
                $user = new User();
                $user->name = $row[0];
                $user->surname = $row[1];
                $user->phone = $row[2];
                $user->email = $row[3];
                $user->password = bcrypt('deliveboo');

                $user->save();
            }
        }
    }
}
