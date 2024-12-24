@extends('layouts.app')
@section('content')
<body class="host_version"> 

    <!-- Start header -->

	
	<div class="all-title-box">
		<div class="container text-center">
			<h1>Blog Single<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 blog-post-single">
                    <div class="blog-item">
						<div class="image-blog">
							<img src="{{asset('uploads/blogs')}}/{{$blog->image}}" alt="" class="img-fluid">
						</div>
						<div class="post-content">
							<div class="post-date">
								<span class="day">{{$blog->created_at->format('d')}}</span>
								<span class="month">{{ $blog->created_at->format('M') }}</span>
							</div>
							<div class="meta-info-blog">
								<span><i class="fa fa-calendar"></i> <a href="#">{{$blog->created_at->format('Y-m-d')}}</a> </span>
								{{-- <span><i class="fa fa-tag"></i>  <a href="#">News</a> </span> --}}
								<span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
							</div>
							<div class="blog-title">
								<h2><a href="#" title="">{{$blog->title}}.</a></h2>
							</div>
							<div class="blog-desc">
								<p>{{$blog->content}}</p>
								
								
							</div>							
						</div>
					</div>
					
					<div class="blog-author">
						<div class="author-bio">
							<h3 class="author_name"><a href="#">Tom Jobs</a></h3>
							<h5>CEO at <a href="#">SmartEDU</a></h5>
							<p class="author_det">
								Lorem ipsum dolor sit amet, consectetur adip, sed do eiusmod tempor incididunt  ut aut reiciendise voluptat maiores alias consequaturs aut perferendis doloribus omnis saperet docendi nec, eos ea alii molestiae aliquand.
							</p>
						</div>
						<div class="author-desc">
							<img src="{{asset('blogs/images/author.jpg')}}" alt="about author">
							<ul class="author-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-skype"></i></a></li>
							</ul>
						</div>
					</div>
					
					<div class="blog-comments">
						<h4>Comments ({{ $comments->count() }})</h4>
						@foreach($comments as $comment)
						<div id="comment-blog">
							<ul class="comment-list">
								<li class="comment">
									<div class="avatar"><img alt="" src="{{asset('blogs/images/avatar-01.jpg')}}" class="avatar"></div>
									<div class="comment-container">
										<h5 class="comment-author"><a href="#">{{$comment->name}}</a></h5>
										<div class="comment-meta">
											<a href="#" class="comment-date link-style1">{{ $comment->created_at->format('d F Y') }}</a>
											<a class="comment-reply-link link-style3" href="#respond">Reply »</a>
										</div>
										<div class="comment-body">
											<p>{{ $comment->message}}.</p>
										</div>
									</div>
								</li>
								
								@if($comment->replies)
								<ul class="children">
									@foreach($comment->replies as $reply)
									<li class="comment">
										<div class="avatar">
											<img alt="" src="{{ asset('blogs/images/avatar-03.jpg') }}" class="avatar">
										</div>
										<div class="comment-container">
											<h5 class="comment-author"><a href="#">{{ $reply->name }}</a></h5>
											<div class="comment-meta">
												<a href="#" class="comment-date link-style1">{{ $reply->created_at->format('d F Y') }}</a>
												<a class="comment-reply-link link-style3" href="javascript:void(0)" data-comment-id="{{ $reply->id }}">Reply »</a>
											</div>
											<div class="comment-body">
												<p>{{ $reply->message }}</p>
											</div>
										</div>
									</li>
									@endforeach
								</ul>
								@endif
									</ul>
								</li>
							</ul>
						</div>
						@endforeach
					</div>
					<div class="comments-form">
						<h4>Leave a comment</h4>
						<div class="comment-form-main">

							<form action="{{ route('comments.store') }}" method="POST">
								@csrf
								
								<input type="hidden" name="blog_id" value="{{ $blog->id }}"> <!-- Assuming $blog is passed to the view -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="name" placeholder="Name" id="commenter-name" type="text" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="email" placeholder="Email" id="commenter-email" type="email" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" name="url" placeholder="Website URL" id="commenter-url" type="url">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" placeholder="Message" id="commenter-message" cols="30" rows="2" required></textarea>
										</div>
									</div>
									<div class="col-md-12 post-btn">
										<button class="hover-btn-new orange"><span>Post Comment</span></button>
									</div>
								</div>
							</form>
						</div>
					</div>
					
                </div><!-- end col -->
				<div class="col-lg-3 col-12 right-single">
					<div class="widget-search">
						<div class="site-search-area">
							<form method="get" id="site-searchform" action="#">
								<div>
									<input class="input-text form-control" name="search-k" id="search-k" placeholder="Search keywords..." type="text">
									<input id="searchsubmit" value="Search" type="submit">
								</div>
							</form>
						</div>
					</div>
					<div class="widget-categories">
						<h3 class="widget-title">Categories</h3>
						<ul>
							<li><a href="#">Political Science</a></li>
							<li><a href="#">Business Leaders Guide</a></li>
							<li><a href="#">Become a Product Manage</a></li>
							<li><a href="#">Language Education</a></li>
							<li><a href="#">Micro Biology</a></li>
							<li><a href="#">Social Media Management</a></li>
						</ul>
					</div>
					<div class="widget-tags">
						<h3 class="widget-title">Search Tags</h3>
						<ul class="tags">
							<li><a href="#"><b>business</b></a></li>
							<li><a href="#"><b>jquery</b></a></li>
							<li><a href="#">corporate</a></li>
							<li><a href="#">portfolio</a></li>
							<li><a href="#">css3</a></li>
							<li><a href="#"><b>theme</b></a></li>
							<li><a href="#"><b>html5</b></a></li>
							<li><a href="#"><b>mysql</b></a></li>
							<li><a href="#">multipurpose</a></li>
							<li><a href="#">responsive</a></li>
							<li><a href="#">premium</a></li>
							<li><a href="#">javascript</a></li>
							<li><a href="#"><b>Best jQuery</b></a></li>
						</ul>
					</div>
				</div>
            </div>
        </div>
    </div>
</body>
@endsection
@push('scripts')

<script>
    document.querySelectorAll('.comment-reply-link').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const commentId = this.getAttribute('data-comment-id');
            const form = document.getElementById(`reply-form-${commentId}`);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });
    });
</script>
@endpush
