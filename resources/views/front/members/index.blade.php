@include('front.index')
@section('title')
    All Programmers
@endsection
<div class='container'>
    <div class='row'>
        <?php $x=5?>
        @while ($x--)
            <div class='col-sm-3'>
                <h1>Hello World</h1>
            </div>
        @endwhile
    </div>
</div>