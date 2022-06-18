@extends('layouts.menu')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="{{ asset('css/layout.css') }}" rel="stylesheet">
<link href="{{ asset('css/mobile_menu.css') }}" rel="stylesheet">


<div class="container-fluid" style="display:flex; margin-top:30px; margin-bottom:15px">
    <h3><a href="{{ route ('black') }}">Black Metal |</a></h3>
    <h3><a href="{{ route ('death') }}">| Death Metal |</a></h3>
    <h3><a href="{{ route ('doom') }}">| Doom Metal |</a></h3>
    <h3><a href="{{ route ('autre') }}">| Autre</a></h3>
</div>

<div class="container-fluid">
    <form>
        <input style="width:80%;" name="band" id="band" placeholder="Tapez le nom du groupe que vous souhaitez rechercher" autofocus />
    </form>
    
</div>
<br />
<div id="success" class="mt-8">

</div>


<div id="fail" class="mt-8" style="display:none; margin-left:15px;">
    <h4>Aucun article ne correspond à votre recherche.</h4>
</div>

<script>
    $(document).ready(function () {
        $("#band").keypress(function(){
            $('#success').html('');
            var groupe = $(this).val();
            // console.log(groupe);
            if (groupe){
                $.ajax({
                    type:"GET",
                    url:'{{ route("searchband") }}',
                    data:'band='+ encodeURIComponent(groupe),
                    success: function(data){
                        if(data.length > 500){
                            //$('#band').val('');
                            // console.log(data.length);
                            $('#success').append(data);
                        }else{
                            //console.log(fail);
                            $('#fail').css('display','block').delay(400);
                            setTimeout(function(){$('#fail').fadeOut()},3000);
                        }
                    }
                });
            }
        });
    });
</script>

@endsection