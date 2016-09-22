@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>HELLO!</h1> </div>

                <div class="panel-body">
                    <h4>Please, tell us more about your company</h4>

                    <br/>
                    <!-- New Profile Form -->


                    <form id="newcompany" action="{{ url('/initcompany') }}" method="POST" class="form">

                        <div>
                            {{ csrf_field() }}
                            <input type="hidden"  name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        </div>



                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>

                            <div>
                                <input type="text" name="name" id="name">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="website" class="control-label">Website</label>

                            <div>
                                <input type="text" name="website" id="website">
                            </div>
                        </div>

                        <h4 style="text-align: left;">Describe your company</h4>
                        <textarea style="max-height: 10vw; width: 37.5vw; height: 60pt" name="description" form="newcompany"> 
                        </textarea>
                        
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
