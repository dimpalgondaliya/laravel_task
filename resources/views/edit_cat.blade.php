  <?php echo View::make('header'); ?>

  <div class="container addcon">
			<form action="{{ url('/cat_update') }}" accept-charset="UTF-8" method="post">
			
			    <h1 class="title">edit Category</h1>
			    <hr>
                
			    <label for="cat_name"><b>category</b></label>
			    <input type="text" placeholder="enter category" name="cat_name" value="{{ $data->cat_name }}" required>
			    
			    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input type="hidden" name="id" value="{{ $data->id }}">
			    <button type="submit" class="category">edit category</button>
	       </form>
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