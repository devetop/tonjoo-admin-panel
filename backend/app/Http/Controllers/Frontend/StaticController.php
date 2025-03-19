<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Post;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function __construct()
    {

        if (env('APP_ENV') === 'production') {
            abort(403, 'Access denied');
        }
    }

    public function html(Request $request,$any = null)
    {
        if ($request->dummy_endpoint == 1) {
            $this->getDummyEndpoint($request, $any);
        }

        $path = $any == null ? '/' : $any;
        $sanitizedPath = str_replace('..', '', $path);

        if($sanitizedPath == '/' )
            $sanitizedPath = 'index';
        
        // Prevent directory traversal
        if (strpos($sanitizedPath, '..') !== false) {
            abort(403, 'Invalid path');
        }

        $sanitizedPath = str_replace('/','.',$sanitizedPath);
        $sanitizedPath = str_replace('php','',$sanitizedPath);
        $sanitizedPath = (substr($sanitizedPath, -1) == '.') ? substr($sanitizedPath, 0, -1) : $sanitizedPath;

        if (!file_exists(resource_path('views/html/' . $sanitizedPath . '.blade.php'))) {
            abort(404);
        }
        
        return view('html.'.$sanitizedPath);
    }

    public function jsx(Request $request, $any = null)
    {
        if ($request->dummy_endpoint == 1) {
            return $this->getDummyEndpoint($request, $any);
        }

        $data = $this->getJsonData($any);
        $rootView = 'inertia-root.static';

        if(is_null($any)) {
            return inertia('index', $data)->rootView($rootView);
        }
        
        $filepath = resource_path('jsx/static/' . $any . '.jsx');
        if (\File::exists($filepath)) {
            return inertia($any, $data)->rootView($rootView);
        }
        
        $filepath = resource_path('jsx/static/' . $any . '/index.jsx');
        if (\File::exists($filepath)) {
            return inertia($any . '/index', $data)->rootView($rootView);
        }

        abort(404);
    }

    public function api(Request $request, $any = null)
    {
        if (
            $request->route()->getName() == 'static.html.api' ||
            $request->route()->getName() == 'static.jsx.api'
        ) {
            $filepath = resource_path('json/api/' . $any);
        }

        if (\File::exists($filepath)) {
            return json_decode(file_get_contents($filepath));
        }
    }

    private function getJsonData($any = null)
    {
        if (file_exists(resource_path("json/static/$any.json"))) {
            return [
                'pegawai' => json_decode(file_get_contents(resource_path("json/static/$any.json")), true)
            ];
        }
        if (file_exists(resource_path("json/static/$any/index.json"))) {
            return [
                'pegawai' => json_decode(file_get_contents(resource_path("json/static/$any/index.json")), true)
            ];
        }

        return [];
    }

    private function getDummyEndpoint(Request $request, $any = null)
    {
        if (
            $any == 'am-form-master-basic-view' ||
            $any == 'am-form-master-basic-edit'
        ) {
            $request->validate([
                'monitor_name' => 'required',
                'monitor_url' => 'required',
            ]);
        }

        if ($any == 'master-data/create' || $any == 'master-data/edit') {
            $request->validate([
                "masa_berlaku_start" => 'required',
                "masa_berlaku_end" => 'required',
                "golongan_pajak" => 'required',
                "divisi" => 'required',
                "posisi" => 'required',
                "cuti_tahunan" => 'required',
                "kontrak" => 'required',
                "minimal_jam" => 'required',
                "rate_lembur" => 'required',
                "catatan" => 'required',
                "status" => 'required',
                'pendapatan.*.nama' => 'required|string',
                'pendapatan.*.tipe' => 'required|in:gaji,tunjangan',
                'pendapatan.*.nominal' => 'required|numeric|min:0',
                'potongan.*.nama' => 'required|string',
                'potongan.*.tipe' => 'required|in:gaji,tunjangan',
                'potongan.*.nominal' => 'required|numeric|min:0',
            ]);
            return back()->with('success','Master Data berhasil ditambahkan.');
        }
    }
}
