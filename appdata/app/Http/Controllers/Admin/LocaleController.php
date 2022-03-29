<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LocaleController extends Controller
{
    private $langType = ['en', 'es', 'lt', 'pt', 'rus'];
    private $file = '_lan';
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function locale()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }
        $data = [];
        foreach ($this->langType as $value) {
            app()->setlocale($value);
            $data[$value . '_langs'] = Lang::get($this->file);
        }

        $data['m_m_n'] = 'locale';
        return view('back-end.locale.locale', $data);
    }
    public function updateLocale()
    {
        $content = "<?php\n\nreturn\n[\n";
        foreach (request()->lans as $item) {
            $content .= "\t'" . $item['key'] . "' => '" . $item['value'] . "',\n";
        }

        $content .= "];";
        $path = base_path() . '/resources/lang/' . request()->lan . '/' . $this->file . '.php';

        file_put_contents($path, $content);

    }
}
