<!DOCTYPE html>
<html>
<head>
	<title>ASID</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
	@foreach ([	'underscore.js',
							'jquery-1.11.3.js',
							'backbone.js'] as $lib)
{!!
Html::script('js/lib/'.$lib, ['type'=>'text/javascript'])
!!}
	@endforeach
{!! Html::script('js/app.js', ['type'=>'text/javascript']) !!}
{!! Html::script('js/main.js', ['type'=>'text/javascript']) !!}
{!! Html::style('css/reset.css') !!}
{!! Html::style('css/layout.css') !!}
{!! Html::style('css/list.css') !!}