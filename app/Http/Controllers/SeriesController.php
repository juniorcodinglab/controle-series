<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
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

        /* for ($i = 1; $i <= $request->seasonsQnt; $i++) {
            $season = $serie->season()->create([
                'number' => $i
            ]);

            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $season->episodes()->create([
                    'number' => $j
                ]);
            }
        } */

        $serie = Series::create($request->all());
        $seasons = [];

        for ($i = 1; $i <= $request->seasonsQnt; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i
            ];

            Season::insert($seasons);
        }

        $episodes = [];

        foreach($serie->season as $season) {
            for ($j = 1; $j <= $request->episodePerSeason; $j++) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }

        Episode::insert($episodes);

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
