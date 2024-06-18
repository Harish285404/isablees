

@extends('User.layouts.main')


@section('content')

  @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
   
 <main class="main-dashboard">

        <section class="user-edit-properties">
            <div class="main-sections-container">
                <h1 class="top-main--headings">Edit Property</h1>
                <div class="main-section-inner-conatiner">
                    <form class="user-add-properties-form"  method="post" enctype="multipart/form-data" action="{{ url('user/edit-property-data')}}">
                        @csrf
                         <input type="hidden" id="Name" name="id"  value="{{$property[0]->id}}"></input>
                        <!-- <h1 class="main--headings">Edit Property</h1> -->
                         <div class="upload__box">
                              
                            <div class="upload__btn-box">
                                <label class="upload__btn">
                                <p><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.9" d="M7.8889 18.2952V10.9678H0.561523V7.88817H7.8889V0.596191H10.9685V7.88817H18.2605V10.9678H10.9685V18.2952H7.8889Z" fill="#2B3562"></path>
                                    </svg>Add</p>
                                   
                                <input type="file" multiple="" data-max_length="20" class="upload__inputfile"  name="filename[]">
                                  
                              </label>

                            </div>
                            
                           @foreach($property[0]->image as $images=>$vv)
                              <input type="hidden" id="Name" name="images[<?php echo $vv; ?>]" value="" >    
                           @endforeach
                            <div class="upload__img-wrap">
                                   
                            @foreach($property[0]->image as $image=>$v)
                            <?php 
                            
                             $imagePath = 'https://immotep.chainpulse.tech/Property-images/'.$v;
                              $image = "data:image/png;base64,".base64_encode(file_get_contents($imagePath));
  
                             // dd($image);
                             ?>
                       
                        <div class='upload__img-box'><div style="background-image: url(<?php echo $image; ?>)" data-number='" + $(".upload__img-close").length + "' 
                            data-file='" + $v + "' class='img-bg'><div class='upload__img-close'></div></div></div>  
                             @endforeach
                        </div>
                            
                        </div> 
                   



        <!--                <div class="input-group control-group increment" >-->
        <!--  <input type="file" name="filename[]" class="form-control">-->
        <!--  <div class="input-group-btn"> -->
        <!--    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>-->
        <!--  </div>-->
        <!--</div>-->
        <!--<div class="clone hide">-->
        <!--  <div class="control-group input-group" style="margin-top:10px">-->
        <!--    <input type="file" name="filename[]" class="form-control">-->
        <!--    <div class="input-group-btn"> -->
        <!--      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
                        <div class="input-col-main">

                            <div class="input-col first">
                                <div class="input_field">
                                    <input type="text" id="Name" name="name" placeholder="Name of the property" value="{{$property[0]->property_name}}"></input>
                                </div>
                                <div class="input_field">
                                    <select name="property_type">
                                        <option value="1" {{ $property[0]->type =='1'? 'selected':'' }}>Rent</option>
                                        <option value="2" {{ $property[0]->type =='2'? 'selected':'' }}>Sale</option>
                                
                                    </select>
                                </div>
                                <div class="input_field">
                                    <input type="number" id="price" name="price" placeholder="Price" value="{{$property[0]->price}}"></input>
                                </div>
                            </div>
                            <div class="input-col second">
                                <div class="input_field">
                                    <input type="text" id="loc" placeholder="Location" name="location" value="{{$property[0]->location}}"></input>
                                </div>
                                <div class="input_field">
                                    <input type="text" id="longt" placeholder="Longitude" name="longitude" value="{{$property[0]->longitude}}"></input>
                                </div>
                                <div class="input_field">
                                    <input type="text" id="lat" placeholder="Latitude" name="latitude" value="{{$property[0]->latitude}}"></input>
                                </div>
                            </div>
                            <div class="input-col third">
                                <div class="input_field">
                                    <input type="text" id="living" placeholder="Living Area" name="living_area" value="{{$property[0]->living_area}}"></input>
                                </div>
                                <div class="input_field">
                                    <input type="text" id="land" placeholder="Land Area" name="land_area" value="{{$property[0]->land_area}}"></input>
                                </div>
                                <div class="input_field">
                                    <input type="number" id="pieces" placeholder="Number of pieces" name="pieces" value="{{$property[0]->rooms}}"></input>
                                </div>
                                <div class="input_field">
                                    <input type="number" id="rooms" placeholder="Number of rooms" name="rooms" value="{{$property[0]->rooms}}"></input>
                                </div>
                            </div>
                        </div>
                        <div class="select-box user-edit-property-select-box">
                            <h2 class="selector-heading">Project Type</h2>
                            <div class="property-select-box">
                            
                                @foreach($type as $project)
                        
                                <label class="checkbox-main">{{$project->title}}
                              
                                            <input type="checkbox" name="project_type[]" value="{{$project->id}}" {{ $project->id==in_array($project->id,$property[0]->project_type_ids)? 'checked':'' }}>
                                            <span class="checkmark"></span>
                                          
                                        </label>
                                        @endforeach
                                        
                                <!--<label class="checkbox-main">Nine-->
                                <!--            <input type="checkbox">-->
                                <!--            <span class="checkmark"></span>-->
                                <!--        </label>-->
                                <!--<label class="checkbox-main">Life Annuity-->
                                <!--            <input type="checkbox" checked="checked">-->
                                <!--            <span class="checkmark"></span>-->
                                <!--        </label>-->

                                <!--<label class="checkbox-main">Building Project-->
                                <!--            <input type="checkbox">-->
                                <!--            <span class="checkmark"></span>-->
                                <!--        </label>-->
                            </div>
                         
                            <h2 class="selector-heading">Outside</h2>

                            <div class="property-select-box">
                                  @foreach($outside as $project)
                                  
                                <label class="checkbox-main">{{$project->title}}
                                              <input type="checkbox" name="outside_type[]" value="{{$project->id}}" {{ $project->id==in_array($project->id,$property[0]->outside_ids)? 'checked':'' }}>
                                            <span class="checkmark"></span>
                                            
                                        </label>
                                        
                                        @endforeach
                                            
                                <!-- <label class="checkbox-main">Pool
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                <label class="checkbox-main">Terrace
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>

                                <label class="checkbox-main">Balcony
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label> -->
                            </div>
                            <h2 class="selector-heading">Exposure</h2>

                            <div class="property-select-box">
                                @foreach($exposure as $project)
                                <label class="checkbox-main">{{$project->title}}
                                
                                            <input type="checkbox" name="exposure_type[]" value="{{$project->id}}" {{ $project->id==in_array($project->id,$property[0]->exposure_ids)? 'checked':'' }}>
                                            <span class="checkmark"></span>
                                           
                                        </label>
                                            
                                              @endforeach
                              <!--   <label class="checkbox-main">South Orientation
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                <label class="checkbox-main">Nice View
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label> -->
                            </div>
                            <h2 class="selector-heading">Floor</h2>

                            <div class="property-select-box">
                                 @foreach($floors as $project)
                                <label class="checkbox-main">{{$project->title}}
                                
                                            <input type="checkbox" name="floors_type[]" value="{{$project->id}}" {{ $project->id==in_array($project->id,$property[0]->floor_ids)? 'checked':'' }}>
                                            <span class="checkmark"></span>
                                              
                                        </label>
                                             
                                             @endforeach
                             <!--    <label class="checkbox-main">Ground Floor Only
                                                    <input type="checkbox" >
                                                    <span class="checkmark"></span>
                                                    </label>
                                <label class="checkbox-main">Single Story
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                <label class="checkbox-main">Top Floor Only
                                                    <input type="checkbox" >
                                                    <span class="checkmark"></span>
                                                    </label> -->

                            </div>
                                   <h2 class="selector-heading">Additional surfaces</h2>
                                 <div class="property-select-box">
                                  @foreach($surfaces as $project)
                                  
                                <label class="checkbox-main">{{$project->title}}
                                              <input type="checkbox" name="surfaces_type[]" value="{{$project->id}}" {{ $project->id==in_array($project->id,$property[0]->surface_ids)? 'checked':'' }}>
                                            <span class="checkmark"></span>
                                            
                                        </label>
                                        
                                        @endforeach
                                            
                                <!-- <label class="checkbox-main">Pool
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                <label class="checkbox-main">Terrace
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>

                                <label class="checkbox-main">Balcony
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label> -->
                            </div>
                            <h2 class="selector-heading">Accessibility</h2>

                            <div class="property-select-box">
                               @foreach($accessbility as $project)
                                <label class="checkbox-main">{{$project->title}}
                                
                                            <input type="checkbox" name="accessbility_type[]" value="{{$project->id}}" {{ $project->id==in_array($project->id,$property[0]->acessbility_ids)? 'checked':'' }}>
                                            <span class="checkmark"></span>
                                        
                                        </label>
                                             @endforeach
                                          
                             <!--    <label class="checkbox-main">Handicap Access
                                                    <input type="checkbox" >
                                                    <span class="checkmark"></span>
                                                    </label> -->
                            </div>
                            <button class="main-btn" type="submit">Save</button>  
                        </div>
                    </form>
                </div>
        </section>
    </main>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>





@endsection

