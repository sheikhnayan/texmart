@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">View slider
                    <small></small>
                </h4>
              
            </div>
            <div class="page-title" style="float: right; ">
                <a href="{{route('slider.create')}}" class="btn btn-outline-success">Add slider</a> 
                  <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
            </div>
            <!--page title end-->


            <div class="container" style="overflow-x: scroll;">

                <!-- state start-->
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="mb-4">
                   
                            <div class="card-body">
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Url Name</th>
                                        <th>Image</th>
                                        <th>Place</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Url Name</th>
                                        <th>Image</th>
                                        <th>Place</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                        @if(isset($data))
                                        @foreach($data as $showdata)
                                      <tr id="tr-{{$showdata->id}}">
                                        <td>{{$showdata->sl}}</td>
                                        <td>{{$showdata->url}}</td>
                                        
                                        <td>
                                            @php
                                             $path= base_path().'/public/sliderImage/'.$showdata->image;
                                            @endphp

                                            @if($showdata->image)
                                    <div uk-lightbox="animation: fade">
                                           <a href="{{asset('/public/sliderImage')}}/{{$showdata->image}}"> <img src="{{asset('/public/sliderImage')}}/{{$showdata->image}}" style="height: 100px"></a>
                                        </div>        

                                            @else
                                            <div uk-lightbox="animation: fade">
                                             <a href="{{asset('/public')}}/noimage.png"> <img src="{{asset('/public')}}/noimage.png" style="width: 50px;height: 50px"></a>
                                         </div>
                                         @endif


                                        </td>

                                        <td>{{$showdata->place}}</td>
                                        
                                        <td>
                                            <a href="{{route('slider.edit',$showdata->id)}}" class="btn btn-outline-primary">Edit</a>
                                            <form method="POST" action="{{ route('slider.destroy',$showdata->id) }}">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-outline-danger">delete</button> 
                                            </form>
                                            
                                        </td>
                                    </tr>
                                         @endforeach
                                         @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- state end-->

            </div>
        </div>

@include('Admin.footer')
<script type="text/javascript">

</script>