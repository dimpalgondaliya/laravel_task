<?php echo View::make('header'); ?>

<div class="container addcon">
    <form action="category" method="post">
        <select id="languageswicher" name="locale">
            <option value="en">english</option>
            <option value="es">spanish</option>
        </select>
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input type="submit" name="submit" value="submit">
    </form>
	<form action="addcategory" accept-charset="UTF-8" method="post">
        
	    <h1 class="title"> {{ trans('file.string') }}</h1>
	    <hr>
        
	    <label for="cat_name"><b>{{ trans('file.cat') }}</b></label>
	    <input type="text" placeholder="enter category" name="cat_name" required>
	    
	    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
	    <button type="submit" class="category">{{ trans('file.string') }}</button>
   </form>
</div> 

<?php $users =DB::select('select * from category'); ?>
<div class="container addcon">
    <h1 class="title">{{ trans('file.details') }}</h1>
    <hr>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>{{ trans('file.id') }}</th>
                <th>{{ trans('file.catname') }}</th>
                <th>{{ trans('file.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $usr)
            <tr>
                <td>{{ $usr->id }}</td>
                <td>{{ $usr->cat_name }}</td>
                <td><a href="{{ route('cat_edit',$usr->id) }}" class="btn blue"><i class="material-icons">edit</i></a> || <a href="{{ route('cat_delete',$usr->id) }}" class="btn red"><i class="material-icons">delete</i></a></td>
            </tr>
            @endforeach 
        </tbody>
    </table>
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
.category {
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
.category:hover {
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
