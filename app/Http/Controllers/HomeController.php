<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Session;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Laravel\Firebase\Facades\Firebase;


class HomeController extends Controller
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

    // method to auth user name
    public function getName() {
      $uid = Session::get('uid');
      $docRef = Firebase::firestore()->database()->collection('user')->document($uid);
      $snapshot = $docRef->snapshot();
      return $snapshot->get('username');
      // return app('firebase.auth')->getUser($uid);
  }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // FirebaseAuth.getInstance().getCurrentUser();
      // try {
        $name = $this->getName();
        $ilmus = app('firebase.firestore')->database()->collection('ilmu_tafsir')->documents();
        return view('ilmu', compact('name','ilmus'));
      // } catch (\Exception $e) {
      //   return $e;
      // }

    }

    // public function customer()
    // {
    //   $userid = Session::get('uid');
    //   return view('customers',compact('userid'));
    // }
}
