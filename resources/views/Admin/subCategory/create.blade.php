@include('Admin.header')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<div class="main-content">
    <div class="container">

<br>
<br>
<br>
<br>
    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header">
                                <div class="card-title" style="float: left;">
                                    Create Sub Category
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{route('sub-category-add.index')}}" class="btn btn-warning">View</a>
                                      <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{route('sub-category-add.store')}}" enctype="multipart/form-data">
                                    @csrf
                       

          
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Item name</label>
                                        <div class="col-sm-5">
                                            <select name="item_id" id="item_id" class="form-control searchjs" onchange="GetCategory()">
                                          <option value="">Select one</option>
                                                @if(isset($item))
                                                @foreach($item as $itemdata)
                                                <option value="{{$itemdata->id}}">{{$itemdata->item_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Category name</label>
                                        <div class="col-sm-5">
                                          <select name="category_id" id="category_id"  class="form-control searchjs">
                                            <option value="0"> Select A Category</option>
                                          </select>
                                        </div>
                                      </div>
                                      
                                          <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">SL</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="sl" name="sl" placeholder="ex:1" value="{{old('sl')}}" />
                                             <input type="hidden" class="form-control" id="admin_id" name="admin_id"  value="{{Auth('admin')->user()->id}}" />
                                        </div>
                                    </div>
                                    

                                     <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">SubCategory name</label>
                                        <div class="col-sm-5">

                                         <input type="text" name="subcategory_name" id="subcategory_name" placeholder="Ex:shirt" class="form-control" value="{{old('subcategory_name')}}">
                                        </div>
                                      </div>
                                      
                                      
                                                  <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Picture</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="image" name="image" />
                                        </div>
                                    </div>
                                 
                                     <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Banner</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="banner" name="banner" />
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-success" name="signup1" value="Sign up">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>







    </div>
</div>








@include('Admin.footer')
<script type="text/javascript">
      function check_all()
      {
      
      if($('#chkbx_all').is(':checked')){
        $('input.check_elmnt2').prop('disabled', false);
        $('input.check_elmnt').prop('checked', true);
        $('input.check_elmnt2').prop('checked', true);
      }else{
        $('input.check_elmnt2').prop('disabled', true);
        $('input.check_elmnt').prop('checked', false);
        $('input.check_elmnt2').prop('checked', false);
        }
    } 
    

    function chekMain(getID){
       
          if($('#linkID-'+getID).is(':checked')){
              
            $("input#sublinkID-"+getID).attr('disabled', false);
            $("input#sublinkID-"+getID).attr('checked', true);
          
          }else{
            $("input#sublinkID-"+getID).attr('disabled', true);
            $("input#sublinkID-"+getID).attr('checked', false);
          
          }
      
        }



function GetCategory() {
  var item_id=$('#item_id').val();
  if (item_id!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("CreateProductGetCategory") }}',
        type: 'POST',
        data: {id: item_id},
        success: function(data){
          $('#category_id').html(data);
          //GetBrand(); 
        }
      });
  } 
  else {
    $('#category_id').html('<option value="0">Select A Category</option>');
  }
}
</script>