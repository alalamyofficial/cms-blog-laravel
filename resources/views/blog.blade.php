@extends('template_post.content')

@section('postcontent')

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					@foreach($randomPost1 as $randPost)
					<div class="post post-thumb">
						<a class="post-img" href="{{route('postContent' ,  $randPost->slug )}}"><img src="{{$randPost->image}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{$randPost->category->name}}</a>
							</div>
							<h3 class="post-title title-lg"><a href="{{route('postContent' ,  $randPost->slug )}}">{{$randPost->title}}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{$randPost->users->name}}</a></li>
								<li>{{$randPost->created_at->diffForHumans()}}</li>
							</ul>
						</div>
					</div>
					@endforeach
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					@foreach($randomPost2 as $randPost)
					<div class="post post-thumb">
						<a class="post-img" href="{{route('postContent' ,  $randPost->slug )}}"><img src="{{$randPost->image}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{$randPost->category->name}}</a>
							</div>
							<h3 class="post-title"><a href="{{route('postContent' ,  $randPost->slug )}}">{{$randPost->title}}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{$randPost->users->name}}</a></li>
								<li>{{$randPost->created_at->diffForHumans()}}</li>
							</ul>
						</div>
					</div>
					@endforeach
					<!-- /post -->

					<!-- post -->
					@foreach($randomPost3 as $randPost)
					<div class="post post-thumb">
						<a class="post-img" href="{{route('postContent' ,  $randPost->slug )}}"><img src="{{$randPost->image}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{$randPost->category->name}}</a>
							</div>
							<h3 class="post-title"><a href="{{route('postContent' ,  $randPost->slug )}}">{{$randPost->title}}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>{{$randPost->created_at->diffForHumans()}}</li>
							</ul>
						</div>
					</div>
					@endforeach
					<!-- /post -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Recent posts</h2>
							</div>
						</div>
                        <!-- post -->
                        @foreach($data as $post)
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="{{route('postContent' ,  $post->slug )}}"><img src="{{$post->image}}" alt="" style="height: 300px"></a>
								<div class="post-body">
                                    <h2 class="post-title"><a href="{{route('postContent' ,  $post->slug )}}">{{$post->title}}</a></h2>
									<div class="post-category">
										<a href="category.html">{{$post->category->name}}</a>
									</div>
									
									<ul class="post-meta">
										<li><a href="author.html">{{$post->users->name}}</a></li>
										<li>{{$post->created_at->diffForHumans()}}</li>
									</ul>
								</div>
							</div>
                        </div>
                        @endforeach
						<!-- /post -->

					</div>
					<!-- /row -->
				</div>
				<div class="col-md-4">
					<!-- ad widget-->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="{{asset('frontend/img/ad-3.jpg')}}" alt="">
						</a>
					</div>
					<!-- /ad widget -->

					<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Social Media</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="#" class="social-facebook">
										<i class="fa fa-facebook"></i>
										<span>21.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-twitter">
										<i class="fa fa-twitter"></i>
										<span>10.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
										<span>5K<br>Followers</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /social widget -->

					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>
						<div class="category-widget">
							<ul>
                                @foreach($data_category as $category)
                                <li><a href="{{route('listCategories', $category->slug)}}">{{$category->name}} <span>{{$category->posts->count()}}</span></a></li>
                                @endforeach
							</ul>
						</div>
					</div>
					<!-- /category widget -->

					<!-- newsletter widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Newsletter</h2>
						</div>
						<div class="newsletter-widget">
							<form>
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" name="newsletter" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->

					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Popular Posts</h2>
						</div>

						<!-- post -->
						@foreach($randomPopularPosts as $post)
						<div class="post post-widget">
							<a class="post-img" href="{{route('postContent' ,  $post->slug )}}"><img src="{{$post->image}}" alt="{{$post->title}}"></a>
							<div class="post-body">
								<div class="post-category">
									<a href="category.html">{{$post->category->name}}</a>
								</div>
								<h3 class="post-title"><a href="{{route('postContent' ,  $post->slug )}}">{{$post->title}}</a></h3>
							</div>
						</div>
						@endforeach
						<!-- /post -->
					</div>
					<!-- /post widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ad -->
				<div class="col-md-12 section-row text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="{{asset('frontend/img/ad-2.jpg')}}" alt="">
					</a>
				</div>
				<!-- /ad -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->



@endsection