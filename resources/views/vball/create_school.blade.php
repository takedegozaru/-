<x-app-layout>
    <div>
        <h2>チーム登録</h2>
        <form action=/member method='POST'>
            @csrf
            <input type='text' name='school[name]'>
            <input type='checkbox' name='auto_member'>メンバーの自動生成</input>
            <input type='submit'>
        </form>
        <div>
            <h2>チーム一覧</h2>
            @foreach($schools as $s )
                <a href='school/{{$s->id}}/member'>
                <option value={{ $s->id }}>{{ $s->name }}</option>
            @endforeach
        </div>
    </div>
</x-app-layout>
