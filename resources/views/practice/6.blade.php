<h1>Custom validation example</h1>

<p>
    The following field will only accept alpha characters and spaces. Will fail if any other special symbols are used.
</p>

<form action='/practice/6'>

    <label for='name'>Name:</label>
    <input type='text' id='name' name='name' value='{{ old('name') }}'>

    <input type='submit'>

</form>

@if(count($errors->get('name')) > 0)
    <ul>
        @foreach ($errors->get('name') as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@elseif($name)
    Passed: <strong>{{ $name }}</strong>
@endif
