<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Auth as FirebaseAuth;
use Session;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Google\Cloud\Firestore\FirestoreClient;

class ForumController extends Controller
{

    public function getName() {
        $uid = Session::get('uid');
        $docRef = Firebase::firestore()->database()->collection('user')->document($uid);
        $snapshot = $docRef->snapshot();
        return $snapshot->get('username');
        // return app('firebase.auth')->getUser($uid);
    }

    public function index(){
        
        $name = $this->getName();
        // $nama = $this->getForum();
        $ilmus = app('firebase.firestore')->database()->collection('tanya_soalan')->documents();
        return view('forum', compact('name','ilmus'));
        
    }

    public function update(Request $request, $id)
  {
    //
    $ilmu = app('firebase.firestore')->database()->collection('tanya_soalan')->document($id)->update([
    ['path' => 'jawapan', 'value' => $request->jawapan],
   ]);
   return back();
  }

    // public function getForum(){
    //     {
          
    //         $collection = Firebase::firestore()->database()->collection('tanya_soalan')->document('58iEYss5ggaEXxGv62aQ');
    //         $snapshot = $collection->snapshot();
    //         $user = $snapshot()->get('username');
    //         // $soalan = $snapshot()->get('kandungansoalan');
    //         // $jawapan = $snapshot()->get('jawapan');
    //         }
    //         return $user;
    //         // return $soalan;
    //         // return $jawapan;
            
    //     }

//     <script>
//   $(function () {
//     $("#jsGrid1").jsGrid({
//         height: "100%",
//         width: "100%",

//         sorting: true,
//         paging: true,

//         data: db.clients,

//         fields: [
//             { name: "Name", type: "text", width: 150 },
//             { name: "Age", type: "number", width: 50 },
//             { name: "Address", type: "text", width: 200 },
//             { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
//             { name: "Married", type: "checkbox", title: "Is Married" }
//         ]
//     });
//   });
// </script>
}
