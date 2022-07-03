<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Dana;
use Illuminate\Http\Request;
use function PHPUnit\Framework\throwException;
use Illuminate\Support\Facades\Gate;

class DanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $danas = Dana::query()->get();

        return view($this->viewPath('index'), [
            'pageTitle' => 'Dana',
            'danas' => $danas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        if (! Gate::allows('create-dana')) {
            return view('layouts.unauthorized');
        }

        return view($this->viewPath('create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dana  $dana
     * @return \Illuminate\Http\Response
     */
    public function show(Dana $dana)
    {
        return view($this->viewPath('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dana  $dana
     * @return \Illuminate\Http\Response
     */
    public function edit(Dana $dana)
    {
        return view($this->viewPath('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dana  $dana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dana $dana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dana  $dana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dana $dana)
    {
        //
    }

    private function viewPath($path): string
    {
        return 'app.dana.' . $path;
    }

}
