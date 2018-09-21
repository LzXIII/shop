@extends ('template.shop')
@section ('content')
  {!! Form::open((['url'=>'buyandstore'])) !!}
  {!! Form::label('name','Nome') !!}
  {!! Form::text('name')!!}
  <br/>
  {!! Form::label('surname','Cognome') !!}
  {!! Form::text('surname')!!}
  <br/>
  {!! Form::label('email','E-Mail') !!}
  {!! Form::text('email')!!}
  <br/>
  <br/>
  {!!Form::submit('Invia')!!}

        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif --}}

  {!! Form::close() !!}
