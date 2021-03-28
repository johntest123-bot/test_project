@extends('layouts.app') 
@section('content')
<div>
    {!!html_entity_decode($post->content)!!}
</div>
@endsection
