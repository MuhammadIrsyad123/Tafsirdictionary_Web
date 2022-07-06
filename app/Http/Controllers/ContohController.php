<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Auth as FirebaseAuth;
use Session;
use Kreait\Laravel\Firebase\Facades\Firebase;

class ContohController extends Controller
{
    public function getName()
    {
        $uid = Session::get('uid');
        $docRef = Firebase::firestore()->database()->collection('user')->document($uid);
        $snapshot = $docRef->snapshot();
        return $snapshot->get('username');
        // return app('firebase.auth')->getUser($uid);
    }

    public function index()
    {
        $name = $this->getName();
        $contohs = app('firebase.firestore')->database()->collection('contoh_tafsir')->documents();
        return view('contoh', compact('name', 'contohs'));
    }

    public function addContoh()
    {
        $name = $this->getName();
        return view('contoh-add', compact('name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kandungan' => 'required',
            'sahih' => 'required',
            'taksahih' => 'required',
        ]);
        $stuRef = app('firebase.firestore')->database()->collection('contoh_tafsir')->newDocument();
        $stuRef->set([
            'nama_surah' => $request->nama,
            'kandungansurah' => $request->kandungan,
            'sahih' => $request->sahih,
            'taksahih' => $request->taksahih,
        ]);
        Session::flash('success', 'Maklumat Telah Ditambah');
        return redirect()->route('contoh.get');;
    }
}
