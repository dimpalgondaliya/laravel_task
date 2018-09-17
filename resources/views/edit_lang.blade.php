 <?php echo View::make('header'); ?>
	<div class="container addcon">
            <form action="{{ url('/edit_lang/{id}') }}" method="post">
                <select id="languageswicher" name="locale">
                <option value="en">english</option>
                <option value="es">spanish</option>
                </select>
                 <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input type="submit" name="submit" value="submit">
            </form>


        <div class="row">
			<form action="{{ url('upldate_lang') }}" accept-charset="UTF-8" method="post">
			
			    <h1 class="title">{{ trans('file.addlang') }}</h1>
			    <hr>
                
                <div class="col s12 m12">
			    <label for="lang_name"><b>{{ trans('file.langname') }}</b></label>
			    <input type="text" placeholder="enter language name" value="{{ $data->lang_name }}" name="lang_name" >
			    </div>

                <div class="col s12 m12">
			    <label for="lang_code"><b>{{ trans('file.langcode') }}</b></label>
			    <input value="{{ $data->lang_code }}" type="text" placeholder="Enter language code" name="lang_code" >
                </div>

                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{ $data->id }}">
			    <button type="submit" class="registerbtn">{{ trans('file.editdata') }}</button>
	       </form>
       </div>
    </div>



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
</style>

    <script type="text/javascript">
    $('select').material_select();
  </script>  
   