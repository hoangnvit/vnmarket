@extends('layouts.master')

@section('title', 'Index page')

@section('sidebar')
	@parent

	
@endsection

@section('content')

          <?php
        echo "<h1 class='text-success'><u>".count($items)." Posts by : ".  Auth::user()->name."</u></h1>";

        foreach($items as $item)
        {
        echo"<div class='row-12 border border-warning mb-2 border-3 d-flex'>";
               echo "<div class='col-8 border' >";

                        echo "<h1><a href='/vnmarket/public/article/show/".$item['id']."'>".$item['title']."</a></h1> <hr>";
                        echo "<div>";
                        echo "<p>".$item['summary']."</p>";
                        echo "</div>";
                echo"</div>";

                echo"<div class='col-4 border text-center' >";
                        
                      //  echo "<h1>".$item['avatar']."</h1>";
                                echo "<img class='product_avatar ' src='".$item['avatar']."' alt='picture of product'>";
                                echo "<br/>";
                        echo "<h1 class='text-primary'>".$item['price']."&#36;</h1>";
                echo"</div>";
        echo"</div>";

        }

        ?>
   
@endsection

