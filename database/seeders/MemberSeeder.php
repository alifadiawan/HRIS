<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use Illuminate\Support\Carbon;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $member = [
            [
                'nama'=>'admin',
                'no_hp'=>'000000000000',
                'nik'=>'123123123123',
                'alamat'=>'lorem ipsum dolor sit amet',
                'jk'=>'Laki - Laki',
                'tgl_lahir'=>Carbon::parse('18-11-1998'),
                // 'foto'=>'',
                'user_id'=>1,
                'divisi_id' => 1,
            ],
            [
                'nama'=>'employee',
                'no_hp'=>'000000000000',
                'nik'=>'123123123123',
                'alamat'=>'lorem ipsum dolor sit amet',
                'jk'=>'Perempuan',
                'tgl_lahir'=>Carbon::parse('18-11-1989'),
                // 'foto'=>'',
                'user_id'=>2,
                'divisi_id' => 1,
            ],
            [
                'nama'=>'itemployee',
                'no_hp'=>'000000000000',
                'nik'=>'123123123123',
                'alamat'=>'lorem ipsum dolor sit amet',
                'jk'=>'Perempuan',
                'tgl_lahir'=>Carbon::parse('18-11-1989'),
                // 'foto'=>'',
                'user_id'=>3,
                'divisi_id' => 1,
            ],
            [
                'nama'=>'marketemployee',
                'no_hp'=>'000000000000',
                'nik'=>'123123123123',
                'alamat'=>'lorem ipsum dolor sit amet',
                'jk'=>'Perempuan',
                'tgl_lahir'=>Carbon::parse('18-11-1989'),
                // 'foto'=>'',
                'user_id'=>4,
                'divisi_id' => 2,
            ],
            [
                'nama'=>'hrdemployee',
                'no_hp'=>'000000000000',
                'nik'=>'123123123123',
                'alamat'=>'lorem ipsum dolor sit amet',
                'jk'=>'Perempuan',
                'tgl_lahir'=>Carbon::parse('18-11-1989'),
                // 'foto'=>'',
                'user_id'=>5,
                'divisi_id' => 4,
            ],
            [
                'nama'=>'financeemployee',
                'no_hp'=>'000000000000',
                'nik'=>'123123123123',
                'alamat'=>'lorem ipsum dolor sit amet',
                'jk'=>'Perempuan',
                'tgl_lahir'=>Carbon::parse('18-11-1989'),
                // 'foto'=>'',
                'user_id'=>6,
                'divisi_id' => 3,
            ],
            [
                'nama'=>'manageremployee',
                'no_hp'=>'000000000000',
                'nik'=>'123123123123',
                'alamat'=>'lorem ipsum dolor sit amet',
                'jk'=>'Perempuan',
                'tgl_lahir'=>Carbon::parse('18-11-1989'),
                // 'foto'=>'',
                'user_id'=>7,
                'divisi_id' => 5,
            ],
        ];

        Member::insert($member);
    }
}
