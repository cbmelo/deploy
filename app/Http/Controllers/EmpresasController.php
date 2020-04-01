<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Empresa;
use App\User;
use App\CompanyImage;

class EmpresasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $user_id = auth()->user('id');
       // $user = User::find($user_id);
       // $empresas = $user->empresas()->orderBy('created_at', 'desc')->paginate(1);
      //  return view('empresas.index')->with('empresas', $empresas);

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $empresas = $user->empresas()->orderBy('created_at','desc')->paginate(1);
        return view('empresas.index')->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'owner' => 'required',
            'company_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'website' => 'required',
            'fanpage' => 'required',
            'instagram' => 'required',
            'description' => 'required',
            'logo' => 'image|nullable|max:1999'

        ]);

        //Handle file upload
        if($request->hasFile('logo')){

            //Get file name with extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('logo')->storeAs('public/cover_images', $fileNameToStore);

         } else {
                $fileNameToStore = 'noimage.jpg';
            }

        // Register new company
        $post = New Empresa;
        $post->owner = $request->input('owner');
        $post->company_name = $request->input('company_name');
        $post->email = $request->input('email');
        $post->phone = $request->input('phone');
        $post->address = $request->input('address');
        $post->address2 = $request->input('address2');
        $post->city = $request->input('city');
        $post->state = $request->input('state');
        $post->country = $request->input('country');
        $post->zipcode = $request->input('zipcode');
        $post->website = $request->input('website');
        $post->fanpage = $request->input('fanpage');
        $post->instagram = $request->input('instagram');
        $post->youtube = $request->input('youtube');
        $post->twitter = $request->input('twitter');
        $post->description = $request->input('description');
        $post->logo = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();

        for($i = 0; $i < count($request->allFiles()['images']); $i++) {
            $file = $request->allFiles()['images'][$i];

            $companyImage = New CompanyImage();
            $companyImage->empresa_id = $post->id;
            $companyImage->image = $file->store('company_images/'. $post->id);
            $companyImage->save();
            unset($companyImage);


        }
        
        return redirect('/empresas')->with('success', 'Company Registered');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);
        return view('empresas.show')->with('empresa', $empresa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        return view('empresas.edit')->with('empresa', $empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'owner' => 'required',
            'company_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'fanpage' => 'required',
            'instagram' => 'required',
            'description' => 'required',
            'logo' => 'required|image|nullable|max:1999'

        ]);

        //Handle file upload
        if($request->hasFile('logo')){

            //Get file name with extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            //File to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('logo')->storeAs('public/cover_images', $fileNameToStore);

         } else {
                $fileNameToStore = 'noimage.jpg';
            }

        // Register new company
        $post = Empresa::find($id);
        $post->user_id = 1;
        $post->owner = $request->input('owner');
        $post->company_name = $request->input('company_name');
        $post->email = $request->input('email');
        $post->phone = $request->input('phone');
        $post->address = $request->input('address');
        $post->address2 = $request->input('address2');
        $post->city = $request->input('city');
        $post->state = $request->input('state');
        $post->country = $request->input('country');
        $post->zipcode = $request->input('zipcode');
        $post->website = $request->input('website');
        $post->fanpage = $request->input('fanpage');
        $post->instagram = $request->input('instagram');
        $post->youtube = $request->input('youtube');
        $post->twitter = $request->input('twitter');
        $post->description = $request->input('description');
        $post->logo = $fileNameToStore;
        $post->save();
        
        return redirect('/empresas')->with('success', 'Company info updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);

        //Check the correct user
        if(auth()->user()->id !==$empresa->user_id){
            return redirect('/empresas')->with('error', 'You not authorized');
        }

        if($empresa->logo != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$empresa->logo);


        }

        $empresa->delete();
        return redirect('/empresas')->with('success', 'Company Deleted Successfully');

    }
}
