
@extends('User.layouts.main')


@section('content')

<main class="main-dashboard">
  <style>
        /* Add some basic styling */
        #output {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
        }
    </style>



     @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
        <section class="properties user-properties">
            <div class="main-sections-container">
                <h2 class="main--headings">
                    <div class="headings-arrow">Properties</div>
                </h2>
                <div class="main-section-inner-conatiner">
                    <div class="property-list-slider properties-tabbing">
                        <div class="tab-main-section">
                            <div class="tablinks-main">
                            <button class="tablinks" onclick="openCity(event, 'tab-1')" id="defaultOpen">For Sale</button>
                            <button class="tablinks" onclick="openCity(event, 'tab-2')">For Rent</button>
                        </div>
                             <a href="{{url('user/add-property')}}" class="main-btn">+ Add Property</a> 
                         
                        </div>
                            

                        <div id="tab-1" class="tabcontent">
                                                <div class="filter-container">
                            <div class="select-box select_wrap bottom">
<select id="selectBox" name="form_select" onchange="showSelectedOption()">
   <option value="0">Square ft.</option>
   <option value="0sqft-100sqft">0 Sqft-100 Sqft</option>
    <option value="100sqft-200sqft">100 Sqft-200 Sqft</option>
     <option value="200sqft-300sqft">200 Sqft-300 Sqft</option>
</select>


   
  
      


</div>

<!-- gduggciuhcdic -->
                            <div class="select-box select_wrap_1 bottom">

                                <select id="selectBox1" name="floors" onchange="showSelectedOption1()">
   <option value="0">Floor</option>
   <option value="1">No Ground Floor</option>
    <option value="2">Ground Floor Only</option>
     <option value="3">Single Storey</option>
     <option value="4">Top Floor Only</option>
</select>





</div>
<!-- gduggciuhcdic -->
                            <div class="select-box select_wrap_3 bottom">
                                
                                 <select id="selectBox2" name="surface" onchange="showSelectedOption2()">
   <option value="0">Additional Surface</option>
   <option value="1">Parking</option>
    <option value="2">Box</option>
    <option value="2">Garage</option>
    <option value="2">Cave</option>
</select>



</div>
                                                   <div class="select-box select_wrap_4 bottom">
                                <ul class="default-box default_option_4">
                                    <li>
                                        <div class="option ice">
                                            <h2 class="selector-heading">More</h2>
                                            <div class="drpdown-icon">
                                                <img src="{{asset('Admin/images/drop-down-icon.svg')}}">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="select_ul_box select_ul_4">
                                    <li>
                                        <div class="more--option option pizza">
                                            <h2 class="selector-heading">Project Type</h2>

                                            <label class="checkbox-main">Ancient
                                                <input type="checkbox" value="1"  name="project1" id="project" >
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox-main">Life Annuity
                                                <input type="checkbox"  value="3"  name="project3" id="project" >
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox-main">Nine
                                                <input type="checkbox" value="2"  name="project2" id="project" >
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox-main">Building Project
                                                <input type="checkbox" value="4"  name="project4" id="project" >
                                                <span class="checkmark"></span>
                                            </label>

                                            <h2 class="selector-heading">Outside</h2>
                                            <label class="checkbox-main">Garden
                                                <input type="checkbox"  value="1"  name="outside1" id="outside" >
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox-main">Terrace
                                                <input type="checkbox"  value="3"  name="outside3" id="outside" >
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox-main">Pool
                                                <input type="checkbox" value="2"   name="outside2" id="outside">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox-main">Balcony
                                                <input type="checkbox" value="4"  name="outside4" id="outside">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- </div> -->
                           
                        </div>
                   

                     
<!-- </form> -->
                        <div class="mobile-overflow-section">
                            <div class="filter-container-output">
                               <div class="abc" id="outputdiv"style="display:none;">
         <div id="result" ></div>
         <button id="output" onclick="clearSelection()"><svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.261719 6.33345L2.37905 3.41624L0.261719 0.499023H1.87324L3.35538 2.5693L4.82575 0.499023H6.44904L4.31994 3.41624L6.44904 6.33345H4.82575L3.35538 4.26317L1.87324 6.33345H0.261719Z" fill="#2B3562"/>
