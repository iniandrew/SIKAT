<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    private $rules = [
        'nik' => 'required|string|max:16|unique:wargas',
        'nama_warga' => 'required',
        'tanggal_lahir' => 'required|date',
        'tempat_lahir' => 'required',
        'status_perkawinan' => 'required',
        'no_kk' => 'required_if:status_perkawinan,menikah,cerai',
        'alamat' => 'required',
        'no_telp' => 'required',
        'agama' => 'required',
        'jenis_kelamin' => 'required',
        'pekerjaan' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $wargas = Warga::query()->get();

        return view($this->viewPath('index'), [
            'pageTitle' => 'Warga',
            'wargas' => $wargas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewPath('create'), [
            'pageTitle' => 'Tambah Warga',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);

        if ($request->input('status_perkawinan') === 'lajang') {
            $request->merge(['no_kk' => null]);
        }

        $action = Warga::query()->create($request->all());

        return $action
            ? redirect()->back()->with('success', 'Data berhasil ditambahkan')
            : redirect()->back()->with('error', 'Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function show(Warga $warga)
    {
        return view($this->viewPath('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function edit(Warga $warga)
    {
        return view($this->viewPath('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warga $warga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warga $warga)
    {
        $action = $warga->delete();

        return $action
            ? redirect()->back()->with('success', 'Data berhasil dihapus')
            : redirect()->back()->with('error', 'Data gagal dihapus');
    }

    private function viewPath($path): string
    {
        return 'app.warga.' . $path;
    }
}
