<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 align="center" class="mb-3 mt-3">BADAN PEMERIKSA KEUANGAN</h3>
                    <h3 align="center">{{ Str::upper($setting->perwakilan) }}</h3>
                    <hr>
                    <h4 align="center">DAFTAR BARANG RUANGAN</h2>
                </div>
            </div>
            <table class="mb-3" border="0" style="width: 100%">
                <tr>
                    <td class="text-center font-weight-bold">Nama UPB : {{ Str::upper($setting->perwakilan) }}</td>
                    <td class="text-center font-weight-bold">Nama Ruangan : {{ Str::upper($place->name) }}</td>
                    
                </tr>
                <tr>
                    <td class="text-center font-weight-bold">Kode UPB : {{ Str::upper($setting->kode_upb) }}</td>
                    <td class="text-center font-weight-bold">Kode Ruangan : {{ $place->code }}</td>
                </tr>
            </table>
            <style>
                th,
                td {
                    text-align: center;
                }
            </style>
            <table border="1" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Kode Brg</th>
                        <th>Th. Prlh</th>
                        <th>Jumlah Brg</th>
                        <th>Penguasaan</th>
                        <th>Keterangan</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventories as $inventory)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $inventory->nup_code }}
                            </td>
                            <td>
                                {{ $inventory->name }}
                            </td>
                            <td>
                                {{ $inventory->item_code }}
                            </td>
                            <td>
                                {{ $inventory->tahun_perolehan }}
                            </td>
                            <td>
                                {{ $inventory->quantity }} {{ $inventory->unit }}
                            </td>
                            <td>
                                {{ $inventory->penguasaan_item }}
                            </td>
                            <td>
                                {{ Str::limit($inventory->description, 30) }}
                            </td>
                        </tr>
                        @endforeach
                </tbody>

            </table>
            <br>
            <br>

            <table border="0" style="width: 100%">
                <tr>
                    <td>Penanggung Jawab UAKPB,</td>
                    <td>{{ $setting->lokasi }},  {{ date('d F Y') }}</td>

                <tr>
                    <td>Kepala Perwakilan</td>
                    <td>Penanggung Jawab Ruangan,</td>
                </tr>
                </tr>

                <tr>
                        <td><br><br><br><br>{{ Str::upper($setting->kepala_perwakilan) }}<br></td>
                        <td><br><br><br><br>{{ Str::upper($place->person_in_charge) }}<br></td>
                </tr>
            </table>
            <script>
                window.print();
            </script>
        </section>
    </section>
</body>
