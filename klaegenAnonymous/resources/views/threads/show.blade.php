@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ $thread->title }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <div class="panel-body">
                     {{ $thread->body }}
                     
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
           
               @foreach ($thread->replies as $reply)
               <div class="card">
           

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <div class="panel-body">
                     {{ $reply->body }}
                     <div> {{$reply->created_at->diffForHumans()}} by <a href="#">{{$reply->owner->name}}</a> </div>
                  </div>
                </div>
            </div>
                @endforeach
            
        </div>
    </div>
</div>
@endsection
