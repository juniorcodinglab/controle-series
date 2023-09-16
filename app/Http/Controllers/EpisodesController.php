<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController
{
    public function index(Season $season)
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'mensagemSuccess' => session('mensagem.success')
        ]);
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisode = $request->episodes;

        $season->episodes->each(function(Episode $episode) use ($watchedEpisode) {
            $episode->watched = in_array($episode->id, $watchedEpisode);
        });

        $season->push();

        return to_route('episodes.index', $season->id)
            ->with('mensagem.success', 'Episódios marcados como assistido');
    }
}
