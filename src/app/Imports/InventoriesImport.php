<?php

namespace App\Imports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InventoriesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Inventory([
            'name'  => $row['nama'],
            'brand' => $row['merk'],
            'place_id'  => $row['id_lokasi'],
            'description'   => $row['deskripsi'],
            'quantity'  => $row['jumlah_barang'],
            'unit'  => $row['satuan'],
            'price' => $row['harga'],
            'item_code' => $row['kode_barang'],
            'nup_code'  => $row['kode_nup'],
            'qr_code'   => $row['kode_barang'] . '.' . $row['kode_nup'] . '.' . $row['tahun_perolehan'],
            'penguasaan_item'   => $row['penguasaan'],
            'tahun_perolehan'   => $row['tahun_perolehan'],
        ]);
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
