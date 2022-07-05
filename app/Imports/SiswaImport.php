<?php

namespace App\Imports;

use App\Models\M_siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new M_siswa([
            'nis' => $row['nis'],
            'name' => $row['name'],
            'kelas' => $row['kelas'],
            // 'password' => Hash::make($row['password']),
            'email' => $row['email'],
            'mapel' => $row['mapel'],
            'k_enrol' => $row['k_enrol'],
        ]);
    }
}
