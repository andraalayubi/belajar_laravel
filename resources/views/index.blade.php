<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expense Tracking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto p-5">
        <h1 class="text-3xl font-bold mb-5 text-center">Daftar Expense</h1>
        <a href="/expense/create" class="inline-block bg-blue-500 text-white py-2 px-4 rounded mb-4">Buat Baru</a>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal text-left">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Jenis</th>
                        <th class="px-4 py-3">Nama Expense</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($expenses->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center p-4">Data expense tidak ada.</td>
                        </tr>
                    @else
                        @foreach ($expenses as $item)
                            <tr class="border-b">
                                <td class="px-4 py-3">{{ $item->id }}</td>
                                <td class="px-4 py-3">{{ $item->jenis_expense_nama }}</td>
                                <td class="px-4 py-3">{{ $item->nama }}</td>
                                <td class="px-4 py-3">{{ $item->jumlah }}</td>
                                <td class="px-4 py-3">
                                    <a href="{{route('expense.show', $item->id)}}" class="text-blue-500">view</a>
                                    <a href="{{route('expense.edit', $item->id)}}" class="text-yellow-500 ml-2">edit</a>
                                    <a href="#" class="text-red-500 ml-2">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <tr class="font-bold">
                        <td colspan="3" class="px-4 py-3">Saldo</td>
                        <td class="px-4 py-3">{{ $saldo }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
