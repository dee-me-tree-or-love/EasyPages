@extends('layouts.master')
@if(Auth::guest())
    @section('caption')
        WHY ARE YOU EVEN HERE?!
    @endsection
    
    @section('main_content')
    <div>
        <h1>Please, leave immediately.</h1>
    </div>
    @endsection
    
@else
    @section('caption')
        HELLO, {{Auth::user()->getprofile()->fname}}
    @endsection

    @section('main_content')
    <div style='text-align: left; margin-top: 30pt;'>
    <div id="profile_desc" style="border-bottom: 1px #1b6d85 solid; padding-bottom: 10pt;">
        <h4 style="color: #a4aaae;">This is your profile:</h4>

        <script>
            function ShowEditBanner() {
                if (document.getElementById('editbanner').style.display == 'none') {
                    document.getElementById('editbanner').style.display = 'block';
                    document.getElementById('static_profile_data').style.display = 'none';
                }
                return false;
            }
            function HideEditBanner() {
                if (document.getElementById('editbanner').style.display == 'block') {
                    document.getElementById('editbanner').style.display = 'none';
                    document.getElementById('static_profile_data').style.display = 'block';
                }
                return false;
            }
        </script>


        @include('profiledashboard.editprofile')
        <div id='static_profile_data' style='display: block'>
            <h4 style="color: #a4aaae; font-size: 10pt; text-align: right;"><a id="myLink" href="javascript:ShowEditBanner();">EDIT</a></h4>

            <h2>
                Name: {{Auth::user()->getsayan()->fname}} {{Auth::user()->getsayan()->lname}}
                <h4>Date of birth: {{Auth::user()->getsayan()->dob}}</h4>
            </h2>
            <h2>
                <i>Gender: {{Auth::user()->getsayan()->sex}}</i>
            </h2>
        </div>
    </div>
    <div id="reviewlist_desc" style="border-bottom: 1px #1b6d85 solid; margin-top: 20pt; padding-bottom: 10pt;">
        <h4 style="color: #a4aaae;">These are your reviews:</h4>

        @if(null == Auth::user()->getsayan()->getreviews())
        @include('profiledashboard.noReviewsSoFar')
        @else
        @include('profiledashboard.allreviews', ['reviews' => Auth::user()->getsayan()->getreviews()])
        @endif
    </div>
</div>
    @endsection
@endif