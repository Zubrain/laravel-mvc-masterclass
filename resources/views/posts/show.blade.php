<h1>{{ $post['title'] }}</h1>
<p>{{ $post['content'] }}</p>

@isset($record)
    Do something
@endisset

@error('title')
    <p>{{ $message }}</p>
@enderror