<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    private $rules = [
        'judul_agenda' => 'required',
        'isi_agenda' => 'required',
        'foto' => 'nullable|images|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tanggal_mulai_agenda' => 'nullable|date',
        'tanggal_selesai_agenda' => 'nullable|date',
        'tempat_agenda' => 'nullable',
        'waktu_mulai' => 'nullable',
        'waktu_selesai' => 'nullable',
        'status_agenda' => 'nullable',
    ];

    /**
     * Display a listing of the resource.
     *
     */
    public function index(): \Illuminate\Http\Response|string
    {
        $agendas = Agenda::query()->get();

        return view($this->viewPath('index'), [
            'pageTitle' => 'Agenda',
            'agendas' => $agendas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): \Illuminate\Http\Response|string
    {
        return view($this->viewPath('create'), [
            'pageTitle' => 'Tambah Agenda',
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

        $action = Agenda::query()->create([
            'user_id' => auth()->user()->id,
            ...$request->all()]
        );

        return $action
            ? redirect()->route('app.agenda.index')->with('success', 'Data berhasil ditambahkan')
            : redirect()->back()->with('error', 'Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $action = $agenda->delete();

        return $action
            ? redirect()->route('app.agenda.index')->with('success', 'Data berhasil dihapus')
            : redirect()->back()->with('error', 'Data gagal dihapus');
    }

    private function viewPath($path): string
    {
        return 'app.agenda.' . $path;
    }
}
