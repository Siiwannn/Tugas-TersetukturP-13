<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mobil Sewaan</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
        }

        .header{
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;

        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;

        }

        th,td{
            border:1px solid #ddd;
            padding: 8px;
            text-align: left;

        }

        th{
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }

        .profile-img-small{
            width: 40px;
            height: 40px;
            border-radius: 50px;
            object-fit: cover;
            border: 1px solid #ddd;
            display: block;
            margin: auto;
        }

        .no-image{
            width: 40px;
            height: 40px;
            border-radius: 50px;
            background: #ddd;
            object-fit: cover;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8px;
            margin: auto;
            color: #666;
        }

        .footer{
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #666;
            padding-top: 8px;
        }

        .text-center{
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="header">
      <h2>Data Mobil Sewaan</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Merk</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Harga Sewa/Hari</th>
                <th>Warna</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $index => $car)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-center">
                    @if ($car->image)
                    @if (file_exists(public_path('images/assets/'.$car->image)))
                    <img src="{{ public_path('images/assets/'.$car->image) }}" alt="" class="profile-img-small">
                    @else
                    <div class="no-image">NO IMG</div>
                    @endif
                    @else
                    <div class="no-image">NO IMG</div>
                    @endif
                </td>
                <td class="text-center">{{ $car->name }}</td>
                <td class="text-center">{{ $car->brand }}</td>
                <td class="text-center">{{ $car->model }}</td>
                <td class="text-center">{{ $car->year }}</td>
                <td class="text-center">Rp {{ number_format($car->price, 0, ',', '.') }}</td>
                <td class="text-center">{{ $car->color }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        Total : {{ $cars->count() }} Mobil | Dicetak {{ \Carbon\Carbon::now()->format('d F Y') }}
    </div>
</body>
</html>