<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\TUsuario;

class UsersExport implements FromCollection
{
    public function collection()
    {
        return TUsuario::all();
    }
}