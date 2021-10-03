@include('front.index')
@section('title')
    All Projects
@endsection

<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success text-center my-5">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="card m-5">
        <div class="card-header">Create Cubon</div>
        <div class="card-body">
            <form class="" id="cubonform" action="{{ route('storeCubon') }}" method="post">
                @csrf
                <input type="text" value="{{ $id }}" hidden name="course_id">
                <div class="form-group d-flex">
                    <label for="startDate" id="" class="label-control">Start Date</label>
                    <input type="date" class="form-control" name="startDate" id="startDate">
                </div>
                @error('startDate')
                    <div class="alert alert-danger text-center">
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div>
                @enderror

                
                <div class="form-group d-flex">
                    <label for="endDate" id="" class="label-control">End Date</label>
                    <input type="date" class="form-control" name="endDate" id="endDate">
                </div>

                @error('endDate')
                    <div class="alert alert-danger text-center">
                        <span  role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div>
                @enderror
                <div class="form-group d-flex align-items-center">
                    <label for="code" id="" class="label-control d-flex">Coubon</label>
                    <input type="text" class="form-control ml-1" placeholder="Generate Or type" name="code" id="code">
                    <span class="btn  btn-info" id="generateCubon">Generate</span>
                </div>

                @error('code')
                    <div class="alert alert-danger text-center">
                        <span  role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div>
                @enderror

                
                <div class="form-group d-flex">
                    <label for="User" id="" class="label-control">Number</label>
                    <input type="number" class="form-control ml-1" name="number" id="User">
                </div>

                @error('number')
                <div class="alert alert-danger text-center">
                    <span  role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </div>
            @enderror
                <div class="form-group d-flex">
                    <input type="submit" class="btn btn-info" value="submit">
                </div>
            </form>
        </div>
    </div>
</div>

@include('front.layouts.foot')