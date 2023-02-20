<?php

namespace App\Http\Controllers;

// use App\Http\Requests\CertificateRequest;
use Illuminate\Http\Request;

use App\Http\Requests\CertificatesRequest;
use App\Models\Certificate;

class CertificateController extends Controller
{
    
    public function index()
    {

            $certificates = Certificate::paginate(10);
            // dd($certificate);
            return view('certificates.index',[

           'certificates' => $certificates]);
    }


    public function create()
    {
        return view('certificates.create');
    }


    public function store(CertificatesRequest $request)
    {
        // $request->validated();
        //dd($request->all());
        Certificate::create([
            'name'=>$request->name,
            'sex'=>$request->sex,
            'phone'=>$request->phone,
            'certificate_num'=>$request->certificate_num,
            'year'=>$request->year,
            'training_centre'=>$request->training_centre,
            'lga'=>$request->lga,
            'lga_code'=>$request->lga_code,
            'institution'=>$request->institution,
            'institution_code'=>$request->institution_code,
            'photo'=>'photo',
            
        ]);
        $request->session()->flash('alert-success', 'Certificate Created Successfully');
        return to_route('certificate.index');
    }
    
    public function show($id)
    {
       $certificate = Certificate::find($id);
        if(! $certificate){
            request()->session()->flash('error', 'unable to locate the Certificate');
        return to_route('certificates.index')->withErrors([
            'error'=>'unable to locate the Certificate']);
        }
        return view('certificates.show', ['certificate' => $certificate]);
    }
     

    public function edit($id)
    {
              $certificate = Certificate::find($id);
        if(! $certificate){
            request()->session()->flash('error', 'unable to locate the Certificate');

        return to_route('certificates.index')->withErrors([
            'error'=>'unable to locate the Certificate']);
        }
        return view('certificates.edit', ['certificate' => $certificate]);
    }

    public function update(CertificatesRequest $request)

    {
        
        $certificate = Certificate::find($request->certificate_id);
        if(! $certificate){
            request()->Session()->flash('error', 'unable to locate the Certificate');

        return to_route('certificates.index')->withErrors([
            'error'=>'unable to locate the Certificate']);
        }

      $certificate->update([
        
            'name'=>$request->name,
            'sex'=>$request->sex,
            'phone'=>$request->phone,
            'certificate_num'=>$request->certificate_num,
            'year'=>$request->year,
            'training_centre'=>$request->training_centre,
            'lga'=>$request->lga,
            'lga_code'=>$request->lga,
            'institution'=>$request->institution,
            'institution_code'=>$request->institution_code,
      ]);
      request()->session()->flash('alert-success', 'Certificate Updated Successfully');
      return to_route('certificate.index');
}

public function destroy(Request $request)
{
 
    $certificate= Certificate::find($request->certificate_id);
   
    if(! $certificate) {
      request()->session()->flash('error', 'unable to locate the Certificate');
      return to_route('certificate.index')->witherrors([
         'error'=>'unable to locate Certificate'
      ]);
   }

  $certificate->delete();

  request()->session()->flash('alert-success', 'Certificate Deleted Sucessfully');
  request()->session('Do you really want to delete the Certificate?');

  return to_route('certificate.index');
}

public function generateCode()
    {
      return view('/home');
    }

    public function lockscreen()
    {
        return view('/lockscreen');
    }


}


