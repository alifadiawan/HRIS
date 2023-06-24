<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use Illuminate\Support\Carbon;

class memberKwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $member = [
            [
                'nama' => 'ilham',
                'no_hp' => '0895411022459',
                'nik' => '12312913',
                'alamat' => 'eakeakeak',
                'jk' => 'laki',
                'tgl_lahir' => Carbon::parse('18-11-2005'),
                // 'foto'=>'',
                'user_id' => 1,
                'divisi_id' => 1,
            ],
            [
                'nama' => 'steven',
                'no_hp' => '089657280708',
                'nik' => '12312914',
                'alamat' => 'hayoo dimana',
                'jk' => 'laki',
                'tgl_lahir' => Carbon::parse('18-11-2005'),
                // 'foto'=>'',
                'user_id' => 3,
                'divisi_id' => 1,
            ],
        ];

        $employee = [
            [
                'nama' => 'employee1',
                'no_hp' => '089657280708',
                'nik' => '12312914',
                'alamat' => 'hayoo dimana',
                'jk' => 'laki',
                'tgl_lahir' => Carbon::parse('18-11-2005'),
                'jabatan' => 'karyawan',
                // 'foto'=>'',
                'user_id' => 5,
                'divisi_id' => 1,
            ],
            [
                'nama' => 'employee2',
                'no_hp' => '089657280708',
                'nik' => '12312914',
                'alamat' => 'hayoo dimana',
                'jk' => 'laki',
                'tgl_lahir' => Carbon::parse('18-11-2005'),
                'jabatan' => 'supervisor',
                // 'foto'=>'',
                'user_id' => 6,
                'divisi_id' => 1,
            ],
            [
                'nama' => 'employee3',
                'no_hp' => '089657280708',
                'nik' => '12312914',
                'alamat' => 'hayoo dimana',
                'jk' => 'laki',
                'tgl_lahir' => Carbon::parse('18-11-2005'),
                'jabatan' => 'karyawan',
                // 'foto'=>'',
                'user_id' => 7,
                'divisi_id' => 2,
            ],
            [
                'nama' => 'employee4',
                'no_hp' => '089657280708',
                'nik' => '12312914',
                'alamat' => 'hayoo dimana',
                'jk' => 'laki',
                'tgl_lahir' => Carbon::parse('18-11-2005'),
                'jabatan' => 'supervisor',
                // 'foto'=>'',
                'user_id' => 8,
                'divisi_id' => 2,
            ],
        ];

        Member::insert($member);
        Member::insert($employee);
    }
}
