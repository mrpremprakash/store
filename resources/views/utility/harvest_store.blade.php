@extends('layouts.main_layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div>Store</div>
                    <div class="pull-right" style="margin-top: -15px;">
                        <?php echo $shop;?>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                          @if(Session::has('alert-' . $msg))

                          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                          @endif
                        @endforeach
                    </div> <!-- end .flash-message -->
                    <form class="form-horizontal" role="form" method="POST" id="add_store_form" action="{{ url('/harvest_store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="city_name" id="city_name">
                        <div class="form-group{{ $errors->has('store_name') ? ' has-error' : '' }}">
                            <label for="store_name" class="col-md-4 control-label">Keyword</label>

                            <div class="col-md-6">
                                <input id="store_name" type="text" class="form-control" name="store_name" value="{{ old('store_name') }}" autofocus placeholder="e.g medical stores in pandav nagar new delhi">
                                @if ($errors->has('store_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('store_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
