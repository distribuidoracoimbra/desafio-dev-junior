
@if(\Session::get('type'))
    <div class="alert alert-{{\Session::get('type')}} alert-dismissible ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {!!\Session::get('message')!!}
    </div>
    {{\Session::forget('type')}}
   {{\Session::forget('message')}}

@endif
