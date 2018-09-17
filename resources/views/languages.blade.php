<?php     $alllang = DB::select('select * from languages');       ?>
<body>


 <?php echo View::make('header'); ?>
	<div class="container addcon">
            <form action="{{ url('/languages') }}" method="post">
                <select id="languageswicher" name="locale">
                    <?php foreach ($alllang as $key => $lang) { ?>
                          <option value="{{ $lang->id }}">{{ $lang->lang_name }}</option>
                    <?php } ?>
                </select>
                 <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input type="submit" name="submit" value="submit">
            </form>


        <div class="row">
			<form action="addlanguages" accept-charset="UTF-8" method="post"  enctype="multipart/form-data">
			
			    <h1 class="title">{{ trans('file.addlang') }}</h1>
			    <hr>
                
                <div class="col s12 m12">
			    <label for="langname"><b>{{ trans('file.langname') }}</b></label>
			    <input type="text" placeholder="enter language name" name="lang_name" >
			    </div>

                <div class="col s12 m12">
			    <label for="summary"><b>{{ trans('file.langcode') }}</b></label>
			    <input type="text" placeholder="Enter language code" name="lang_code" >
                </div>

                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
			    <button type="submit" class="registerbtn">{{ trans('file.adddata') }}</button>
	       </form>
       </div>
    </div>
   
    <?php $users =DB::select('select * from languages'); ?>
    <div class="container addcon">
         <h1 class="title">{{ trans('file.details') }}</h1>
         <hr>
        <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>{{ trans('file.langname') }}</th>
                        <th>{{ trans('file.langcode') }}</th>
                           <th>{{ trans('file.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $usr)
                    <tr>
                        <td>{{ $usr->lang_name }}</td>
                        <td>{{ $usr->lang_code }}</td>
                        <td><a href="{{ route('edit_lang',$usr->id) }}" class="btn blue "><i class="material-icons">edit</i></a> || <a href="{{ route('delete_lang',$usr->id) }}" class="red btn"><i class="material-icons">delete</i></a></td>
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