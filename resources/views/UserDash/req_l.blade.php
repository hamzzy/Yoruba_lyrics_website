@extends('layouts.app')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lyrics Update request</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>
                            username
                        </th>
                        <th>
                            lyric_update
                        </th>
                        <th>
                            Reason
                        </th>
                        <th>
                            Status
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <td>
                            Herman Beck
                        </td>

                        <td>
                            $ 77.99
                        </td>
                        <td>
                            May 15, 2015
                        </td>
                        <td>
                            accepted
                        </td>
                    </tr>



                    </tbody>
                </table>
            </div>
        </div>
    </div>



    @endsection