<?php
declare(strict_types=1);

namespace App\Controller;

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Mailer\Mailer;
class AppointmentsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

   
        $this->viewBuilder()->setLayout('new');
       
    }
    public function index()
    {
        $appointments = $this->paginate($this->Appointments->find('All')->Where(['process is not' => '4']));

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
        $appointment = $this->Appointments->newEmptyEntity();
        if ($this->request->is('post')) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());

            if ($this->Appointments->save($appointment)) {
//getting last inserted id
                $aid=$appointment->id;
            //  echo $uid,$aid,$pid;
            //  exit;  
//calling apolinks model
                   
      $apolo->saveIds($uid,$pid,$aid);
          
                    // dd($id);
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'index']);}
            
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
        $this->set(compact('appointment'));
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

        return $this->redirect(['action' => 'index']);
    }
    public function status($id = null)

{
    // print_r($status);
    // die;
    $this->request->allowMethod(['post']);
    $appointment = $this->Appointments->get($id);
    if ($appointment->process == 1)
        $appointment->process = 2;
    elseif($appointment->process = 2)
    $appointment->process = 3;
      else 
        $appointment->process = 1;
    if ($this->Appointments->save($appointment)) {
        $aid=$appointment->id;
           
        return $this->redirect(['action' => 'sendMail']);
        $this->Flash->success(__('The request has been canceled.'));
    }
    return $this->redirect(['controller'=>'apo-links','action' => 'index']);
}
public function sendMail($a=null){
    $a= "booked";
    $message = "your Appointment is booked on  $a requested time our agent get in touch with you shortly";            
    $mailer = new Mailer();
    $mailer->setTransport('mail');
    $mailer->setFrom(['tqmassociate@gmail.com' => '88Acers'])
    ->setTo('rohi699t@gmail.com')
    ->setSubject('Test')
    ->deliver($message);
    return $this->redirect(['action'=>'index']);
}
public function reject($id = null)

{
    
    $this->request->allowMethod(['post']);
    $appointment = $this->Appointments->get($id);
    if (!empty($appointment->process)){
        $appointment->process = 5;
   
    if ($this->Appointments->save($appointment)) {
        $this->Flash->success(__('The request has been canceled.'));
    }
    return $this->redirect(['controller'=>'apo-links','action' => 'index',$id]);
}
}
}
