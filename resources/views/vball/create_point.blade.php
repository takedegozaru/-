<x-app-layout>
    
    <div>
        
        <form action='/point' method='POST'>
            @csrf
            <!--<input type='radio' name='reason_id' value='1'>スパイク</input>-->
            <!--<br>-->
            <!--<input type='radio' name='reason_id' value='2'>ブロック</input>        -->
            <!--<br>-->
            <!--<input type='radio' name='reason_id' value='3'>サービスエース</input>-->
            <!--<br>-->
            
            <input type='number' name='point[player_id]'>背番号</input>
            
            <input type='text' name='point[text]'>備考欄</input>
            
            <input type='number' name='point[point_number]'>点数</input>
            
            <input type='submit'></input>
        </form>
    </div>
    
    <div>
        @if(isset($points)==true)
        @foreach($points as $tensu)
            <div class='m-5'>
                <p>{{ $tensu->point_number }}</p>
                <p>{{ $tensu->text }}</p>
            </div>
        @endforeach
        @endif
    </div>
    
    
    
    
    
</x-app-layout>
    