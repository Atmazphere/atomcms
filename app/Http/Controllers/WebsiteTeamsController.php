<?php

namespace App\Http\Controllers;

use App\Models\WebsiteTeam;
use Illuminate\Http\Request;

class WebsiteTeamsController extends Controller
{
    public function __invoke()
    {
        return view('community.teams', [
            'employees' => WebsiteTeam::select(['id', 'rank_name', 'badge', 'staff_color', 'staff_background', 'job_description'])
                ->where('hidden_rank', false)
                ->orderByDesc('id')
                ->with('users:id,username,look,motto,rank,team_id')
                ->get(),
        ]);
    }
}