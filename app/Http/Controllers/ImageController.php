<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
  
    public function storeImage(Request $request)
    {
       $this->validate($request, [
           'image'=>'required'
       ]);
       
       if($request->hasFile('image')){
            $image = $request->file('image');
            $new_name = rand() .'.'. $image->getClientOriginalExtension();
            $image->move(public_path('images'),$new_name);
            $fileImage = new Image;
            $fileImage->image = $new_name;
            $fileImage->save();
       }else{
           return 'No file selected';
       }

        $client = new \GuzzleHttp\Client();      
        $apiUrl = 'https://api.openalpr.com/v2/recognize?recognize_vehicle=0&country=eu&secret_key=sk_8b541c25e9b8b8051f8ba0f4';
        $imagePath = public_path('images') . '\\' . $new_name;

        $res = $client->request('POST', $apiUrl, [
            'multipart' => [
                    [
                    'name' => 'image',
                    'contents' => fopen($imagePath, 'r')
                    ]
                ]
            ]
        );
   
        $responseArray = json_decode($res->getBody(), true);

        if(!empty($responseArray["results"][0])){
        $responseResultArray = $responseArray["results"][0];
        }else{
            Session::flash('error', 'Number plate was not recognized!');
            return Redirect::to('/admin');
        }
        
        $plateNumber = $responseResultArray["plate"];

       $services = DB::table('cars')
            ->leftJoin('car_services', 'cars.id', '=', 'car_services.car_id')
            ->where('plate_number', $plateNumber)
            ->get();

        if($services->isEmpty()){
            Session::flash('error', 'Number plate was not registered in data base!');
            return Redirect::to('/admin');
        }
            
        foreach($services as $service){
        $service_id = $service->id;
            if( $service_id==null){
                Session::flash('error', 'Service was not registered in data base!');
                return Redirect::to('/admin');
            }
        }  
        return redirect()->route('profile_image');

    
    }
}
