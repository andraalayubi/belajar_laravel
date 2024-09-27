<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expense Tracking</title>
</head>

<body>
    <h1>Daftar Expense</h1>
    <br>
    <a href="/expense/create">Buat Baru</a>
    <br>
    <table>
      <tr>
        <td>No</td>
        <td>Jenis</td>
        <td>Nama Expense</td>
        <td>Jumlah</td>
        <td>Action</td>
      </tr>
      @foreach ($expenses as $item )
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->jenis_expense_nama }}</td>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->jumlah }}</td>
          <td>
            <a href="{{route('expense.show', $item->id)}}">view</a>
            <a href="{{route('expense.edit', $item->id)}}">edit</a>
            <a href="">delete</a>
          </td>
        </tr>
      @endforeach
      <tr>
        <td colspan="3">Saldo</td>
        <td>{{ $saldo }}</td>
        <td></td>
      </tr>
    </table>
</body>

</html>
