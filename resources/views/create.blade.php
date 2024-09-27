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
    <form action="{{ route("expense.store"),}}" method="POST">
        @csrf
        <label for="jenis">Jenis</label>
        {{-- <input type="text" name="jenis"> --}}
        <select name="jenis_expense" id="jenis">
            @foreach ($jenisExpense as $item)
                <option value="{{$item->id}}">{{$item->nama}}</option>
            @endforeach
        </select>
        <br>
        <label for="jenis">Nama</label>
        <input type="text" name="nama" value="">
        <br>
        <label for="jenis">Jumlah</label>
        <input type="text" name="jumlah" value="">
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
