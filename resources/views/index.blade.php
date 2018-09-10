

@extends('layouts.main')
@extends('components.navbar')
@section('content')

        <div class="page home">
        	<div class="pageWrapper">
        		<div class="centeredContainer">
        			<div class="catchZone">
        				<div class="hello">
        					<span id="intro">
        						<span>H</span>
        						<span>e</span>
        						<span>l</span>
        						<span>l</span>
        						<span>o</span>
        						<span>.</span>
        					</span>
        				</div>
        			</div>

        			<div class="catchPhrase">
        				<p>
    						<span>Pendataan Piket</span>
                <span>has never been so cool.</span>
        				</p>
        			</div>

        		</div>
        	</div>
        </div>

    @include('components.footer')

@endsection