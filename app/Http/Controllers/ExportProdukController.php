<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProdukExport;

class ExportProdukController extends Controller
{
    public function export()
    {
        return Excel::download(new ProdukExport, 'produk.xlsx');
    }
}
