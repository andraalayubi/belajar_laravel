<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $expenses = DB::table('expense')
            ->select('expense.id', 'expense.jenis_expense', 'expense.nama', 'expense.jumlah', 'jenis_expense.nama as jenis_expense_nama')
            ->join('jenis_expense', 'jenis_expense.id', 'expense.jenis_expense')
            ->get();

        $debit = DB::table('expense')->where('jenis_expense', 1)->sum('jumlah');
        $kredit = DB::table('expense')->where('jenis_expense', 2)->sum('jumlah');
        $saldo = $kredit - $debit;

        return view('index', ['expenses' => $expenses, 'saldo' => $saldo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_expense = DB::table('jenis_expense')->get();

        return view('create', ['jenisExpense' => $jenis_expense]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('expense')->insert([
            'jenis_expense' => $request->jenis_expense,
            'nama' => $request->nama,
            'jumlah' => $request->jumlah
        ]);
        return redirect()->route('expense.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $expenses1 = DB::table('expense')
            ->select('expense.id', 'expense.nama', 'expense.jumlah', 'expense.jenis_expense', 'jenis_expense.nama as jenis_expense_nama')
            ->join('jenis_expense', 'jenis_expense.id', 'expense.jenis_expense')
            ->where('expense.id', $id)
            ->first();

        $jenis_expense = DB::table('jenis_expense')->get();

        return view('show', ['expense' => $expenses1, 'jenis_expense' => $jenis_expense]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expenses1 = DB::table('expense')
            ->select('expense.id', 'expense.nama', 'expense.jumlah', 'expense.jenis_expense', 'jenis_expense.nama as jenis_expense_nama')
            ->join('jenis_expense', 'jenis_expense.id', 'expense.jenis_expense')
            ->where('expense.id', $id)
            ->first();

        $jenis_expense = DB::table('jenis_expense')->get();

        return view('show', ['expense' => $expenses1, 'jenis_expense' => $jenis_expense]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis' => 'required',
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
        ]);

        // Mengupdate data expense berdasarkan ID
        DB::table('expense')
            ->where('id', $id)
            ->update([
                'jenis_expense' => $request->input('jenis'),
                'nama' => $request->input('nama'),
                'jumlah' => $request->input('jumlah'),
                'updated_at' => now(), // Mengupdate timestamp
            ]);

        return redirect()->route('expense.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
