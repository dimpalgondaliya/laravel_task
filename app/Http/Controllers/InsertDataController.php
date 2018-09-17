<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Redirect;
use DB;
use File;
use App\tab1;
use App;
use Lang;

class InsertDataController extends Controller
{

  function insertview()
  {
    return view('insertdata');
  }
  /*-------------------- insert data in database ----------------------*/
    function insert(Request $req)
    {
       $image = $req->file('images');

       $array_len = count($image);

       for ($i=0; $i < $array_len; $i++) { 
          $img_ext = $image[$i]->getClientOriginalExtension();
          $new_img = $image[$i].".".$img_ext;
          $despath = public_path('/images');
          $image[$i]->move($despath,$new_img); 
       }

     	 $title = $req->input("title");
    	 $summary = $req->input("summary");
    	 $content = $req->input("content");
    	 $publication = $req->input("publication");
    	 $images = $req->input("images");
       $_token=$req->input("_token");
    	 $categories = $req->input("categories");
       $lang_id = $req->input('lang_id');
       $each_contribute = implode(',', (array)$categories);
       $each_images = implode(',', (array)$image);

       $details = 0;

    	 $data = array('title' => $title,'_token'=>$_token,'summary' => $summary,'content' => $content ,'publication' => $publication,'images' => $each_images,'categories' => $each_contribute );
    	 $details = DB::table('insertdatas')->insertGetId($data);

       if($details>0)
       {
           $data2 = array('title' => $title,'_token'=>$_token,'summary' => $summary,'content' => $content ,'publication' => $publication,'images' => $each_images,'categories' => $each_contribute ,'post_id'=>$details ,'lang_id'=>$lang_id);
           DB::table('post_language')->insert($data2);
       }
       echo "ok";
       return view('insertdata');
    	 
    }

  /*--------------------------fetch data in edit view by id -----------------------------*/
    function editData($id)
    {
        $data = DB::table('post_language')->find($id);
        if(count($data)>0)
        {
          return view('edit',['data'=>$data]);
        }
        else
        {
          echo "fail";
        }
    }

    /*-------------------- update data in database ----------------------*/
    function update(Request $req)
    {
       $image = $req->file('images');

       $array_len = count($image);

       for ($i=0; $i < $array_len; $i++) { 
          $img_ext = $image[$i]->getClientOriginalExtension();
          $new_img = $image[$i].".".$img_ext;
          $despath = public_path('/images');
          $image[$i]->move($despath,$new_img); 
       }

       $title = $req->input("title");
       $summary = $req->input("summary");
       $content = $req->input("content");
       $publication = $req->input("publication");
       $images = $req->input("images");
       $id = $req->input("id");
       $_token=$req->input("_token");
       $categories = $req->input("categories");
       $lang_id = $req->input('lang_id');
       $post_id = $req->input('post_id');
       $each_contribute = implode(',', (array)$categories);

        $each_images = implode(',', (array)$image);

       $data = array('title' => $title,'_token'=>$_token,'summary' => $summary,'content' => $content ,'publication' => $publication,'images' => $each_images,'categories' => $each_contribute, 'lang_id' => $lang_id );

       $user = DB::table('post_language')->where('post_id', $post_id)->where('lang_id', $lang_id)->first();   

      
       if($user!="")
       {

       DB::table('post_language')
            ->where('post_id', $post_id)
            ->where('lang_id', $lang_id)
            ->update(['title'=>$title,'_token'=>$_token,'summary' => $summary,'content' => $content ,'publication' => $publication,'images' => $image,'categories' => $each_contribute]);

      }
      else
      {
         $data2 = array('title' => $title,'_token'=>$_token,'summary' => $summary,'content' => $content ,'publication' => $publication,'images' => $each_images,'categories' => $each_contribute ,'post_id'=>$post_id ,'lang_id'=>$lang_id);
           DB::table('post_language')->insert($data2);
      }      
       return view('insertdata');
      
    }

    /*-------------------- delete data in database ----------------------*/
    function delete($id)
    {
      $del_code  = Session::get('locale');
      DB::table('post_language')->where('post_id',$id)->where('lang_id',$del_code)->delete();
      return view('insertdata');
    }

    /*-------------------- load category view ----------------------*/
    function categoryview()
    {
       return view('category');
    }

    /*-------------------- inser category data ----------------------*/
    function addcategory(Request $req)
    {
        $cat_name = $req->input('cat_name'); 
        $_token = $req->input('_token');

        $data = array('cat_name' => $cat_name , '_token'=>$_token);

        DB::table('category')->insert($data);
        return view('category');
    }

    /*-------------------- inser category data ----------------------*/
    function editCatData($id)
    {
        $data = DB::table('category')->find($id);

        if(count($data)>0)
        {
            return view('edit_cat',['data'=>$data]);
        }
        else
        {
           echo "fail";
        }
    }

     /*-------------------- update cat data in database ----------------------*/
    function cat_update(Request $req)
    {
        $cat_name = $req->input('cat_name');
        $_token = $req->input('_token');
        $id = $req->input('id');

        $data = array('cat_name' => $cat_name , '_token' => $_token );

        DB::table('category')->where('id',$id)->update(['cat_name'=>$cat_name,'_token'=>$_token]);

        return view('category');
    }

    /*-------------------- delete cat data in database ----------------------*/
    function cat_delete($id)
    {
        DB::table('category')->where('id',$id)->delete();
        return view('category');
    }
    /* ----------------------change languages------------*/

    function swichlanguage()
    {
      if (!\Session::has('locale')) {
          \Session::put('locale', Input::get('locale'));
      }
      else
      {
        session()->put('locale', Input::get('locale'));
         /*Session::set('locale', Input::get('locale'));*/
      }
      return Redirect::back();
    }

    /*----------------------------load languges view------------------*/
    public function languagesview()
    {
      return view('languages');
    }

    /*------------------------add languages----------------------*/
    public function addlanguagesfun(Request $req)
    {
        $lang_name = $req->input('lang_name');
        $lang_code = $req->input('lang_code');
        $_token = $req->input('_token');

        $data = array('_token'=> $_token, 'lang_name' => $lang_name , 'lang_code'=> $lang_code);

        DB::table('languages')->insert($data);
        return view('languages');
    }

   

    public function getlangdata($id)
    {
       $data = DB::table('languages')->find($id);

       if(count($data)>0)
       {
          return view('edit_lang',['data'=>$data]);
       }
       else
       {
          echo 'fail';
       }
    }

    public function editlangdata(Request $req)
    {
       $lang_name = $req->input('lang_name');
       $lang_code = $req->input('lang_code');
       $_token = $req->input('_token');
       $id = $req->input('id');

       $data  = array('lang_name' => $lang_name, 'lang_code' => $lang_code, 'id'=>$id ,'_token'=> $_token );

       DB::table('languages')->where('id',$id)->update(['lang_name'=>$lang_name, 'lang_code'=>$lang_code , '_token'=>$_token]);

       return view('languages');
    }

    public function deletelanddata($id)
    {
      DB::table('languages')->where('id',$id)->delete();
      return view('languages');
    }


  
   
}
