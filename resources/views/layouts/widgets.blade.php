<style type="text/css">
	#popup{
		position: absolute;
		bottom: 1em;
		right: 1em;
		padding: 1em;
		//border: .2em blue solid;
		border-radius:1em;
		background-color: #2B127B;
		color: white;
	}
	#popup #close{
		position: absolute;
		//text-decoration: underline;
		top: 1em;
		right: 1em;
	}
	#popup #close a{
		color: yellow;
		cursor: pointer;
	}
	
	#popup #message{
		color: white;
		padding: 1em;
		display: block;
	}

	#popup #title{
		margin-right: 1.5em;
		display: block;
		color:#A1F0EB ;
	}

</style>
@if(Session::has('mensaje'))
<div id="popup">
	<div id="close"><a onclick="hide('popup')">[x]</a></div>
	<div id="title">
		@if(Session::has('mensaje'))
			{{Session::get('mensaje')['title']}}
		@endif
	</div>
	<div id="message">
		@if(Session::has('mensaje'))
			{{Session::get('mensaje')['text']}}
		@endif
	</div>
</div>
@endif
<script type="text/javascript">
	function hide(id){
		$('#'+id).hide();
	}
	function show(id){
		$('#'+id).show();
	}
</script>