<?php

namespace App\Http\Controllers\API\Admin\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Setting\Setting;
use App\Support\ImageSupport;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    protected $setting;
    protected $data;
    protected $imageSupport;
    protected $imageWidth = 500;
    protected $imageheight = 500;
    function __construct(Setting $setting, ImageSupport $imageSupport)
    {
        $this->middleware('auth');
        $this->setting=$setting;
        $this->imageSupport = $imageSupport;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $setting = $this->setting->find(1);
        $this->data['setting']=$setting;
        if($setting){
            $this->data['message']='Setting Form and Setting Data';
            return response()->json($this->data, 200);
        }
        $this->data['message']='Setting Form';
        return response()->json($this->data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input, [
            'name'=>'required',
            'p_email'=>'required',
            'm_no'=>'required',
        ]);
        if(!$request->file('logo')==''){
            $input['logo']=$this->imageSupport->saveAnyImg($request, 'settings', 'logo', $this->imageWidth, $this->imageHeight);
        }
        if($validator->fails()){
            return response()->json($validator->errors(), 403);
        }
        $this->setting->create($input);
        $this->data['message']='Successfully Setting Created';
        return response()->json($this->data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Setting\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Setting\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
        $this->data['setting']=$setting;
        $this->data['message']='Setting Data';
        return response()->json($this->data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Setting\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input, [
            'name'=>'required',
            'p_email'=>'required',
            'm_no'=>'required',
        ]);
        if(!$request->file('logo')==''){
            $this->imageSupport->deleteImg('setting', $setting->logo);
            $input['logo']=$this->imageSupport->saveAnyImg($request, 'settings', 'logo', $this->imageWidth, $this->imageHeight);
        }
        $this->setting=$setting;
        if($validator->fails()){
            return response()->json($validator->errors(), 403);
        }
        $this->setting->update($input);
        $this->data['message']='Successfully Setting Updated';
        return response()->json($this->data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Setting\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
