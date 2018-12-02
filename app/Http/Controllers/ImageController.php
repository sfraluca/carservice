<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use DB;

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
        $responseResultArray = $responseArray["results"][0];
        $plateNumber = $responseResultArray["plate"];dd($plateNumber);

        $services = DB::table('cars')->select('id')->where('plate_number', $plateNumber)->get();

        foreach($services as $service){
            $service_id = $service->id;
            $url = 'admins/service/show/'. $service_id .'?';
        }

        return redirect($url);

    }
}
