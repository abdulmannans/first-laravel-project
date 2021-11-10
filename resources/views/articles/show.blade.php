@extends ('layout')

@section ('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2> {{$article->title}} </h2>
				<span class="byline"> {{$article->excerpt}} </span> </div>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			<p> {{$article->body}} </p>

			<p style="margin-top: 1em">
				Tags:<br>
				@foreach($article->tags as $tag)
					<a style="padding: 1em"href="/articles?tag={{ $tag->name }}"> {{$tag->name}} </a>
					<br>
				@endforeach

			</p>
			</div>
	</div>
</div>

@endsection