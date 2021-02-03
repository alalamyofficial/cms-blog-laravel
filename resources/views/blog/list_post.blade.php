@include('template_post.head')

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">

                    @foreach($data as $post)
					<!-- post -->
					<div class="post post-row" style="left:-50px">
						<a class="post-img" href="{{route('postContent' ,  $post->slug )}}"><img src="{{ asset($post->image)}}" alt="{{$post->title}}"></a>
						<div class="post-body">
							<h3 class="post-title"><a href="{{route('postContent' ,  $post->slug )}}"> {{ $post->title }} </a></h3>
							<div class="post-category">
								<a href="category.html">{{$post->category->name}}</a>
							</div>
							<ul class="post-meta">
								<li><a href="author.html">{{$post->users->name}}</a></li>
								<li>{{$post->created_at->diffForHumans()}}</li>
							</ul>
							<p> {!!$post->content!!} </p>
						</div>
					</div>
                    @endforeach
					<!-- /post -->

					<div class="section-row loadmore text-center">

                        {!! $data->links() !!}

					</div>
				</div>

				<div class="col-md-4">
					<!-- ad widget-->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-3.jpg" alt="">
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
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->




@include('template_post.footer')
