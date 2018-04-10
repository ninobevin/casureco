<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Model\ArchiveItem;

class ArchiveController extends Controller
{
   


	// private $ftp;



	// public function __construct(){


	// 	$this->ftp = Storage::createFtpDriver([
 //       'host'     => '172.16.0.22',
 //       'username' => 'admin',
 //       'password' => 'letmein1234',
 //       'port'     => '21', // your ftp port
 //       'timeout'  => '30', // timeout setting
 //       'root'     => 'cas1-brontokII/',
	//  	]); 
          
	// }

	public function uploadIndex(Request $request){


		return view('page.archive.uploadIndex');


	}
	public function linkFile(Request $request){


		// if(isset($request->document))
		// return $request;


		return view('page.archive.linkFile');
	
	}
	public function linkPost(Request $request){
		

		//return dd($request->file('document'));
		//return $request;

		// id	int(11) AI PK
		// archive_archive_type_id	int(11)
		// name	varchar(45)
		// description	varchar(45)
		// date	year(4)
		// department_id	int(11)
		// user_id	int(11)
		// created_at	datetime
		// updated_at	datetime
		// file_link	varchar(300)
		$archive = new ArchiveItem();
		$archive->archive_archive_type_id = $request->type;
		$archive->name =  ucwords(strtolower($request->name));
		$archive->description = strtoupper($request->description);
		$archive->file_link = $request->document;
		


			if($archive->save()){

			  \Session::flash('success_msg','Archive link success.');

		                    if(!empty(trim($request->imgpic)))
		                     {
		                          Storage::put('public/consumer/'.$Consumer->reference_no.'.jpeg',base64_decode($request->imgpic));
		                     }

		                     if(!empty(trim($request->img_signature)))
		                    {
		                           Storage::put('public/signature/'.$Consumer->reference_no.'.svg',base64_decode($request->img_signature));
		                    }
			                 
			}else{

			 \Session::flash('error_msg','Sorry somthing\'s wrong...');
		 
			}



		return redirect()->back();
	}



	public function index(Request $request){

			
			$ArchiveItem = [];

			if(isset($request->search)){

				 $ArchiveItem = ArchiveItem::where('description','like','%'.$request->search.'%')
				 							->orWhere('name','like','%'.$request->search.'%')->get();

			}

			return view('page.archive.index',['ArchiveItem'=> $ArchiveItem]);
	}


	public function getFile(Request $request){

			//return $request->url_get;
		//	dd(Storage::disk('ftp')->download('PMS/2017/012017/IMG_9593.JPG'));
			// if(Storage::disk('ftp')->getFile('PMS/2017/012017/IMG_9593.JPG'))
			// 	{
			// 		return 'yes';
			// 	};
			return view('page.archive.index');


	}


}






