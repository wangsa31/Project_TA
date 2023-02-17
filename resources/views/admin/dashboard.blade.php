 @extends('master')


@section('notification')
    @if (session('success')) 
        <div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="alert-titles"  >
                <i class=" icon material-icons">check_circle</i>
                <span>{{session('success')}}</span> 
            </div>
        </div>
    @endif

    @if (session('failed')) 
        <div class="alert bg-red alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="alert-titles"  >
                <i class=" icon material-icons">check_circle</i>
                <span>{{session('failed')}}</span> 
            </div>
        </div>
    @endif
@endsection

@section('account')
{{Auth::user()->name}}
@endsection

@section('email')
{{Auth::user()->email}}
@endsection

@section('title')
    Dashboards
@endsection

@section('content')
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="info-box bg-pink hover-expand-effect">
        <div class="icon">
            <i class="material-icons">people</i>
        </div>
        <div class="content">
            <div class="text">KARYAWAN</div>
            <div class="number count-to" data-from="0" data-to="{{ $count_kar }}" data-speed="15" data-fresh-interval="20"></div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
        <div class="icon">
            <i class="material-icons">assignment_ind</i>
        </div>
        <div class="content">
            <div class="text">DEPARTEMEN</div>
            <div class="number count-to" data-from="0" data-to="{{$count_dept}}" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Aturan Fuzzy
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center">Aturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>C1 Baik AND C2 baik AND C3 baik AND C4 baik AND C5 baik AND C6 baik AND C7 baik AND C8 baik THEN baik</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>C1 buruk AND C2 buruk AND C3 buruk AND C4 buruk AND C5 buruk AND C6 buruk AND C7 buruk AND C8 buruk THEN buruk</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>C1 baik AND C2 baik AND C3 baik AND C4 baik AND C5 buruk AND C6 buruk AND C7 buruk AND C8 baik THEN baik</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>C1 buruk AND C2 baik AND C3 buruk AND C4 baik AND C5 buruk AND C6 buruk AND C7 buruk AND C8 buruk THEN buruk</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>C1 baik AND C2 baik AND C3 baik AND C4 baik AND C5 buruk AND C6 buruk AND C7 buruk AND C8 buruk THEN buruk</td>
                        </tr>

                        <tr>
                            <th scope="row">6</th>
                            <td>C1 baik AND C2 buruk AND C3 baik AND C4 baik AND C5 buruk AND C6 buruk AND C7 buruk AND C8 buruk THEN buruk</td>
                        </tr>

                        <tr>
                            <th scope="row">7</th>
                            <td>C1 baik AND C2 buruk AND C3 baik AND C4 baik AND C5 buruk AND C6 buruk AND C7 buruk AND C8 buruk THEN buruk</td>
                        </tr>

                        <tr>
                            <th scope="row">8</th>
                            <td>C1 baik AND C2 buruk AND C3 baik AND C4 baik AND C5 baik AND C6 baik AND C7 buruk AND C8 buruk THEN baik</td>
                        </tr>

                        <tr>
                            <th scope="row">9</th>
                            <td>C1 buruk AND C2 buruk AND C3 buruk AND C4 buruk AND C5 buruk AND C6 baik AND C7 baik AND C8 baik THEN buruk</td>
                        </tr>

                        <tr>
                            <th scope="row">10</th>
                            <td>C1 buruk AND C2 buruk AND C3 buruk AND C4 buruk AND C5 baik AND C6 baik AND C7 baik AND C8 baik THEN baik</td>
                        </tr>

                        <tr>
                            <th scope="row">11</th>
                            <td>C1 buruk AND C2 buruk AND C3 baik AND C4 baik AND C5 baik AND C6 buruk AND C7 buruk AND C8 buruk THEN buruk</td>
                        </tr>

                        <tr>
                            <th scope="row">12</th>
                            <td>C1 baik AND C2 baik AND C3 baik AND C4 baik AND C5 baik AND C6 baik AND C7 buruk AND C8 buruk THEN buruk</td>
                        </tr>

                        <tr>
                            <th scope="row">13</th>
                            <td>C1 buruk AND C2 baik AND C3 buruk AND C4 baik AND C5 buruk AND C6 baik AND C7 buruk AND C8 baik THEN baik</td>
                        </tr>

                        <tr>
                            <th scope="row">14</th>
                            <td>C1 buruk AND C2 buruk AND C3 baik AND C4 baik AND C5 baik AND C6 buruk AND C7 baik AND C8 baik THEN baik</td>
                        </tr>

                        <tr>
                            <th scope="row">15</th>
                            <td>C1 buruk AND C2 buruk AND C3 buruk AND C4 baik AND C5 baik AND C6 buruk AND C7 buruk AND C8 baik THEN buruk</td>
                        </tr>

                        <tr>
                            <th scope="row">16</th>
                            <td>C1 baik AND C2 baik AND C3 baik AND C4 baik AND C5 buruk AND C6 baik AND C7 baik AND C8 baik THEN baik</td>
                        </tr>

                        <tr>
                            <th scope="row">17</th>
                            <td>C1 baik AND C2 buruk AND C3 baik AND C4 buruk AND C5 buruk AND C6 buruk AND C7 buruk AND C8 baik THEN buruk</td>
                        </tr>

                        <tr>
                            <th scope="row">18</th>
                            <td>C1 buruk AND C2 buruk AND C3 buruk AND C4 buruk AND C5 buruk AND C6 baik AND C7 buruk AND C8 buruk THEN buruk</td>
                        </tr>

                        <tr>
                            <th scope="row">19</th>
                            <td>C1 baik AND C2 baik AND C3 baik AND C4 baik AND C5 buruk AND C6 buruk AND C7 buruk AND C8 baik THEN buruk</td>
                        </tr>

                        <tr>
                            <th scope="row">20</th>
                            <td>C1 baik AND C2 buruk AND C3 baik AND C4 buruk AND C5 buruk AND C6 buruk AND C7 buruk AND C8 buruk THEN baik</td>
                        </tr>

                        <tr>
                            <th scope="row">21</th>
                            <td>C1 buruk AND C2 buruk AND C3 baik AND C4 baik AND C5 buruk AND C6 buruk AND C7 baik AND C8 baik THEN buruk</td>
                        </tr>

                        <tr>
                            <th scope="row">22</th>
                            <td>C1 baik AND C2 baik AND C3 buruk AND C4 buruk AND C5 baik AND C6 baik AND C7 buruk AND C8 buruk THEN baik</td>
                        </tr>

                        <tr>
                            <th scope="row">23</th>
                            <td>C1 buruk AND C2 buruk AND C3 buruk AND C4 buruk AND C5 buruk AND C6 buruk AND C7 baik AND C8 baik THEN buruk</td>
                        </tr>

                        <tr>
                            <th scope="row">24</th>
                            <td>C1 baik AND C2 baik AND C3 baik AND C4 baik AND C5 baik AND C6 baik AND C7 baik AND C8 buruk THEN baik</td>
                        </tr>

                        <tr>
                            <th scope="row">25</th>
                            <td>C1 baik AND C2 buruk AND C3 baik AND C4 buruk AND C5 baik AND C6 buruk AND C7 baik AND C8 buruk THEN baik</td>
                        </tr>
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection 

@section('js')
<script src="{{ asset('assets/js/pages/index.js') }} "></script>
@endsection
