<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Auth as FirebaseAuth;
use Session;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Google\Cloud\Firestore\FirestoreClient;
use Exception;

class IlmuController extends Controller
{
  public function getName()
  {
    $uid = Session::get('uid');
    $docRef = Firebase::firestore()->database()->collection('user')->document($uid);
    $snapshot = $docRef->snapshot();
    return $snapshot->get('username');
  }

  public function index()
  {
    $name = $this->getName();
    $ilmus = app('firebase.firestore')->database()->collection('ilmu_tafsir')->documents();
    return view('ilmu', compact('name', 'ilmus'));
  }

  public function addIlmu()
  {
    $name = $this->getName();
    return view('ilmu-add', compact('name'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'nama' => 'required',
      'definisi' => 'required',
      'sejarah' => 'required',
      'caratafsiran' => 'required',
      'contohkitab' => 'required',
      'kesahihan' => 'required',
    ]);
    $stuRef = app('firebase.firestore')->database()->collection('ilmu_tafsir')->newDocument();
    $stuRef->set([
      'nama_tafsir' => $request->nama_tafsir,
      'definisi' => $request->definisi,
      'sejarah' => $request->sejarah,
      'caratafsiran' => $request->caratafsiran,
      'contohkitab' => $request->contohkitab,
      'kesahihan' => $request->kesahihan,
    ]);
    Session::flash('success', 'Maklumat Telah Ditambah');
    return redirect()->route('ilmu.get');
  }

  public function update(Request $request, $id)
  {
    //
    $ilmu = app('firebase.firestore')->database()->collection('ilmu_tafsir')->document($id)->update([
      ['path' => 'nama_tafsir', 'value' => $request->nama_tafsir],
      ['path' => 'definisi', 'value' => $request->definisi],
      ['path' => 'sejarah', 'value' => $request->sejarah],
      ['path' => 'caratafsiran', 'value' => $request->caratafsiran],
      ['path' => 'contohkitab', 'value' => $request->contohkitab],
      ['path' => 'kesahihan', 'value' => $request->kesahihan],
    ]);
    return back();
  }


  public function destroy($id)
  {
    app('firebase.firestore')->database()->collection('ilmu_tafsir')->document($id)->delete();
    return back();
  }
}
