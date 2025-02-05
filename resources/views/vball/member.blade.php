<x-app-layout>
    <div>
        <p>{{ $school->name }}</p>
        <h1>選手一覧</h1>
        <div>
            @foreach($school->players as $player)
                <div>
                    <p>背番号： {{ $player->number }}</p>
                    @if(isset($player->name)==true)
                        <p>名前：{{ $player->name }}</p>
                    @else
                        <div>
                            <form action='/member_name/{{ $player->id }}' method='POST'>
                                @csrf
                                <input type='text' name='player[name]' value='{{ $player->name }}'>
                                <input type='submit'>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        
        <form action='/member_create/{{$school->id}}' method='POST'><!--メンバー追加処理-->
            @csrf
            <input type='number' name='player[number]' >
            <input type='text' name='player[name]' >
            <input type='submit'>
        </form>
    </div>
</x-app-layout>