</svg></button> 
    </div>
                                <div class="abc" id="outputdivv" style="display:none;" >
         <div id="result1"></div>
         <button id="output1" onclick="clearSelection1()"><svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.261719 6.33345L2.37905 3.41624L0.261719 0.499023H1.87324L3.35538 2.5693L4.82575 0.499023H6.44904L4.31994 3.41624L6.44904 6.33345H4.82575L3.35538 4.26317L1.87324 6.33345H0.261719Z" fill="#2B3562"/>
</svg></button> 
    </div>
                               <div class="abc" id="outputdivvv" style="display:none;" >
         <div id="result2"></div>
         <button id="output2"  onclick="clearSelection2()"><svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.261719 6.33345L2.37905 3.41624L0.261719 0.499023H1.87324L3.35538 2.5693L4.82575 0.499023H6.44904L4.31994 3.41624L6.44904 6.33345H4.82575L3.35538 4.26317L1.87324 6.33345H0.261719Z" fill="#2B3562"/>
</svg></button> 
    </div>
                               <div class="abc" id="outputall" style="display:none;" >
 <div id="re">Clear all</div>
       <button  id="clearall"  onclick="clearAllSelections()"><svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.261719 6.33345L2.37905 3.41624L0.261719 0.499023H1.87324L3.35538 2.5693L4.82575 0.499023H6.44904L4.31994 3.41624L6.44904 6.33345H4.82575L3.35538 4.26317L1.87324 6.33345H0.261719Z" fill="#2B3562"/>
