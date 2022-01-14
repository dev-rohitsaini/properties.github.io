<?php   
declare(strict_types=1);
namespace App\Controller;
namespace App\Controller\Users;
use App\Controller\AppController;
class ApoLinksController extends AppController
{
    public function index() 
    {
        $this->viewbuilder()->setLayout('use');
        $values = $this->Authentication->getIdentity();
        $aid = $values->id;
        $this->fetchTable('ApoLinks');
        $hello = $this->ApoLinks->get_results($aid);
        // dd($hello);
        $helo = $this->fetchTable('UserProfile')->find('all')->Where(['user_id'=>$aid])->toList();
// foreach($helo as $uer){
//  $war= $uer->first_name.' '.$uer->first_name;
// }
        $this->set(compact('hello','helo'));
    }

   
}
