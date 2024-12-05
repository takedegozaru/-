<x-app-layout>
    <div>
        <p>{{ $school->name }}</p>
        <h1>マイチームページ</h1>
        
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
    </div>
</x-app-layout>