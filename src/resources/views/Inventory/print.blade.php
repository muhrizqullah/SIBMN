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
    <table class="m-2" border="2" style="width: 20%">
        <tr>
            <td rowspan="2"><img src="data:image/svg+xml;base64, {!! base64_encode(QrCode::size(80)->generate(
                $setting->perwakilan . '`' . $setting->kode_upb . '`' . $inventory->name . '`' . $inventory->brand . '`' . $inventory->place->name . '`' . $inventory->quantity . ' ' . $inventory->unit . '`' . $inventory->item_code . '`' . $inventory->nup_code . '`' . $inventory->price . '`' . $inventory->penguasaan_item . '`' . $inventory->tahun_perolehan
            ))  !!} "></td>
            <td class="text-center font-weight-bold">{{ $setting->kode_upb }}</td>
        </tr>
        <tr>
            <td class="text-center font-weight-bold">{{ $inventory->qr_code }}</td>
        </tr>
    </table>
</body>