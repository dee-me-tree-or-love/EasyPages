@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>HELLO!</h1> </div>

                <div class="panel-body">
                    <h4>Please, tell us more about yourself</h4>

                    <br/>
                    <!-- New Profile Form -->


                    <form id="newprofile" action="{{ url('/initprofile') }}" method="POST" class="form">

                        <div>
                            {{ csrf_field() }}
                            <input type="hidden"  name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        </div>



                        <div class="form-group">
                            <label for="fname" class="control-label">First Name</label>

                            <div>
                                <input type="text" name="fname" id="fname">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="lname" class="control-label">Last Name</label>

                            <div>
                                <input type="text" name="lname" id="lname">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dob" class="control-label">Date of Birth</label>

                            <div>
                                <input type="date" name="dob" id="dob" max="2005-12-31">
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="control-label">Gender</label>

                            <div>
                                <label class="control-label">Secret
                                    <input type="radio" name="sex" id="secret" value="s" data-role="none" class="required" checked>
                                </label>
                                <br/>
                                <label class="control-label">Female
                                    <input type="radio" name="sex" id="female" value="f" data-role="none">
                                </label>
                                <br/>
                                <label class="control-label">Male
                                    <input type="radio" name="sex" id="male" value="m" data-role="none">
                                </label>
                            </div>
                        </div>
                        
                        <!-- Save Button -->
                        <div>
                            <div>
                                <button type="submit" class="btn btn-default">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>



                    <!-- End of the form -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
