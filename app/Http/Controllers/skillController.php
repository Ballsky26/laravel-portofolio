<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class skillController extends Controller
{
    public function index()
    {
        $skill_url = public_path('admin/devicon.json');
        $skill_data = file_get_contents($skill_url);
        $skill_data = json_decode($skill_data, true);
        $skill = array_column($skill_data, 'name');
        $skill = "'" . implode("','", $skill) . "'";
        return view('dashboard.skill.index', [
            'title' => 'Skill',
            'subtitle' => 'Halaman Skill',
            'skill' => $skill
        ]);
    }
    public function update(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate(
                [
                    '_language' => 'required',
                    '_workflow' => 'required'
                ],
                [
                    '_language.required' => 'Silahkan masukkan bahasa pemprograman yang kamu kuasai',
                    '_workflow.required' => 'Silahkan masukkan workflow yang kamu kuasai',
                ]
            );
            metadata::updateOrCreate(['meta_key' => '_language'], ['meta_value' => $request->_language]);
            metadata::updateOrCreate(['meta_key' => '_workflow'], ['meta_value' => $request->_workflow]);
            Alert::success('Success', 'Berhasil Mengubah Data');
            return redirect()->route('skill.index')->with('success', 'Berhasil Melakukan update Skill');
        }
    }
}
