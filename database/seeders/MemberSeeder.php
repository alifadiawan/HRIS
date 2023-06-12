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
                'nama'=>'ilham',
                'no_hp'=>'0895411022459',
                'nik'=>'12312913',
                'alamat'=>'eakeakeak',
                'jk'=>'laki',
                'tgl_lahir'=>Carbon::parse('18-11-2005'),
                // 'foto'=>'',
                'user_id'=>1,
            ],
            [
                'nama'=>'steven',
                'no_hp'=>'089657280708',
                'nik'=>'12312914',
                'alamat'=>'hayoo dimana',
                'jk'=>'laki',
                'tgl_lahir'=>Carbon::parse('18-11-2005'),
                // 'foto'=>'',
                'user_id'=>1,
            ],
        ];

        Member::insert($member);
    }
}
