<?php
declare(strict_types=1);

namespace App\Controller;

namespace App\Controller\Users;

use App\Controller\AppController;

class AppointmentsController extends AppController
{


    public function initialize(): void
    {
        parent::initialize();

   
        $this->viewBuilder()->setLayout('use');
       
    }

    public function index()
    {
        $appointments = $this->paginate($this->Appointments);

        $this->set(compact('appointments'));
    }


    public function view($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => ['ApoLinks'],
        ]);

        $this->set(compact('appointment'));
    }

    




















    public function add($id)
    {
        $apolo=$this->fetchTable('ApoLinks');
        $pid=$id;
        // dd($id);
        $values=$this->Authentication->getIdentity();
        $uid = $values->id;
        // dd($uid);
$match=$apolo->find('All')->Where(['AND'=>['user_id'=>$uid ,'properties_id'=>$pid]])->toList();
// dd($match);
if(!empty($match)){ 
    $this->redirect(['controller'=>'properties','action' => 'view',$pid]);
    return $this->Flash->error(__('Appointment Is alredy registerd '));
}else{


        $appointment = $this->Appointments->newEmptyEntity();
        if ($this->request->is('post')) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
// dd($appointment);
            if ($this->Appointments->save($appointment)) {
//getting last inserted id
                $aid=$appointment->id;
            //  echo $uid,$aid,$pid;
            //  exit;  
//calling apolinks model
                   
      $apolo->saveIds($uid,$pid,$aid);
          
                    // dd($id);
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['controller'=>'properties','action' => 'view',$pid]);                          
            
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
        $this->set(compact('appointment'));
    }}
    
   















    }













    public function edit($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
        $this->set(compact('appointment'));
    }

 






























    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appointment = $this->Appointments->get($id);
        if ($this->Appointments->delete($appointment)) {
            $this->Flash->success(__('The appointment has been deleted.'));
        } else {
            $this->Flash->error(__('The appointment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'appointments','action' => 'view']);
    }


public function status($id = null, $status)

{
    // print_r($status);
    // die;
    $this->request->allowMethod(['post']);
    $appointment = $this->Appointments->get($id);
    if ($status == 1)
        $appointment->process = 4;
    else
        $appointment->process = 1;
    if ($this->Appointments->save($appointment)) {
        $this->Flash->success(__('The request has been canceled.'));
    }
    return $this->redirect(['action' => 'view',$id]);
}

}