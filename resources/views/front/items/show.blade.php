@include('front.index')
@section('title')
    All Projects
@endsection
<div class='container'>
    <div class="row" style='margin-top:100px'>
        <div class='col-md-6 col-12'>
            <div class='work-card' style="background: #fff">
                <div class='heading'>
                    <p>Work Card</p>
                    <hr class="custom-hr">
                </div>
                <div class="body-work-card">
                    <div class='likes'>
                        <p>#Likes</p>
                        <span class="" style="margin-left:34px">{{$item->Likes}}</span>
                    </div>
                    <div class='likes'>
                        <p>#Views</p>
                        <span class="" style="margin-left:26px">{{$item->Views}}</span>
                    </div>
                    <div class='likes'>
                        <p>added Date</p>
                        <span>{{$item->start_time}}</span>
                    </div>
                    <div class='likes'>
                        <p>Finish Date</p>
                        <span>{{$item->end_time}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-6 col-12 work-details'>
            <div class="heading-work-details">
                <p>Work Details</p>
            </div>
            <div class="work-details-body">
                <img src="{{asset('images/Items/'.$item->photo)}}" class='col-sm-12'>
            </div>
            <div class='work-description'>
                <p>
                    {{$item->details}}
                </p>
            </div>
        </div>
        <div class='col-md-6 col-12'>
            <div class='work-card2' style="background: #fff">
                <div class='heading'>
                    <p>skills</p>
                    <hr class="custom-hr">
                </div>
                <div class="body-work-card">
                    <div class='skills'>
                        <?php 
                            $skills = explode('_' , $item->skills);   
                            array_pop($skills);
                        ?>
                        @foreach ($skills as $skill)
                            <h4 style="display: inline-block"><span class="badge badge-secondary">{{$skill}}</span></h4>
                        @endforeach
                    </div>
                </div>
            </div> 
        </div>
        
        <div class="buttonView text-center">
            <a href="{{$item->rul}}" class='btn btn-success'>Show Link</a>
            <a href="#" class="btn btn-success" id="like-My">Like My</a>
            <input type="text" value="{{$item->ID}}" hidden id="hiddenID" name="hiddenID">
        </div>
    </div>
    <div class="row">
    <div class='col-sm-4'>
        <div class='work-card2' style="background: #fff">
            <div class='heading'>
                <p>Share Work</p>
                <hr class="custom-hr">
            </div>
            <div class="body-work-card">
                <div class='likes text-center'>
                    <div class="bnt btn-light shwolink">{{url()->current()}}</div>
                </div>
                <div class="text-center">
                    <span class="btn btn-primary">
                        Facebook
                    </span>
                    <span class="btn btn-info">
                        LinkedIn
                    </span>
                    <span class="btn btn-success">
                        Twitter
                    </span>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script>
    $(function(){
        $('#like-My').click(function(){
            $.ajax({
                url : "{{route('Increament')}}",
                type :'post',
                data :{
                    '_token' : "{{csrf_token()}}",
                    'ID' :$("input[name='hiddenID']").val(),
                },
                cache:false,
                success:function(one , two){
                    console.log(one);
                    if(one==-1){
                        $('#like-My').attr('disabled', true);
                    }else{

                    }
                    console.log(two);
                },
                error:function(one , two){
                    console.log(one);
                    console.log("Error");
                    console.log(two);
                },
            });
            location.reload();
        });
    });
</script>