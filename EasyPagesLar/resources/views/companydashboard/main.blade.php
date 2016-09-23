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
HELLO, {{Auth::user()->username}}

@endsection


@section('main_content')
<div style='text-align: left; margin-top: 30pt;'>
    <div id="company_desc" style="border-bottom: 1px #1b6d85 solid; padding-bottom: 10pt;">
        <h4 style="color: #a4aaae;">This is your company:</h4>
        
        <script>
            function ShowEditBanner() {
                if (document.getElementById('editbanner').style.display == 'none') {
                    document.getElementById('editbanner').style.display = 'block';
                    document.getElementById('static_company_data').style.display = 'none';
                }
                return false;
            }
            function HideEditBanner() {
                if (document.getElementById('editbanner').style.display == 'block') {
                    document.getElementById('editbanner').style.display = 'none';
                    document.getElementById('static_company_data').style.display = 'block';
                }
                return false;
            }
        </script>
        
        <h4 style="color: #a4aaae; font-size: 10pt; text-align: right;"><a id="myLink" href="javascript:ShowEditBanner();">EDIT</a></h4>

        @include('companydashboard.companyeditbanner')
        <div id='static_company_data' style='display: block'>
        <h2>
            {{Auth::user()->getsayan()->name}}
            <h4><a href="{{Auth::user()->getsayan()->website}}">{{Auth::user()->getsayan()->website}}</a></h4>
        </h2>
        <h2>
            <i>"{{Auth::user()->getsayan()->description}}"</i>
        </h2>
        </div>
    </div>

    <div id="servicelist_desc" style="border-bottom: 1px #1b6d85 solid; margin-top: 20pt; padding-bottom: 10pt;">
        <h4 style="color: #a4aaae;">These are your services:</h4>
        <h4 style="color: #a4aaae; font-size: 10pt; text-align: right;"><i>{Not yet active}</i> ADD</h4>

        @include('companydashboard.newserviceform')

        @if(null == Auth::user()->getsayan()->getservices())
        @include('companydashboard.noServicesSoFar')
        @else
        @include('companydashboard.topservices', ['services' => Auth::user()->getsayan()->getservices()])
        @endif
    </div>
</div>




@endsection
@endif