<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository {

    public function add(SeriesFormRequest $request): Series {

        $serie = [];

        DB::beginTransaction();

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

        DB::commit();

        return $serie;
    }
}
