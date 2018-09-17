<!-- <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->  

<?php $allcat = DB::select("select * from category");  ?>
<?php $alllang = DB::select('select * from languages'); ?>

<body>

<?php echo View::make('header'); ?>
    <div class="container addcon">

       <form action="{{ url('/languages') }}" method="post">
            <select id="languageswicher" name="locale">
                <?php foreach ($alllang as $key => $lang) { ?>
                      <option value="{{ $lang->lang_code }}">{{ $lang->lang_name }}</option>
                <?php } ?>
            </select>
             <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <input type="submit" name="submit" value="submit">
        </form>

        <script type="text/javascript">
            $('#languageswicher').change(function() {
               var i =  $( "#languageswicher option:selected" ).val();
                 $("#getlangid").val(i);
                 $("#langiddd").val(i);
               /* alert(i);*/
            });
        </script>

        <?php 
            $lid  = Session::get('locale');
            $mul_lang = DB::Select("select * from post_language where lang_id='$lid'");
        ?>
        <div class="row">
			<form action="insert" accept-charset="UTF-8" method="post"  enctype="multipart/form-data">
			
			    <h1 class="title">{{ trans('file.adddetails') }}</h1>
			    <hr>
                
                <div class="col s12 m12">
			    <label for="title"><b>{{ trans('file.title') }}</b></label>
			    <input type="text" placeholder="enter title" name="title" >
			    </div>

                <div class="col s12 m12">
			    <label for="summary"><b>{{ trans('file.Summary') }}</b></label>
			    <input type="text" placeholder="Enter summary" name="summary" >
                </div>

                <div class="col s12 m12">    
			    <label for="content"><b>{{ trans('file.Content') }}</b></label>
			    <input type="text" placeholder="Enter content" name="content" >
                </div>

                <div class="col s12 m12">    
                <label for="publication"><b>{{ trans('file.Publication') }}</b></label>
                <input type="text" placeholder="Enter publication" name="publication" class="datepicker" >
                </div>

                <div class="col s12 m12">    
                <label for="categories"><b>{{ trans('file.Categories') }}</b></label>
                <select name="categories[]" multiple>
                     <option disabled="">Select Category</option>
                    @foreach($allcat as $cat)
                    <option value="{{ $cat->cat_name }}">{{ $cat->cat_name }}</option>
                    @endforeach    
                </select>
                </div>

                <div class="col s12 m12">    
                <label for="images"><b>{{ trans('file.images') }}</b></label>
                <input type="file" placeholder="Enter images" name="images[]" multiple  >
                </div>

                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input type="hidden" name="lang_id" id="getlangid" value="en">
			    <button type="submit" class="registerbtn">{{ trans('file.adddata') }}</button>
	       </form>
       </div>
    </div>
   
    <div class="container addcon">
         <h1 class="title">{{ trans('file.details') }}</h1>
         <hr>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>{{ trans('file.title') }}</th>
                    <th>{{ trans('file.Summary') }}</th>
                    <th>{{ trans('file.Content') }}</th>
                    <th>{{ trans('file.Publication') }}</th>
                    <th>{{ trans('file.Categories') }}</th>
                    <th>{{ trans('file.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mul_lang as $usr)
                <tr>
                    <td>{{ $usr->title }}</td>
                    <td>{{ $usr->summary }}</td>
                    <td>{{ $usr->content }}</td>
                    <td>{{ $usr->publication }}</td>
                    <td>{{ $usr->categories }}</td>
                    <td><a href="{{ route('edit',$usr->id) }}" class="btn blue "><i class="material-icons">edit</i></a> || <a href="{{ route('delete',$usr->post_id) }}" class="red btn"><i class="material-icons">delete</i></a></td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>	
</body>

<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
       $('select').material_select();
    });

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
</style>