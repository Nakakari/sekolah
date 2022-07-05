<?php

namespace App\Imports;

use App\Models\M_soal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SoalImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new M_soal([
            'kode_soal'  => $row['kode_soal'],
            'soal' => $row['soal'],
            'opsi_satu' => $row['opsi_satu'],
            'opsi_dua' => $row['opsi_dua'],
            'opsi_tiga' => $row['opsi_tiga'],
            'opsi_empat'  => $row['opsi_empat'],
            'kunci'  => $row['kunci'],
            'skor'  => $row['skor'],
            'pembahasan'  => $row['pembahasan'],
        ]);
    }
}
