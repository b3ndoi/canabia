@extends('layouts.front')

@section('content')
<section class="page_breadcrumbs ds parallax section_padding_top_40 section_padding_bottom_40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>My Cart</h2>
                <ol class="breadcrumb greylinks color4">
                    <li> 
                        <a href="/">
                            Home
                        </a> 
                    </li>
                    <li class="active">My Cart</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_top_100 section_padding_bottom_75 columns_padding_25">
	<div class="container">
		<cart></cart>
	</div>
</section>
@endsection