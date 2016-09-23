<!-- New Review Form -->
    <h5 style="text-align: right;">{{ Auth::user()->username }}</h5>
   
    <form id="newreview" action="{{ url('/newreview') }}" method="POST" class="form-horizontal">
        <table style="width: 20vw; margin: auto;">
            <div>
                {{ csrf_field() }}
                <input type="hidden"  name="profile_id" id="profile_id" value="{{Auth::user()->getprofile()->profile_id}}">
            </div>
            <div>
                <input type="hidden" name="service_id" id="service_id" value="{{$service->service_id}}">
            </div>

            <!-- Review Rating -->
            <tr>

            <div class="form-group">
                <td>
                    <label for="review-title" class="control-label">Rating</label>
                </td>
                <td>
                    <div>
                        <input type="number" name="rating" id="rating" min="1" max="10">
                    </div>
                </td>
            </div>
            </tr>

            <!-- Review Title -->
            <tr>
            <div class="form-group">
                <td>
                    <label for="title" class="control-label">Title</label>
                </td>
                <td>
                    <div>
                        <input type="text" name="title" id="title">
                    </div>
                </td>
            </div>
            </tr>
        </table>

        <h5 style="text-align: left;">What do you think?</h5>
        <textarea style="max-height: 10vw; width: 40vw; height: 60pt" name="description" form="newreview"> 
        </textarea>
        <!-- Add Review Button -->
        <div>
            <div>
                <button type="submit" class="btn btn-default">
                    Save
                </button>
            </div>
        </div>
    </form>