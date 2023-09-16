<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository)
    {
    }

    public function index(Request $request) {

        //$series = Serie::active()->get();
        //$series = Serie::with(['temporadas'])->get();
        $series = Series::with(['season'])->get();

        $msg = session('mensagem.sucesso');

        $request->session()->forget('mensagem.sucesso');

        // Retorna um array com o nome da váriavel como atributo
        return view('series.index', compact('series', 'msg'));
    }

    public function create(Request $request) {

        return view('series.create');
    }

    public function store(SeriesFormRequest $request) {

        $serie = $this->repository->add($request);

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->name}' adicionada com sucesso");

    }

    public function destroy(Series $series) {

        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' removida com sucesso");
    }

    public function edit(Series $series) {
        dd($series->season);
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request) {

        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' atualzada com sucesso");
    }
}
