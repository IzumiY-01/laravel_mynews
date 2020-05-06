@extends('layouts.front')

@section('content')
    <div class="container">
        @if (!is_null($profiles))
         <div class = "row">
             <div class="profiles col-md-10 mx-auto">
                <h2>PROFILE</h2>
                @foreach($profiles as $profile)
                    <hr color="#c0c0c0">
                    <div class = "profile">
                        <div class ="form-group row">
                            <label class="col-md-2">氏名</label>
                            <div class="text col-md-6">
                                 <div class="name">
                                     {{ str_limit($profile->name, 150) }}
                                 </div>
                            </div>
                        </div>
                        
                        <div class ="form-group row">
                            <label class="col-md-2">性別</label>
                            <div class="text col-md-6">
                                 <div class="gender">
                                     {{ str_limit($profile->gender, 150) }}
                                 </div>
                            </div>
                        </div>
                        
                        <div class ="form-group row">
                            <label class="col-md-2">趣味</label>
                            <div class="text col-md-6">
                                 <div class="hobby">
                                     {{ str_limit($profile->hobby, 1500) }}
                                 </div>
                            </div>
                        </div>
                        
                        <div class ="form-group row">
                            <label class="col-md-2">自己紹介</label>
                            <div class="text col-md-6">
                                 <div class="introduction">
                                     {{ str_limit($profile->introduction, 1500) }}
                                 </div>
                            </div>
                        </div>
                    </div>
                @endforeach
             </div>
         </div>
         @endif
         </hr>
    </div>
@endsection
    