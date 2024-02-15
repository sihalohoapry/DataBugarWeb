<?php

namespace App\Exports;

use App\Models\TesImtKebugaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $data;

    public function __construct(string $data = null)
    {
        $this->data = $data;
    }
    public function collection()
    {
        return TesImtKebugaran::join('users', 'tes_imt_kebugarans.siswa_id', 'users.id')
            ->select('name', 'point_imt', 'result_imt', 'jenis_kebugaran', 'point_kebugaran', 'result_kebugaran')->where('tes_id', '=', $this->data)->get();
    }
    public function headings(): array
    {
        return ["Nama", "Point IMT", "Hasil IMT", "Jenis Kebugaran", "Poin Kebugaran", "Hasil Kebugaran"];
    }
}
