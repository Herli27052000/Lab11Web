<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = model('UserModel');
		$model->insert([
            'username' => 'Herli',
			'useremail' => 'herli27052000@gmail.com',
			'userpassword' => password_hash('herli1234', PASSWORD_DEFAULT),
        ]);
    }
}
