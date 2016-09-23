<div id='newserviceform' style="border-bottom: 1px #269abc solid; padding-bottom: 5pt; margin-bottom: 5pt;">
    <form id="newservice" action="{{ url('/newservice') }}" method="POST" class="form">

        <div>
            {{ csrf_field() }}
            <input type="hidden"  name="company_id" id="company_id" value="{{Auth::user()->getcompany()->company_id}}">
        </div>
        <div style="display: flex">        
            <div>
                <div class="form-group">
                    <label for="title" class="control-label">Title</label>

                    <div>
                        <input type="text" name="title" id="title">
                    </div>
                </div>


                <div class="form-group">
                    <label for="price" class="control-label">Price</label>

                    <div>
                        <input type="number" name="price" id="price" min="0" value="15">
                    </div>
                </div>
            </div>
            <div style=" margin-left: 20pt;">
                <h5 style="text-align: left;">Describe your service, please</h5>
                <textarea style="max-height: 10vw; width: 30vw; height: 60pt;" name="description" form="newservice"> 
                </textarea>
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
</div>