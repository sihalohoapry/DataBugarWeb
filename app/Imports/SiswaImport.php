<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    private $data;
    private $berhasil = 0;
    private $gagal = 0;

    public function __construct(string $data = null)
    {
        $this->data = $data;
    }


    public function model(array $row)
    {

        if (!array_filter($row)) {
            return null;
        }

        if (User::where('nisn', '=', $row['nisn'])->count() == 0 && strlen($row['nisn']) == 10) {
            ++$this->berhasil;
            return new User([
                'name' => $row['nama'],
                'nisn' => $row['nisn'],
                'user' => $row['nisn'],
                'sekolah_id' => Auth::user()->sekolah_id,
                'guru_id' => Auth::user()->id,
                'user' => $row['nisn'],
                'role' => 'SISWA',
                'class' => $this->data,
                'gender' => $row['jenis_klamin'],
                'date_of_birth' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir'])),
                'password' => Hash::make(date('dmY', strtotime(Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir']))))),
                'nisn' => $row['nisn'],
            ]);
        } else {
            ++$this->gagal;
        }
    }

    public function getTotalBerhasil(): int
    {
        return $this->berhasil;
    }

    public function getTotalGagal(): int
    {
        return $this->gagal;
    }
}
