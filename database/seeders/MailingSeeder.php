<?php

namespace Database\Seeders;

use App\Models\Mailing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mailing::create([
			'location' => 'Jakarta',
			'date' => '14-11-2022',
			'reference_number' => '022/OSIS/IX/2022',
			'attachment' => '0 lampiran',
			'subject' => 'Pemberitahuan',
			'receiver' => 'Orang Tua/Wali Siswa',
			'receiver_address' => 'Tempat',
			'body' => 'lorem ipsum dolor sit amet',
			'sender_position' => 'Ketua OSIS',
			'sender_name' => 'Udin',
			'sender_id_type' => 'NISN',
			'sender_id' => '1234567890',
		]);
    }
}
