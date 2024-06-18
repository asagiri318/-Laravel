<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // 追加

class UserController extends Controller
{
    public function index()
    {
        // 開発中に特定のユーザーをシミュレート
        $user = User::find(1); // 適当なユーザーIDに置き換え
        if (!$user) {
            // ユーザーが存在しない場合の処理
            abort(404, 'User not found');
        }

        Auth::login($user);

        return view('mypage', compact('user'));
    }
}
