<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UsersExport implements FromCollection,WithHeadings,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id', 'name', 'username', 'jenis_kelamin', 'email', 'role')->get();
    }
    public function headings(): array
    {
        return [
            'No',
            'name',
            'username',
            'Jenis Kelamin',
            'email',
            'role',
        ];
    }
    public function title() : string{
        return 'Data Users';
    }
}
