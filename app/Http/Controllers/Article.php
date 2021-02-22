<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Group as GroupModel;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Article as ArticleModel;


class Article extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user())
            {   
                $groups= GroupModel::all();

                return view('articles.create',['items'=>$groups]);
            }
        else  return view('auth.login');
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {
        
        
        $article = new  ArticleModel;
        $article->title=request('title');
        $article->summary= request('summary');
        $article->content=request('content');
        $article->price= request('price');
        $article->group_id=request('group_id');
        
        $article->user_id= Auth::user()->id;
       
        
       // $imageName = time().'.'.$request->image->extension();  
       if ($request->file('pic')) {
        $imagePath = $request->file('pic');
        $imageName = time().$imagePath->getClientOriginalName();
        $path = $request->file('pic')->storeAs('images', $imageName, 'public');
    }
        else $imageName ='noooooooo';

        $article->avatar=$path;
        $article->save();

        return redirect()->route('home');

       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $item= ArticleModel::Where("id",$id)->first();

        $name= ArticleModel::Where("id",$id)->first()->user->name;
        return view("articles/show",["item"=>$item,'name'=>$name]);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 
     * get all articles from an user
     */
    public function showbyuser()
    {
        //
        if (Auth::user())
            {   
                $userid=Auth::user()->id;
                $items= ArticleModel::Where("user_id",$userid)->get();


                return view("articles/showbyuser",["items"=>$items]);
            }
        else  return view('auth.login');

   
    }

    public function search()
    {
        return view('articles.search');
    }


    public function searchPost(Request $request)
    {
        $keyword=request('keyword');
        $items= ArticleModel::Where("summary",'like',$keyword)->get();
        
        //return response()->json(['success'=>$items]);
        return response()->json($items);
    }

  
}
