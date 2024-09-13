<x-app-layout>
    
    <div>
        <a href='/match/{}'>
        
        @if(isset($games)==true)
        @foreach($games as $g)
            <div class='m-5'>
                <p>{{ $g->name }}</p>
                <p>vs{{ $g->school->name }}</p>
                <p>{{ $g->date }}</p>
                <p>{{ $g->my_score }}-{{ $g->op_score}}</p>
            </div>
        @endforeach
        @endif
    </div>
    
    
    
    
    
</x-app-layout>
    