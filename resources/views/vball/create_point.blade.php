<x-app-layout>
    
    <p>{{$game->name}}</p>
    
    @foreach($game->sets as $set)
    <p>第{{ $set->set_number }}セット</p>
    
    <div class="flex m-5">
        <div class="m-5">
            <h2>自分チーム</h2>
            <!--現在の点数-->
            <form action='?' method='POST'>
                @csrf
                <input type='number' name='point[player_id]'>背番号</input>
                
                <input type='text' name='point[text]'>備考欄</input>
                
                <p>{{ $set->my_points }}点目</p>
                <input type='hidden' name='point[point_number]' value={{ $set->my_points+1 }}></input>
                
                <select name='point[reason_id]'>
                    <option value="" disabled selected>理由選択</option>
                        
                    @foreach($reasons as $r )
                        <option value={{ $r->id }}>{{ $r->name }}</option>
                    @endforeach
                </select>
                
                <input formaction='/match/{{ $set->id }}/point/{{ $set->game->user_id }}' type='submit'></input>
            </form>
        </div>
        
        
        <div class="m-5">
            <h2>相手チーム</h2>
            <form action='?' method='POST'>
                @csrf
                <input type='number' name='point[player_id]'>背番号</input>
                
                <input type='text' name='point[text]'>備考欄</input>
                
                <p>{{ $set->op_points }}点目</p>
                <input type='hidden' name='point[point_number]' value={{ $set->op_points+1 }}></input>
                
                <select name='point[reason_id]'>
                    <option value="" disabled selected>理由選択</option>
                        
                    @foreach($reasons as $r )
                        <option value={{ $r->id }}>{{ $r->name }}</option>
                    @endforeach
                </select>
                
                <input formaction='/match/{{ $set->id }}/point/{{ $set->game->school_id }}' type='submit'></input>
            </form>
        </div>
    </div>
    
    <div class="flex flex-col justify-center items-center">
        @if(isset($set->points)==true)
        @foreach($set->points as $tensu)
            <div class='m-5'>
                <p>{{ $tensu->school->name}}</p>
                <p>{{ $tensu->point_number}}</p>
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
    