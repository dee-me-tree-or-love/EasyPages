<div id="editbanner" style='display: none;'>
    
    <form id="editprofile" action="{{ url('/updateprofile') }}" method="POST" class="form">

                        <div>
                            {{ csrf_field() }}
                        </div>



                        <div class="form-group">
                            <label for="fname" class="control-label">First name</label>

                            <div>
                                <input type="text" name="fname" id="fname" value='{{Auth::user()->getsayan()->fname}}'>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="lname" class="control-label">Last name</label>

                            <div>
                                <input type="text" name="lname" id="lname" value='{{Auth::user()->getsayan()->lname}}'>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dob" class="control-label">Date of birth</label>

                            <div>
                                <input type="date" name="dob" id="dob" value='{{Auth::user()->getsayan()->dob}}'>
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
    
    
    
    <!-- EDIT BANNER CLOSE -->
    <h4 style="color: #a4aaae; font-size: 10pt; text-align: right;">
        <a id="myLink" href="javascript:HideEditBanner();">
            CLOSE
        </a>
    </h4>
</div>