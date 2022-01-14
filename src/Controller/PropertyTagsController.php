<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PropertyTags Controller
 *
 * @property \App\Model\Table\PropertyTagsTable $PropertyTags
 * @method \App\Model\Entity\PropertyTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertyTagsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tags', 'Properties'],
        ];
        $propertyTags = $this->paginate($this->PropertyTags);

        $this->set(compact('propertyTags'));
    }

    /**
     * View method
     *
     * @param string|null $id Property Tag id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propertyTag = $this->PropertyTags->get($id, [
            'contain' => ['Tags', 'Properties'],
        ]);

        $this->set(compact('propertyTag'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propertyTag = $this->PropertyTags->newEmptyEntity();
        if ($this->request->is('post')) {
            $propertyTag = $this->PropertyTags->patchEntity($propertyTag, $this->request->getData());
            if ($this->PropertyTags->save($propertyTag)) {
                $this->Flash->success(__('The property tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property tag could not be saved. Please, try again.'));
        }
        $tags = $this->PropertyTags->Tags->find('list', ['limit' => 200])->all();
        $properties = $this->PropertyTags->Properties->find('list', ['limit' => 200])->all();
        $this->set(compact('propertyTag', 'tags', 'properties'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property Tag id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propertyTag = $this->PropertyTags->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propertyTag = $this->PropertyTags->patchEntity($propertyTag, $this->request->getData());
            if ($this->PropertyTags->save($propertyTag)) {
                $this->Flash->success(__('The property tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property tag could not be saved. Please, try again.'));
        }
        $tags = $this->PropertyTags->Tags->find('list', ['limit' => 200])->all();
        $properties = $this->PropertyTags->Properties->find('list', ['limit' => 200])->all();
        $this->set(compact('propertyTag', 'tags', 'properties'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Property Tag id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propertyTag = $this->PropertyTags->get($id);
        if ($this->PropertyTags->delete($propertyTag)) {
            $this->Flash->success(__('The property tag has been deleted.'));
        } else {
            $this->Flash->error(__('The property tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
