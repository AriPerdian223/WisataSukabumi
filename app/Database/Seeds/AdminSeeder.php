<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'AriPerdian',
                'password' => password_hash('ariperdian12', PASSWORD_BCRYPT),
                'email'    => 'ariperdiann@gmail.com',
            ],
        ];

        // Masukkan data ke dalam tabel admin
        $this->db->table('admin')->insertBatch($data);
    }
}
