<div id="editbanner" style='display: none;'>
    
    <form id="newcompany" action="{{ url('/updatecompany') }}" method="POST" class="form">

                        <div>
                            {{ csrf_field() }}
                        </div>



                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>

                            <div>
                                <input type="text" name="name" id="name" value='{{Auth::user()->getsayan()->name}}'>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="website" class="control-label">Website</label>

                            <div>
                                <input type="text" name="website" id="website" value='{{Auth::user()->getsayan()->website}}'>
                            </div>
                        </div>

                        <h4 style="text-align: left;">Describe your company</h4>
                        <textarea style="max-height: 10vw; width: 37.5vw; height: 60pt" name="description" form="newcompany"> {{Auth::user()->getsayan()->description}}
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
    
    
    
    <!-- EDIT BANNER CLOSE -->
    <h4 style="color: #a4aaae; font-size: 10pt; text-align: right;">
        <a id="myLink" href="javascript:HideEditBanner();">
            CLOSE
        </a>
    </h4>
</div>