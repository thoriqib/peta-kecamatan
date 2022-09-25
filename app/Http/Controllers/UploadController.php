<?php

namespace App\Http\Controllers;

use App\Gambar;
use App\Kecamatan;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload', [
            'data_kec' => Kecamatan::orderBy('nama')->get()
        ]);
    }

    public function store(Request $request)
    {
        $image = $request->file('image');

        //get location of image
        $imgLocation = $this->get_image_location($image->getRealPath());
        $kecamatan = Kecamatan::where('id', $request->input('kecamatan_id'))->first();

        if ($imgLocation == false) {
            return redirect()->to('/upload')->with('error','Gambar tidak memiliki atribut georeferensi');
        }

        $imgName = time().'.'.$image->extension();  

        $image->move(public_path('images'), $imgName);
        //latitude & longitude
        $imgLat = $imgLocation['latitude'];
        $imgLng = $imgLocation['longitude'];

        Gambar::create([
            'nama' => $imgName,
            'kecamatan_id' => $request->input('kecamatan_id'),
            'lat' => $imgLat,
            'long' => $imgLng
        ]);

        return redirect()->to("peta/$kecamatan->slug")->with('success','Sukses mengupload gambar');
    }

    function gps2Num($coordPart){
        $parts = explode('/', $coordPart);
        if(count($parts) <= 0)
            return 0;
        if(count($parts) == 1)
            return $parts[0];
        return floatval($parts[0]) / floatval($parts[1]);
    }

    /**
     * get_image_location
     * Returns an array of latitude and longitude from the Image file
     * @param $image file path
     * @return multitype:array|boolean
     */
    function get_image_location($image = ''){
        $exif = exif_read_data($image, 0, true);
        if($exif && isset($exif['GPS']) && $exif['GPS']['GPSLatitudeRef'] != null){
            $GPSLatitudeRef = $exif['GPS']['GPSLatitudeRef'];
            $GPSLatitude    = $exif['GPS']['GPSLatitude'];
            $GPSLongitudeRef= $exif['GPS']['GPSLongitudeRef'];
            $GPSLongitude   = $exif['GPS']['GPSLongitude'];
            
            $lat_degrees = count($GPSLatitude) > 0 ? $this->gps2Num($GPSLatitude[0]) : 0;
            $lat_minutes = count($GPSLatitude) > 1 ? $this->gps2Num($GPSLatitude[1]) : 0;
            $lat_seconds = count($GPSLatitude) > 2 ? $this->gps2Num($GPSLatitude[2]) : 0;
            
            $lon_degrees = count($GPSLongitude) > 0 ? $this->gps2Num($GPSLongitude[0]) : 0;
            $lon_minutes = count($GPSLongitude) > 1 ? $this->gps2Num($GPSLongitude[1]) : 0;
            $lon_seconds = count($GPSLongitude) > 2 ? $this->gps2Num($GPSLongitude[2]) : 0;
            
            $lat_direction = ($GPSLatitudeRef == 'W' or $GPSLatitudeRef == 'S') ? -1 : 1;
            $lon_direction = ($GPSLongitudeRef == 'W' or $GPSLongitudeRef == 'S') ? -1 : 1;
            
            $latitude = $lat_direction * ($lat_degrees + ($lat_minutes / 60) + ($lat_seconds / (60*60)));
            $longitude = $lon_direction * ($lon_degrees + ($lon_minutes / 60) + ($lon_seconds / (60*60)));

            return array('latitude'=>$latitude, 'longitude'=>$longitude);
        }else{
            return false;
        }
    }
}
