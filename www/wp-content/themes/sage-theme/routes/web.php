use Illuminate\Support\Facades\Route;
use App\Models\SoccerMatch;

Route::get('/live-score', function () {
    // Truy vấn + eager load team/country/competition
    $matches = SoccerMatch::with([
        'homeTeam.country',
        'awayTeam.country',
        'competition'
    ])
    ->orderBy('match_time')
    ->get()
    // group theo: Country || Competition
    ->groupBy(function ($match) {
        return $match->homeTeam->country->name . '||' . $match->competition->name;
    });

    return view('live-score', ['matches' => $matches]);
});
