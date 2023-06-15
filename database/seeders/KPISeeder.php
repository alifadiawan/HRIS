<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KPI;
use App\Models\Member;

class KPISeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $allKpi = [
            [
                'group_name' => 'General KPI',
                'deskripsi' => 'KPI untuk seluruh karyawan',
                'parameter' => 'parameter kpi',
                'weight' => 12.5,
                'min_treshold' => 6.5,
                'max_treshold' => 12.5,
                'isActive' => true,
            ],
            [
                'group_name' => 'Attitude KPI',
                'deskripsi' => 'KPI untuk seluruh karyawan',
                'parameter' => 'parameter kpi',
                'weight' => 30,
                'min_treshold' => 15,
                'max_treshold' => 31,
                'isActive' => false,
            ],
        ];

        $employeeAll = Member::whereHas('user', function ($query) {
            $query->whereHas('role', function ($user) {
                $user->where('role', '!=', 'admin');
            });
        })->get();

        foreach ($allKpi as $kpi) {
            $kpis = KPI::create($kpi);
            $kpis->mapping()->attach($employeeAll);
        }

        $kpiIT = [
            [
                'group_name' => 'Programming KPI',
                'deskripsi' => 'KPI untuk penilaian pemrograman',
                'parameter' => 'parameter kpi',
                'weight' => 12.5,
                'min_treshold' => 6.5,
                'max_treshold' => 12.5,
                'isActive' => true,
            ],
            [
                'group_name' => 'Computer KPI',
                'deskripsi' => 'KPI untuk penilaian pengoprasian komputer',
                'parameter' => 'parameter kpi',
                'weight' => 30,
                'min_treshold' => 15,
                'max_treshold' => 31,
                'isActive' => false,
            ],
        ];

        $employeeIT = Member::whereHas('user', function ($query) {
            $query->whereHas('role', function ($user) {
                $user->where('role', '!=', 'admin');
            });
        })->whereHas('divisi', function ($divisi) {
               $divisi->where('nama_divisi', 'information technology'); 
            })->get();

        foreach ($kpiIT as $kpi) {
            $kpis = KPI::create($kpi);
            $kpis->mapping()->attach($employeeIT);
        }

        $kpiM = [
            [
                'group_name' => 'Marketing KPI',
                'deskripsi' => 'KPI untuk penilaian marketing',
                'parameter' => 'parameter kpi',
                'weight' => 12.5,
                'min_treshold' => 6.5,
                'max_treshold' => 12.5,
                'isActive' => true,
            ],
            [
                'group_name' => 'Social Media Post KPI',
                'deskripsi' => 'KPI untuk penilaian posting konten sosmed',
                'parameter' => 'parameter kpi',
                'weight' => 30,
                'min_treshold' => 15,
                'max_treshold' => 31,
                'isActive' => false,
            ],
        ];

        $employeeM = Member::whereHas('user', function ($query) {
            $query->whereHas('role', function ($user) {
                $user->where('role', '!=', 'admin');
            });
        })->whereHas('divisi', function ($divisi) {
               $divisi->where('nama_divisi', 'marketing'); 
            })->get();

        foreach ($kpiM as $kpi) {
            $kpis = KPI::create($kpi);
            $kpis->mapping()->attach($employeeM);
        }

        $kpiS = [
            [
                'group_name' => 'Monitoring KPI',
                'deskripsi' => 'KPI untuk seluruh supervisor',
                'parameter' => 'parameter kpi',
                'weight' => 12.5,
                'min_treshold' => 6.5,
                'max_treshold' => 12.5,
                'isActive' => true,
            ],
        ];

        $employeeS = Member::whereHas('user', function ($query) {
            $query->whereHas('role', function ($user) {
                $user->where('role', '!=', 'admin');
            });
        })->where('jabatan', 'supervisor')->get();

        foreach ($kpiS as $kpi) {
            $kpis = KPI::create($kpi);
            $kpis->mapping()->attach($employeeS);
        }

        $kpiIK = [
            [
                'group_name' => 'IT Softskill KPI',
                'deskripsi' => 'KPI untuk seluruh karyawan IT',
                'parameter' => 'parameter kpi',
                'weight' => 12.5,
                'min_treshold' => 6.5,
                'max_treshold' => 12.5,
                'isActive' => true,
            ],
        ];

        $employeeIK = Member::whereHas('user', function ($query) {
            $query->whereHas('role', function ($user) {
                $user->where('role', '!=', 'admin');
            });
        })->where('jabatan', 'karyawan')->whereHas('divisi', function ($divisi) {
               $divisi->where('nama_divisi', 'information technology'); 
            })->get();

        foreach ($kpiIK as $kpi) {
            $kpis = KPI::create($kpi);
            $kpis->mapping()->attach($employeeIK);
        }
    }
}
