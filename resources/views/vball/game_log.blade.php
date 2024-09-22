<x-app-layout>
    
    
    <div>
        <form action='/games' method='POST'>
            @csrf
            <input type='text' name='game[name]'>大会名</input>
            <select name='game[school_id]'>
                <option value="" disabled selected>対戦相手</option>
                @foreach($schools as $s )
                    <option value={{ $s->id }}>{{ $s->name }}</option>
                @endforeach
            </select>
            <input type='date' name='game[date]'>
            <input type='submit'>
        </form>
    </div>
    
    
    <div>
        @if(isset($games)==true)
            @foreach($games as $g)
                <a href='/match/{{ $g->id }}/point'>
                    <div class='m-5'>
                        <p>{{ $g->name }}</p>
                        <p>vs{{ $g->school->name }}</p>
                        <p>{{ $g->date }}</p>
                        <p>{{ $g->my_score }}-{{ $g->op_score}}</p>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
    

</x-app-layout>
    