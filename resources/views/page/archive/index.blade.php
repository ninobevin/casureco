@extends('layouts.app')


@section('page-title')
	Archive
@endsection

@section('content-title')
	Archive Files
@endsection

@section('content')
{{-- id	int(11) AI PK
archive_archive_type_id	int(11)
name	varchar(45)
description	varchar(45)
date	year(4)
department_id	int(11)
user_id	int(11)
created_at	datetime
updated_at	datetime --}}

<?php


if(isset($_REQUEST['url']))
{
	$url = $_REQUEST['url'];
}else{
	$url = '';
}

$url_group =  explode('/', $url);
$lastElementKey = end($url_group);


$Directories = Storage::disk('ftp')->directories($url);

$Files = Storage::disk('ftp')->files($url);


?>



<p class="text-muted"> {{ $url }} </p>


<form>

	<input type="text" name="search">
	<button>Search</button>
</form>
<hr>

<div class="">


	<ul class="list-group">


	@if(count($ArchiveItem) <= 0)


		@foreach( $Directories as $dir )


			<li class="list-group-item"><i class="fa fa-folder"></i>
				<a href='{{ route("archive.index",["url"=>$dir."/"]) }}'>
				{{ explode("/",$dir)[count(explode("/",$dir)) - 1]  }}
				</a>
			</li>


		@endforeach


		@foreach($Files as $files)


		<?php

			$path = "ftp://172.16.0.22/cas1-shared/CASURECO I Archive/".$files;
			$filename = explode("/",$files)[count(explode("/",$files)) - 1];
			$file_info = App\Model\ArchiveItem::where('file_link','=',$path)->get()->first();

		?>
			<li class="list-group-item">
				<p class="lead">{{ @$file_info->name }}</p>
				<p class="text-muted">{{ @$file_info->description }}</p>
				{{-- 
				<a href='{{ dd(Storage::disk("ftp")->getDriver()) }}'>
					{{  explode("/",$files)[count(explode("/",$files)) - 1] }}
				</a> --}}
				<span><i class="fa fa-download"></i>
							<a href='ftp://172.16.0.22/cas1-shared/CASURECO I Archive/{{$files }}'>
								{{  $filename }} 
							</a>
				</span>
				<span class="pull-right">
				<i class="fa fa-link"></i>
							<a class="text-muted" href='{{ route("archive.linkFile",["document"=>"ftp://172.16.0.22/cas1-shared/CASURECO I Archive/".$files,
																  "name" => $filename]) }}'>
								Link - tag
							</a>
				</span>

			</li>
		@endforeach

	@else


		@foreach($ArchiveItem as $item)


		<?php

			$file = explode("/",$item->file_link)[count(explode("/",$item->file_link)) - 1];
			$path = $item->file_link;
			
		

		?>
			<li class="list-group-item">
				<p class="lead"><u>{{ @$item->name }}</u></p>
				<p class="text-muted">{{ @$item->description }}</p>
				{{-- 
				<a href='{{ dd(Storage::disk("ftp")->getDriver()) }}'>
					{{  explode("/",$files)[count(explode("/",$files)) - 1] }}
				</a> --}}
				<i class="fa fa-download"></i>
							<a href='{{ $item->file_link  }}'>
								{{  $file }} 
							</a>
			</li>
		@endforeach

	@endif


	</ul>



</div>





@endsection