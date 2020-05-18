@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="container">
        @include('layouts.partials.flash')
        <div class="row">
            <div class="col-md-8">

                <div class="leave-comment mr0"><!--leave comment-->

                    <h3 class="text-uppercase">Login</h3>
                    <br>
                    <form class="form-horizontal contact-form" role="form" method="post" action="/login">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="email" name="email"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn send-btn">Login</button>

                    </form>
                </div><!--end leave comment-->
            </div>
            @include('layouts.partials.app-sidebar')
        </div>
    </div>
</div>
@endsection
