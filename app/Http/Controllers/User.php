<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class User
{
    public function index(): View
    {
        $users = DB::table('users')
            ->whereIn('id', function($query) {
                $query->select('user_id')
                    ->from('orders')
                    ->whereRaw('orders.user_id = users.id');
            });

        return view('users', [
            'users' => $users->get()->all(),
            'query' => $users->toSql()
        ]);
    }
}
