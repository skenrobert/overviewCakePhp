<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;

/**
 * Libros Controller
 *
 * @property \App\Model\Table\LibrosTable $Libros
 * @method \App\Model\Entity\Libro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LibrosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $libros = $this->paginate($this->Libros, ['limit'=>2] );

        $this->set(compact('libros'));
    }

    /**
     * View method
     *
     * @param string|null $id Libro id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $libro = $this->Libros->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('libro'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $libro = $this->Libros->newEmptyEntity();
        if ($this->request->is('post')) {

            $libro = $this->Libros->patchEntity($libro, $this->request->getData());

            // add imagen of book 

            $imagen = $this->request->getData('imagen');

            // show by screen 
            //print_r($this->request->getData());
           // exit();

            if($imagen){

              //  print_r($tiempo);
              //  exit();

              /*
              sudo chown -R www-data:www-data /var/www/html/libreria/webroot/img/* 
              */
              $tiempo= FrozenTime::now()->toUnixString();
              $nombreimagen=$tiempo."_".$imagen->getClientFileName();
              $destino=WWW_ROOT.'img/libros/'.$nombreimagen;
              $imagen->moveTo($destino);
              $libro->imagen=$nombreimagen;
             // print_r($nombreimagen);
              //exit();

            }



            if ($this->Libros->save($libro)) {
                $this->Flash->success(__('The libro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The libro could not be saved. Please, try again.'));

        }

        $this->set(compact('libro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Libro id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $libro = $this->Libros->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $nombreimagenAnterior = $libro->imagen;

            $libro = $this->Libros->patchEntity($libro, $this->request->getData());

            $imagen= $this->request->getData('imagen');

            $libro->imagen= $nombreimagenAnterior;

            if ($imagen->getClientFilename()) {
                if(file_exists(WWW_ROOT.'img/libros/'.$nombreimagenAnterior)){

                    unlink(WWW_ROOT.'img/libros/'.$nombreimagenAnterior);
                    }

                    $tiempo= FrozenTime::now()->toUnixString();
                    $nombreimagen=$tiempo."_".$imagen->getClientFileName();
                    $destino=WWW_ROOT.'img/libros/'.$nombreimagen;
                    $imagen->moveTo($destino);
                    $libro->imagen=$nombreimagen;

            }

            if ($this->Libros->save($libro)) {
                $this->Flash->success(__('The libro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The libro could not be saved. Please, try again.'));
        }
        $this->set(compact('libro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Libro id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $libro = $this->Libros->get($id);

        if(file_exists(WWW_ROOT.'img/libros/'.$libro['imagen'])){

            unlink(WWW_ROOT.'img/libros/'.$libro['imagen']);

        }


        if ($this->Libros->delete($libro)) {
            $this->Flash->success(__('The libro has been deleted.'));
        } else {
            $this->Flash->error(__('The libro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
