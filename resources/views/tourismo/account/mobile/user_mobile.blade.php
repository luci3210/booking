@extends('layouts.tourismo.ui_mobile')
<link href="{{ asset('css/home_index.css') }}" rel="stylesheet">

<style>
    #card-point{
        display: none;
    }
    .mobile-nav-icon{
        display: none;
    }
    .spacer-1{
        display: none;
    }
    #main {
        margin-top: 15px!important;
    }
    .btn-color {
        background-color: #392458!important;
        border-radius: 5px!important;
    }
</style>
@section('content')

<div class="px-1">
    <form action="{{ route('accnt_profile_update',$data['data']['account'][0]->id) }}" method="post" role="form" class="uk-form-stacked" uk-grid>
        @method('patch')
        @csrf
        <div class="uk-width-1-1">
            <label class="uk-form-label" for="name"><span class="text-danger">*</span>Display Name</label>
            <div class="uk-form-controls">
                <input class="uk-input"  type="text" name="name" id="name" value="{{ $data['data']['account'][0]->name }}" placeholder="Display Name">
                <div class="validate uk-text-danger uk-text-small">{{ $errors->has('fname') ?  $errors->first('fname') : '' }}</div>

            </div>
        </div>
        <!-- /.Dname -->
        <div class="uk-width-1-1 mt-1">
            <label class="uk-form-label" for="lname"><span class="text-danger">*</span>Last Name</label>
            <div class="uk-form-controls">
                <input class="uk-input"  type="text" name="lname" id="lname" value="{{ $data['data']['account'][0]->lname }}" placeholder="Last Name">
                <div class="validate uk-text-danger uk-text-small">{{ $errors->has('lname') ?  $errors->first('lname') : '' }}</div>
            </div>
        </div>
        <!-- lname -->
        <div class="uk-width-1-2 mt-1">
            <label class="uk-form-label" for="fname"><span class="text-danger">*</span>First Name</label>
            <div class="uk-form-controls">
                <input class="uk-input"  type="text" name="fname" id="fname" value="{{ $data['data']['account'][0]->fname }}" placeholder="First Name">
                <div class="validate uk-text-danger uk-text-small">{{ $errors->has('fname') ?  $errors->first('fname') : '' }}</div>
            </div>
        </div>
        <!-- fname -->
        <div class="uk-width-1-2 mt-1">
            <label class="uk-form-label" for="mname"><span class="text-danger">*</span>Middle Name</label>
            <div class="uk-form-controls">
                <input class="uk-input"  type="text" name="mname" id="mname" value="{{ $data['data']['account'][0]->mname }}" placeholder="Middle Name">
                <div class="validate uk-text-danger uk-text-small">{{ $errors->has('mname') ?  $errors->first('mname') : '' }}</div>
            </div>
        </div>
        <!-- fname -->
        <div class="uk-width-1-2 mt-1">
            <label class="uk-form-label" for="country"><span class="uk-text-danger">*</span>Country</label>
            <div class="uk-form-controls">
                <select class="uk-select" name="country" id="country">
                <option value="" >
                    select country...
                </option>
                @if($data['data']['country'])
                    @foreach($data['data']['country'] as $info)
                
                        @if($data['data']['account'][0]->country  == $info->id)
                        <option value="{{$info->id}}"  selected>
                            {{ $info->country }}
                        </option>
                        @else
                        <option value="{{$info->id}}"  >
                            {{ $info->country }}
                        </option>
                        @endif
                    @endforeach
                @endif
                </select>
                <div class="validate uk-text-danger uk-text-small">{{ $errors->has('country') ?  $errors->first('country') : '' }}</div>
            </div>
        </div>
        <!-- country -->
        <div class="uk-width-1-2 mt-1">
            <label class="uk-form-label" for="pnumber"><span class="uk-text-danger">*</span>Phone Number</label>
            <div class="uk-form-controls">
                <input type="text" class="uk-input" name="pnumber" id="pnumber" value="{{ $data['data']['account'][0]->pnumber }}" placeholder="Phone Number">
                <div class="validate uk-text-danger uk-text-small">{{ $errors->has('pnumber') ?  $errors->first('pnumber') : '' }}</div>
            </div>
        </div>
        <!-- pnumber -->
        <div class="uk-width-1-1 mt-1">
            <label class="uk-form-label" for="bdate"><span class="uk-text-danger">*</span>Birthdate</label>
            <div class="uk-form-controls">
                <input type="date" class="uk-input" name="bdate" id="bdate" value="{{ $data['data']['account'][0]->bdate }}" placeholder="Birthdate">
                <div class="validate uk-text-danger uk-text-small">{{ $errors->has('bdate') ?  $errors->first('bdate') : '' }}</div>
            </div>
        </div>
        <!-- bdate -->
        <div class="uk-width-1-1 mt-1">
            <label class="uk-form-label" for="address"><span class="uk-text-danger">*</span>Address</label>
            <div class="uk-form-controls">
                <input type="text" class="uk-input" name="address" id="address" value="{{ $data['data']['account'][0]->address }}" placeholder="Address">
                <div class="validate uk-text-danger uk-text-small">{{ $errors->has('address') ?  $errors->first('address') : '' }}</div>
            </div>
        </div>
        <!-- bdate -->
        <div class="d-grid gap-2 col-8 mx-auto mt-3">
        <button class="btn btn-primary btn-color" type="submit">Update</button>
        </div>
     </form>
</div>

@endsection

@section('js')
@endsection
