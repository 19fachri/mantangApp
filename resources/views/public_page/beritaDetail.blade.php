@extends('layouts.public_layout')
@section('title')
<% $data->judul %>
@endsection
@section('page_cover')
<% asset('uploads/cover/'.$data->cover) %>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8">
			<article>
				<div class="post-image">
					<div class="post-heading">
						<h3><% $data->judul %></h3>
						<h5><i class="fa fa-calendar"></i><a href="#"> Ditulis pada : <% $data->created_at %></a></h5>
					</div>
					<img src="<% asset('uploads/cover/'.$data->cover) %>" alt="" class="img-responsive" />
				</div>
				<p>{!! $data->deskripsi !!}</p>
			</article>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8">
			<div id="disqus_thread"></div>
		</div>
	</div>
</div>
@endsection
@section('script')
<!-- <script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
	var d = document, s = d.createElement('script');
	s.src = '//desamantang.disqus.com/embed.js';
	s.setAttribute('data-timestamp', +new Date());
	(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
 -->@endsection