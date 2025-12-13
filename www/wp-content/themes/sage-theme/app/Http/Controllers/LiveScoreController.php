<?php

namespace App\Http\Controllers;

use Roots\Sage\Container;
use App\Models\SoccerMatch;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LiveScoreController
{
    public function index()
    {
        try {
            // Lấy dữ liệu với quan hệ
            $matches = SoccerMatch::with(['homeTeam', 'awayTeam', 'competition'])
                ->orderBy('match_time', 'asc')
                ->get();

            // Phân loại trận đấu
            $liveMatches     = $matches->whereIn('status_id', [2, 3]); // halftime + live
            $finishedMatches = $matches->where('status_id', 5);       // FT
            $scheduleMatches = $matches->where('status_id', 1);       // sắp diễn ra

            // Render view - dùng đúng cách của Sage
            return view('live-score', [
                'liveMatches'     => $liveMatches,
                'finishedMatches' => $finishedMatches,
                'scheduleMatches' => $scheduleMatches,
            ]);

        } catch (\Exception $e) {
            // Nếu có lỗi (ví dụ model không tồn tại, DB lỗi...), hiển thị thông báo để debug
            echo '<pre>';
            echo "LỖI KHI LOAD LIVE SCORE\n";
            echo "Message: " . $e->getMessage() . "\n";
            echo "File: " . $e->getFile() . " (line " . $e->getLine() . ")\n";
            echo '</pre>';
            exit;
        }
    }
}