@extends('layouts.app')

@section('content')


    <div class="row" id="app">
        <div class="col-md-6 grid-margin" >

         <profile-form name=" {{ Auth::user()->name}}" email="{{Auth::user()->email}}" >

         </profile-form>


        </div>

        <div class="col-md-6 grid-margin ">
            <div class="card">
                <img src="" alt="">
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Change password</h4>

                    <form class="forms-sample">
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
