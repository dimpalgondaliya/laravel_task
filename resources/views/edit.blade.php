<body>
<?php   
 
 $alllang = DB::select('select * from languages');   
 
 $post_id = $data->post_id;
 $lang_id = $data->lang_id;

 $user = DB::table('post_language')->where('post_id', $post_id)->where('lang_id', $lang_id)->first();  

 $allcat = DB::select("select * from category"); 

 echo View::make('header'); 

?>
<div class="container addcon">

            <form action="{{ url('/languages') }}" method="post">

                <select id="languageswicher" name="locale">
                    <?php 
                    $s =Session::get('locale');
                    foreach ($alllang as $key => $lang) { ?>
                          <option value="{{ $lang->lang_code }}" <?php if($s==$lang->lang_code){ ?> selected <?php  } ?>>{{ $lang->lang_name }}</option>
                    <?php } ?>
                </select>
                 <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input type="submit" name="submit" value="submit">
            </form>

             <script type="text/javascript">
                $('#languageswicher').change(function() {
                    var i =  $( "#languageswicher option:selected" ).val();
                    $("#getlangid").val(i);
                    var d_id = $("#getdaynamicid").val();
                    if(i==d_id)
                    {
                      /*  $(document.body).load(location.href);*/
                      /*  window.location.reload();*/
                    }
                    else
                    { 
                        $("#edititle").val('');
                        $("#editsummary").val('');
                        $("#editcontent").val('');
                        $("#editpublication").val('');
                        $("#editcategories").val('');
                    }    
                });


            </script>




<textarea style="display: none;" id="getdaynamicid"><?php echo $lang_id; ?></textarea>
       
            <form action="{{ url('/update') }}" accept-charset="UTF-8" method="post"  id="editblogfrm" enctype="multipart/form-data">
            
                <h1 class="title">{{ trans('file.editdata') }}</h1>
                <hr>
                <label for="title"><b>{{ trans('file.title') }}</b></label>
                <input type="text" placeholder="enter title" value="{{ $user->title }}" name="title" id="edititle" required>
                
                <label for="summary"><b>{{ trans('file.Summary') }}</b></label>
                <input type="text" placeholder="Enter summary" value="{{ $user->summary }}" name="summary" id="editsummary" required>

                <label for="content"><b>{{ trans('file.Content') }}</b></label>
                <input type="text" placeholder="Enter content" value="{{ $user->content }}" name="content" id="editcontent" required>

                <label for="publication"><b>{{ trans('file.Publication') }}</b></label>
                <input type="text" placeholder="Enter publication" value="{{ $user->publication }}" class="datepicker" name="publication" id="editpublication" required>

                <label for="images"><b>{{ trans('file.images') }}</b></label>
                <input type="file" placeholder="Enter images" value="{{ $user->images }}"  name="images" >

                <label for="categories"><b>{{ trans('file.Categories') }}</b></label>
                <select name="categories[]" multiple id="editcategories">
                 <!--    <option value="{{ $user->categories }}" selected="true">{{ $user->categories }}</option> -->
                    @foreach($allcat as $cat)
                        <option value="{{ $cat->cat_name }}" <?php if($cat->cat_name==$user->categories){ ?> selected <?php } ?>>{{ $cat->cat_name }}</option>
                    @endforeach    
                </select>
                
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input type="text" name="lang_id" id="getlangid" value="{{ $user->lang_id }}">
                <input type="hidden" name="post_id" value="{{ $user->post_id }}">
                <input type="hidden" name="id" value="{{ $user->id }}">
                <button type="submit" class="registerbtn">Register</button>
           </form>
    
    </div>

  <script type="text/javascript">
    $('select').material_select();

     $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15, // Creates a dropdown of 15 years to control year,
      today: 'Today',
      clear: 'Clear',
      close: 'Ok',
    });
  </script>  
   

   <style>
body {
    font-family: Arial, Helvetica, sans-serif;
}
h1.title {
    font-size: 27px;
    text-transform:  capitalize;
    font-weight: 500;
}
h1.title {
    font-size: 27px;
    text-transform:  capitalize;
    font-weight: 500;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
::placeholder
{
    text-transform: capitalize;
}
b{
    text-transform: capitalize;
}
.registerbtn {
    background-color: #000000;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    border-radius: 40px;
}
.registerbtn:hover {
    opacity: 1;
}
div#example_wrapper {
  
    margin:  0 auto;
}
select {
    width:  100%;
    border: none !important;
    height: 39px;
    background: #f2f2f2;
    border-bottom:  none;
    padding-left:  9px;
    color:  grey;
}
a {
    color: dodgerblue;
}
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
.container.addcon {
    background: rgba(238,238,238,.35);
    padding:  15px 59px;
    box-shadow: 0 1px 1px rgba(0,0,0,.125);
    margin-bottom: 40px;
    margin-top: 40px;
}
input[type="search"] {
    background: #fff !important;
    width:  30% !important;
    border: 1px solid grey  !important;
    height: 30px !important;
}

</style>