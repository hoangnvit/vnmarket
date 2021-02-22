@extends('layouts.master')

@section('title', 'Index page')

@section('sidebar')
	@parent

	
@endsection

@section('content')

        <div id="all_cats">
	
        <?php

        //echo $items;
        foreach($items as $item){
            echo "<div class='cat_block'>";
            echo "<img src='storage/".$item->avatar."'>";
            echo "<h3><a href='group/".$item->id."'>".$item->name."</a></h3>";
            echo "</div>";


        }
        ?>
        </div>
   
@endsection

