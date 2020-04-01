<!DOCTYPE html>
<html>

<head>
    <title>Report Table</title>
    <style type="text/css">
        #outtable {
            padding: 20px;
            border: 1px solid #e3e3e3;
            width: 600px;
            border-radius: 5px;
        }

        .short {
            width: 50px;
        }

        .normal {
            width: 150px;
        }

        table {
            border-collapse: collapse;
            font-family: arial;
            color: #5E5B5C;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solod #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5;
        }
    </style>
</head>

<body>
    <div id="outtable">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">no urut</th>
                    <th scope="col">id bayar</th>
                    <th scope="col">nama </th>
                    <th scope="col">plat nomor</th>
                    <th scope="col">petugas </th>
                    <th scope="col">pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php $loop = 1;
                foreach ($bayar as $jn) : ?>
                    <tr>
                        <th scope="row"><?= $loop++ ?></th>
                        <td><?= $jn['nama'] ?> - <?= $jn['idbayar'] ?></td>
                        <td> <?= $jn['nama'] ?></td>
                        <td> <?= $jn['nomorplat'] ?></td>
                        <td> <?= $jn['namapetugas'] ?></td>
                        <td> <?= $jn['besarpajak'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>