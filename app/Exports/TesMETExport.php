<?php

namespace App\Exports;

use App\Models\TesMET;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TesMETExport implements FromCollection, WithHeadings
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
        return TesMET::join('users', 'tes_m_e_t_s.siswa_id', 'users.id')
            ->select('name', 'hasil_met', 'result_met')->where('tes_id', '=', $this->data)->get();
    }

    public function headings(): array
    {
        return ["Nama", "Point MET", "Hasil MET"];
    }
}