</svg></button>
    </div>
                                <!-- <button class="output-btn clear-btn">Clear All<img src="{{asset('Admin/images/cross-white-icon.svg')}}"></button> -->
                            </div>
                        </div>
                            <div class="inner-grids" id="old">
                                @foreach($saledata as $sale)
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                
                                         @foreach($sale->image as $image=>$v)
                                         @if($image == '0')
                                        <img src="{{asset('Property-images/'.$v)}} ">
                                        @endif
                                        @endforeach
                                        <div class="hover-btn-container">
                                            <form action="{{url('user/single-properties/'.$sale->id)}}">
                                                    
                                                 <button class="view-btn"   type="submit">View</button>
                                            </form>

                                         <form action="{{url('user/delete-properties/'.$sale->id)}}">
                                               
                                                  <button class="delete-btn show_confirm">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>






                                    <div class="detail">
                                        <h2 class="top-heading">{{$sale->property_name}}</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                               {{$sale->location}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                           
                            </div>
                             <div class="inner-grids" id="new" style="display: none;">
                             </div>
                        </div>

                        <div id="tab-2" class="tabcontent">
                                                         <div class="filter-container">
                            <div class="select-box select_wrap bottom">
<!-- <form action="{{url('user/search_property')}}" >  -->
<select id="rentselectBox" name="form_select" onchange="showSelectedOption3()">
   <option value="0">Square ft.</option>
   <option value="0sqft-100sqft">0 Sqft-100 Sqft</option>
    <option value="100sqft-200sqft">100 Sqft-200 Sqft</option>
     <option value="200sqft-300sqft">200 Sqft-300 Sqft</option>
</select>

                       




   
  
      


</div>

<!-- gduggciuhcdic -->
                            <div class="select-box select_wrap_1 bottom">

                                <select id="rentselectBox1" name="floors" onchange="showSelectedOption4()">
   <option value="0">Floor</option>
   <option value="1">No Ground Floor</option>
    <option value="2">Ground Floor Only</option>
     <option value="3">Single Storey</option>
     <option value="4">Top Floor Only</option>
</select>





</div>
<!-- gduggciuhcdic -->
                            <div class="select-box select_wrap_3 bottom">
                                
                                 <select id="rentselectBox2" name="surface" onchange="showSelectedOption5()">
   <option value="0">Additional Surface</option>
   <option value="1">Parking</option>
    <option value="2">Box</option>
    <option value="2">Garage</option>
    <option value="2">Cave</option>
</select>














</div>
                                                   <div class="select-box select_wrap_4 bottom">
                                <ul class="default-box default_option_4">
                                    <li>
                                        <div class="option ice">
                                            <h2 class="selector-heading">More</h2>
                                            <div class="drpdown-icon">
                                                <img src="{{asset('Admin/images/drop-down-icon.svg')}}">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="select_ul_box select_ul_4">
                                    <li>
                                        <div class="more--option option pizza">
                                            <h2 class="selector-heading">Project Type</h2>

                                            <label class="checkbox-main">Ancient          
                                                <input type="checkbox" value="1"  name="rentproject1" id="rentproject"  >
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox-main">Life Annuity
                                                <input type="checkbox"  value="3"   name="rentproject3" id="rentproject">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox-main">Nine
                                                <input type="checkbox" value="2"  name="rentproject2" id="rentproject">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox-main">Building Project
                                                <input type="checkbox" value="4"   name="rentproject4" id="rentproject" >
                                                <span class="checkmark"></span>
                                            </label>

                                            <h2 class="selector-heading">Outside</h2>
                                            <label class="checkbox-main">Garden
                                                <input type="checkbox"  value="1" name="rentoutside1" id="rentoutside" >
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox-main">Terrace
                                                <input type="checkbox"  value="3" name="rentoutside3" id="rentoutside" >
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox-main">Pool
                                                <input type="checkbox" value="2"  name="rentoutside2" id="rentoutside">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="checkbox-main">Balcony
                                                <input type="checkbox" value="4"  name="rentoutside4" id="rentoutside">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- </div> -->
                           
                        </div>
             

                     
<!-- </form> -->
                        <div class="mobile-overflow-section">
                            <div class="filter-container-output">
<!-- <select id="rentselectBox" name="form_select" onchange="showSelectedOption3()">
   <option value="0">Square ft.</option>
   <option value="0sqft-100sqft">0 Sqft-100 Sqft</option>
    <option value="100sqft-200sqft">100 Sqft-200 Sqft</option>
     <option value="200sqft-300sqft">200 Sqft-300 Sqft</option>
</select> -->


      






                 <div class="abc" id="rentoutputdiv" style="display:none;">
         <div id="rentresult" ></div>
         <button id="rentoutput" onclick="clearSelection3()"><svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.261719 6.33345L2.37905 3.41624L0.261719 0.499023H1.87324L3.35538 2.5693L4.82575 0.499023H6.44904L4.31994 3.41624L6.44904 6.33345H4.82575L3.35538 4.26317L1.87324 6.33345H0.261719Z" fill="#2B3562"/>
</svg></button> 
    </div>


                                <div class="abc" id="rentoutputdivv" style="display:none;" >
         <div id="rentresult1"></div>
         <button id="rentoutput1" onclick="clearSelection4()"><svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.261719 6.33345L2.37905 3.41624L0.261719 0.499023H1.87324L3.35538 2.5693L4.82575 0.499023H6.44904L4.31994 3.41624L6.44904 6.33345H4.82575L3.35538 4.26317L1.87324 6.33345H0.261719Z" fill="#2B3562"/>
</svg></button> 
    </div>
                               <div class="abc" id="rentoutputdivvv" style="display:none;" >
         <div id="rentresult2"></div>
         <button id="rentoutput2"  onclick="clearSelection5()"><svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.261719 6.33345L2.37905 3.41624L0.261719 0.499023H1.87324L3.35538 2.5693L4.82575 0.499023H6.44904L4.31994 3.41624L6.44904 6.33345H4.82575L3.35538 4.26317L1.87324 6.33345H0.261719Z" fill="#2B3562"/>
</svg></button> 
    </div>
<div class="abc" id="rentoutputall" style="display:none;" >
 <div id="rentre">Clear all</div>
       <button  id="rentclearall"  onclick="rentclearAllSelections1()"><svg width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.261719 6.33345L2.37905 3.41624L0.261719 0.499023H1.87324L3.35538 2.5693L4.82575 0.499023H6.44904L4.31994 3.41624L6.44904 6.33345H4.82575L3.35538 4.26317L1.87324 6.33345H0.261719Z" fill="#2B3562"/>
</svg></button>
    </div>                     <!-- <button class="output-btn clear-btn">Clear All<img src="{{asset('Admin/images/cross-white-icon.svg')}}"></button> -->
                            </div>
                        </div>

                            <div class="inner-grids" id="rentold">
                                 @foreach($rentdata as $rent)
                                <a href="javascript:void(0); ">
                                    <div class="slider-img ">
                                       @foreach($rent->image as $image=>$v)
                                         @if($image == '0')
                                        <img src="{{asset('Property-images/'.$v)}} ">
                                        @endif
                                        @endforeach
                                        <div class="hover-btn-container">
                                            <form action="{{url('user/single-properties/'.$rent->id)}}">
                                                    
                                                 <button class="view-btn" type="submit">View</button>
                                            </form>
                                        <form action="{{url('user/delete-properties/'.$rent->id)}}">
                                               
                                                  <button class="delete-btn show_confirm">Delete</button>
                                            </form>
                                           
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2 class="top-heading">{{$rent->property_name}}</h2>
                                        <div class="location-box">
                                            <div class="loc-icon">
                                                <img src="{{asset('Admin/images/loc-icon.svg')}}">
                                            </div>
                                            <div class="loc-text">
                                               {{$rent->location}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                              
                            </div>
                            <div class="inner-grids" id="rentnew" style="display: none;">
                             </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>  


<script>

        function showSelectedOption() {
             if(selectBox.value==0){
                document.getElementById('outputdiv').style.display = "none";
       } else{
                document.getElementById('outputdiv').style.display = "block";
                     const selectBox = document.getElementById('selectBox');
                    const resultDiv = document.getElementById('result');
                    const selectedOption = selectBox.options[selectBox.selectedIndex].text;
                    resultDiv.textContent = ` ${selectedOption}`;
              }
            
       } 
        function clearSelection() {
            const selectBox = document.getElementById('selectBox');
            const resultDiv = document.getElementById('result');
             const outputdiv = document.getElementById('outputdiv');
            selectBox.selectedIndex = 0; // Clear selection
            resultDiv.textContent = '';   // Clear result
                  outputdiv.style.display = "none";
        }
    </script>

      <script>


        function showSelectedOption1() {
             if(selectBox1.value==0){
            
                 document.getElementById('outputdivv').style.display = "none";
       } else{
                   document.getElementById('outputdivv').style.display = "block";
                     const selectBox = document.getElementById('selectBox1');
                    const resultDiv = document.getElementById('result1');
                    const selectedOption1 = selectBox.options[selectBox.selectedIndex].text;
                    resultDiv.textContent = ` ${selectedOption1}`;
              }
            
       }
        
        function clearSelection1() {
            const selectBox1 = document.getElementById('selectBox1');
            const resultDiv1 = document.getElementById('result1');
           
              const outputdivv = document.getElementById('outputdivv');
            outputdivv.style.display = "none";
            selectBox1.selectedIndex = 0; // Clear selection
            resultDiv1.textContent = '';   // Clear result
            
        }
    </script>

      <script>


        function showSelectedOption2() {
             if(selectBox2.value==0){
                 document.getElementById('outputdivvv').style.display = "none";
                   
       } else{
              document.getElementById('outputdivvv').style.display = "block";
                document.getElementById('outputall').style.display = "block";
                     const selectBox = document.getElementById('selectBox2');
                    const resultDiv = document.getElementById('result2');
                    const selectedOption2 = selectBox.options[selectBox.selectedIndex].text;
                    resultDiv.textContent = ` ${selectedOption2}`;
              }
            
       }
        
        function clearSelection2() {
            const selectBox2 = document.getElementById('selectBox2');
            const resultDiv2 = document.getElementById('result2');
              const outputdivvv = document.getElementById('outputdivvv');
               const outputall = document.getElementById('outputall');
            outputdivvv.style.display = "none";
            outputall.style.display = "none";
             
            selectBox2.selectedIndex = 0; // Clear selection
            resultDiv2.textContent = '';   // Clear result
             
        }
    </script>


    <script>
          function clearAllSelections() {
            const selectBoxes = document.querySelectorAll('select');
            const resultDiv = document.getElementById('result');
             const div = document.getElementById('outputdiv');
             
               const outputall = document.getElementById('outputall');

              const selectBoxes1 = document.querySelectorAll('select1');
            const resultDiv1 = document.getElementById('result1');
             const div1 = document.getElementById('outputdivv');

              const selectBoxes2 = document.querySelectorAll('select2');
            const resultDiv2 = document.getElementById('result2');
             const div2 = document.getElementById('outputdivvv');

          const old = document.getElementById('old');
             const nnew = document.getElementById('new');


            selectBoxes.forEach(selectBox => {
                selectBox.selectedIndex = 0; 
                  resultDiv.textContent = '';   // Clear result
             div.style.display = "none";// Clear selection
                 selectBox1.selectedIndex = 0; 
                  resultDiv1.textContent = '';   // Clear result
             div1.style.display = "none";// Clear selection
                 selectBox2.selectedIndex = 0; 
                  resultDiv2.textContent = '';   // Clear result
             div2.style.display = "none";// Clear selection

            
                   outputall.style.display = "none";
                      old.style = "";
            nnew.style.display = "none";
            });

            resultDiv.textContent = ''; // Clear result

           
        }
    </script>


    <!-- //////////////////////rent script//////////////////////// -->

<script>

        function showSelectedOption3() {
             if(rentselectBox.value==0){
                document.getElementById('rentoutputdiv').style.display = "none";
       } else{
                document.getElementById('rentoutputdiv').style.display = "block";
                     const selectBox = document.getElementById('rentselectBox');
                    const rentresultDiv = document.getElementById('rentresult');
                    const rentselectedOption = selectBox.options[selectBox.selectedIndex].text;
                    rentresultDiv.textContent = ` ${rentselectedOption}`;
              }
            
       } 
        function clearSelection3() {
            const rentselectBox = document.getElementById('rentselectBox');
            const rentresultDiv = document.getElementById('rentresult');
             const rentoutputdiv = document.getElementById('rentoutputdiv');
            rentselectBox.selectedIndex = 0; // Clear selection
            rentresultDiv.textContent = '';   // Clear result
                  rentoutputdiv.style.display = "none";
        }
    </script>



      <script>


        function showSelectedOption4() {
             if(rentselectBox1.value==0){
            
                 document.getElementById('rentoutputdivv').style.display = "none";
       } else{
                   document.getElementById('rentoutputdivv').style.display = "block";
                     const selectBox = document.getElementById('rentselectBox1');
                    const rentresultDiv = document.getElementById('rentresult1');
                    const rentselectedOption1 = selectBox.options[selectBox.selectedIndex].text;
                    rentresultDiv.textContent = ` ${rentselectedOption1}`;
              }
            
       }
        
        function clearSelection4() {
            const rentselectBox1 = document.getElementById('rentselectBox1');
            const rentresultDiv1 = document.getElementById('rentresult1');
           
              const rentoutputdivv = document.getElementById('rentoutputdivv');
            rentoutputdivv.style.display = "none";
           rentselectBox1.selectedIndex = 0; // Clear selection
            rentresultDiv1.textContent = '';   // Clear result
            
        }
    </script>

      <script>


        function showSelectedOption5() {
             if(rentselectBox2.value==0){
                 document.getElementById('rentoutputdivvv').style.display = "none";
                   
       } else{
              document.getElementById('rentoutputdivvv').style.display = "block";
                document.getElementById('rentoutputall').style.display = "block";
                     const selectBox = document.getElementById('rentselectBox2');
                    const rentresultDiv = document.getElementById('rentresult2');
                    const rentselectedOption2 = selectBox.options[selectBox.selectedIndex].text;
                    rentresultDiv.textContent = ` ${rentselectedOption2}`;
              }
            
       }
        
        function clearSelection5() {
            const rentselectBox2 = document.getElementById('rentselectBox2');
            const rentresultDiv2 = document.getElementById('rentresult2');
              const rentoutputdivvv = document.getElementById('rentoutputdivvv');
               const rentoutputall = document.getElementById('rentoutputall');
            rentoutputdivvv.style.display = "none";
            rentoutputall.style.display = "none";
             
            rentselectBox2.selectedIndex = 0; // Clear selection
            rentresultDiv2.textContent = '';   // Clear result
             
        }
    </script>


    <script>
          function rentclearAllSelections1() {
            const selectBoxes = document.querySelectorAll('select');
            const resultDiv = document.getElementById('result');
             const rentdiv = document.getElementById('rentoutputdiv');
             
               const rentoutputall = document.getElementById('rentoutputall');

              const selectBoxes1 = document.querySelectorAll('select1');
            const resultDiv1 = document.getElementById('result1');
             const rentdiv1 = document.getElementById('rentoutputdivv');

              const selectBoxes2 = document.querySelectorAll('select2');
            const resultDiv2 = document.getElementById('result2');
             const rentdiv2 = document.getElementById('rentoutputdivvv');
             
               const rentold = document.getElementById('rentold');
             const rentneww = document.getElementById('rentnew');

            selectBoxes.forEach(selectBox => {
                selectBox.selectedIndex = 0; 
                  resultDiv.textContent = '';   // Clear result
             rentdiv.style.display = "none";// Clear selection
                 selectBox1.selectedIndex = 0; 
                  resultDiv1.textContent = '';   // Clear result
             rentdiv1.style.display = "none";// Clear selection
                 selectBox2.selectedIndex = 0; 
                  resultDiv2.textContent = '';   // Clear result
             rentdiv2.style.display = "none";// Clear selection

             rentneww.style.display = "none";
              rentold.style = "";
                   rentoutputall.style.display = "none";
            });

            rentresultDiv.textContent = ''; // Clear result

       
           
        }
    </script>



@endsection