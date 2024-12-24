@extends('layouts.app')
@section('content')



<body class="host_version"> 

   	<div class="all-title-box">
		<div class="container text-center">
			<h1>Blog<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
                </div>
            </div><!-- end title -->

            <hr class="invis"> 

            <div class="row"> 
				@foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-item">
						<div class="image-blog">
							<img src="{{asset('uploads/blogs')}}/{{$blog->image}}" alt="" class="img-fluid">
						</div>
						<div class="meta-info-blog">
							<span><i class="fa fa-calendar"></i> <a href="#">{{$blog->created_at->format('Y-m-d')}}</a> </span>
                            <span><i class="fa fa-tag"></i>  <a href="#">News</a> </span>
                            <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
						</div>
						<div class="blog-title">
							<h2><a href="#" title="">{{$blog->title}}.</a></h2>
						</div>
						<div class="blog-desc">
							<p>{{ Str::words($blog->content, 20, '...') }} </p>
						</div>
						<div class="blog-button">
							<a class="hover-btn-new orange" href="{{ route('blog.show', ['id' => $blog->id]) }}"><span>Read More<span></a>
						</div>
					</div>
                </div><!-- end col -->
@endforeach
              
            </div><!-- end row -->

            <hr class="hr3"> 

         
        </div><!-- end container -->
    </div><!-- end section -->

  

      
   


@endsection
