<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Expense Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-2xl font-bold mb-6 text-center">Form Tambah Expense Baru</h1>
        <form action="{{ route('expense.store') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Jenis -->
            <div>
                <label for="jenis" class="block text-lg font-semibold mb-2">Jenis</label>
                <select name="jenis_expense" id="jenis" class="w-full border border-gray-300 rounded-lg p-2">
                    @foreach ($jenisExpense as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nama -->
            <div>
                <label for="nama" class="block text-lg font-semibold mb-2">Nama</label>
                <input type="text" name="nama" id="nama" class="w-full border border-gray-300 rounded-lg p-2" placeholder="Masukkan nama expense">
            </div>

            <!-- Jumlah -->
            <div>
                <label for="jumlah" class="block text-lg font-semibold mb-2">Jumlah</label>
                <input type="text" name="jumlah" id="jumlah" class="w-full border border-gray-300 rounded-lg p-2" placeholder="Masukkan jumlah expense">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">Simpan</button>
            </div>
        </form>
    </div>

</body>
</html>
