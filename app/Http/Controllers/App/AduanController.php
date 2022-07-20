<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Aduan;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    protected $rules = [
        'judul_aduan' => 'required',
        'isi_aduan' => 'required',
        'bukti_aduan' => 'nullable',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $aduans = Aduan::query();

        if ((auth()->user()->jabatan->id === Jabatan::ADMIN) || (auth()->user()->jabatan->id === Jabatan::SUPER_ADMIN)) {
            $aduans->latest();
        } else {
            $aduans->where('status_aduan', Aduan::STATUS_APPROVED)
                ->latest();
        }

        return view($this->viewPath('index'), [
            'pageTitle' => 'Aduan',
            'aduans' => $aduans->get(),
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
            'pageTitle' => 'Aduan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate($this->rules);

        $action = Aduan::query()->create([
            'user_id' => auth()->user()->id,
            'judul_aduan' => $request->input('judul_aduan'),
            'isi_aduan' => $request->input('isi_aduan'),
            'bukti_aduan' => $request->input('bukti_aduan'),
        ]);

        return $action
            ? redirect()->route('app.aduan.index')->with('success', 'Aduan berhasil ditambahkan')
            : redirect()->back()->with('error', 'Aduan gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Aduan $aduan): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view($this->viewPath('show'), [
            'pageTitle' => 'Detail Aduan',
            'aduan' => $aduan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Aduan $aduan)
    {
        return view($this->viewPath('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aduan $aduan): \Illuminate\Http\Response
    {
        $action = $aduan->update([
            'user_id' => auth()->user()->id,
            'judul_aduan' => $request->input('judul_aduan'),
            'isi_aduan' => $request->input('isi_aduan'),
            'bukti_aduan' => $request->input('bukti_aduan'),
        ]);

        return $action
            ? redirect()->route('app.aduan.index')->with('success', 'Aduan berhasil diubah')
            : redirect()->back()->with('error', 'Aduan gagal diubah');
    }

    // update status aduan, [diterima / ditolak]
    public function updateStatus(Request $request, Aduan $aduan): \Illuminate\Http\RedirectResponse
    {
        $action = $aduan->update([
            'status' => $request->input('status_aduan'),
        ]);

        return $action
            ? redirect()->route('app.aduan.index')->with('success', 'Status aduan berhasil diubah')
            : redirect()->back()->with('error', 'Status aduan gagal diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Aduan $aduan): \Illuminate\Http\RedirectResponse
    {
        $action = $aduan->delete();

        return $action
            ? redirect()->back()->with('success', 'Aduan berhasil dihapus')
            : redirect()->back()->with('error', 'Aduan gagal dihapus');
    }

    private function viewPath($path): string
    {
        return 'app.aduan.' . $path;
    }
}
