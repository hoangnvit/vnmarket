@extends('layouts.master')

@section('title', 'Index page')

@section('sidebar')
	@parent

	
@endsection

@section('content')

          <?php

          //echo $name;
          echo "<div class='border rounded border-warning m-2 p-2'>";
          
          echo  "<h2 class='text-primary'><u>".$item['title']."</u></h2>";
          echo "<p> Author: ".$name."<br>"."Created time: ". $item['created_at']."</p> <hr>";
          
          //echo $item['summary'];

          echo "<div class='image_responsive'>".$item['content']."</div>";
          
         // echo $item['price'];
         echo "</div>";
         
          

        ?>
   
@endsection

