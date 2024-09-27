<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form Tambah Expense Baru</h1>
    <p></p>
    <form action="" method="POST">
        <label for="jenis">Jenis</label>
        {{-- <input type="text" name="jenis"> --}}
        <select name="jenis">
            @foreach ($jenis_expense as $item)
                <option value="{{$item->id}}"
                @if ($item->id == $expense->jenis_expense)
                @endif selected>
                {{ $item->nama }}
                </option>
            @endforeach
        </select>
        <br>
        <label for="jenis">Nama</label>
        <input type="text" name="nama" value="{{ $expenses[2] }}">
        <br>
        <label for="jenis">Jumlah</label>
        <input type="text" name="jumlah" value="{{ $expenses[3] }}">
        <br>
    </form>
</body>
</html>
