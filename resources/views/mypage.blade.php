@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold">マイページ</h1>
    <div class="mt-5">
        <p>名前: {{ $user->name }}</p>
        <p>メール: {{ $user->email }}</p>
        <!-- ユーザーの写真アイコン -->
        <img src="{{ $user->profile_photo_url }}" alt="プロフィール写真" class="rounded-full h-24 w-24 object-cover">
        <!-- 保存リストなど -->
        <h2 class="text-2xl font-bold mt-5">保存リスト</h2>
        <ul>
            @forelse ($user->savedSpots as $spot)
                <li>{{ $spot->name }}</li>
            @empty
                <li>保存されたスポットはありません。</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
