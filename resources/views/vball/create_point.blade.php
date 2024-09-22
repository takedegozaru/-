<x-app-layout>
    
    <p>{{$game->name}}</p>
    
    @foreach($game->sets as $set)
    <p>第{{ $set->set_number }}セット</p>
    
    <div>
        
        <form action='?' method='POST'>
            @csrf
            <!--<input type='radio' name='reason_id' value='1'>スパイク</input>-->
            <!--<br>-->
            <!--<input type='radio' name='reason_id' value='2'>ブロック</input>        -->
            <!--<br>-->
            <!--<input type='radio' name='reason_id' value='3'>サービスエース</input>-->
            <!--<br>-->
            
            <input type='number' name='point[player_id]'>背番号</input>
            
            <input type='text' name='point[text]'>備考欄</input>
            
            <p>{{ $set->my_points }}点目</p>
            <input type='hidden' name='point[point_number]' value={{ $set->my_points }}></input>
            
            <select name='point[reason_id]'>
                <option value="" disabled selected>理由選択</option>
                    
                @foreach($reasons as $r )
                    <option value={{ $r->id }}>{{ $r->name }}</option>
                @endforeach
            </select>
            
            <input formaction='/match/{{ $set->id }}/point' type='submit'></input>
        </form>
    </div>
    
    <div>
        @if(isset($set->points)==true)
        @foreach($set->points as $tensu)
            <div class='m-5'>
                <p>{{ $tensu->point_number+1 }}</p>
                <p>{{ $tensu->text }}</p>
                <p>{{ $tensu->reason->name }}</p>
            </div>
        @endforeach
        @endif
    </div>
    @endforeach
    
    <form action='?' method='POST'>
        @csrf
        <button formaction='/add_set/{{ $game->id }}'>セット追加</button>
    </form>

    
</x-app-layout>
    