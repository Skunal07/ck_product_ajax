<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\FlashMessage;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function initialize(): void
    {
        $this->viewBuilder()->setLayout('userlayout');
        $this->Model = $this->loadModel('ProductComments');
        $this->Model = $this->loadModel('ProductCategories');
        $this->Model = $this->loadModel('Products');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        if ($this->Authentication->getIdentity()) {
            $auth = true;
            $user = $this->Authentication->getIdentity();
            $this->set(compact('user'));
        } else {
            $auth = false;
        }
        $this->set(compact('auth'));
    }
// ==============================================================================================================
    public function signup()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'signup']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['signin', 'signup', 'home']);
    }

    public function signin()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {

            $user = $this->Authentication->getIdentity();
            if ($user->user_type == 0) {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'dashboard',
                ]);
            } elseif ($user->user_type == 1) {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Admin',
                    'action' => 'dashboard',
                ]);
            }
            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    // =======================================dashboard============================
    public function dashboard($id = null)
    {
        $key = $this->request->getQuery('key');
        if ($id != null) {
            $products = $this->Products->find('all')->contain('ProductCategories')->where(['product_category_id' => $id, 'Products.status' => '0'])->order(['Products.id' => 'DESC']);
        } elseif ($key != null) {
            $products = $this->Products->find('all')->contain('ProductCategories')->where(['Products.status' => 0, 'Or' => ['product_title like' => '%' . $key . '%', 'product_tags like' => '%' . $key . '%', 'category_name like' => '%' . $key . '%']]);
        } else {
            $products = $this->Products->find('all')->contain('ProductCategories')->where(['Products.status' => '0'])->order(['Products.id' => 'DESC']);
        }
        $productc = $this->ProductCategories->find()->where(['status' => '0'])->all();
        $countall = array();
        $countall['user'] = $this->Users->find()->count('id');
        $countall['product'] = $this->Products->find()->count('id');
        $countall['productc'] = $this->ProductCategories->find()->count('id');

        $this->set(compact('products', 'productc', 'id', 'countall'));

        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            //$this->layout = false;
            // $this->viewBuilder()->setLayout(null);
            $this->render('/element/flash/userproduct');
        }
    }


    // ===============================user-profile===============================
    public function profile()
    {
        $user = $this->Authentication->getIdentity();
        $this->set(compact('user'));
    }


//    =======================================================================================================
    public function viewproduct($id = null)
    {

        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $product = $this->Products->get($id, [
            'contain' => ['ProductCategories', 'ProductComments'],
        ]);
        $comments = $this->ProductComments->find('all', ['contain' => ['Users', 'Users']])->where(['product_id' => $id])->all();

        $comment = $this->ProductComments->newEmptyEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['product_id'] = $id;
            $data['user_id'] = $uid;
            $comment = $this->ProductComments->patchEntity($comment, $data);
            if ($this->ProductComments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
                return $this->redirect(['action' => 'viewproduct',$id]);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }

        $this->set(compact('product', 'comments', 'comment', 'user'));
    }

    // ============================================================================================================
    public function edituser($id = null)
    {
        $user = $this->Users->get($id);
        $fileName2 = $user['profile_image'];
        // print_r($user);die;
        // echo $user['user_profile']['profile_image'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            // ==========add image ===============
            $productImage = $this->request->getData("profile_image");
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }
            $data["profile_image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    // no file uploaded
                    $data["profile_image"] = "";
                } else {
                    // file uploaded
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["profile_image"] = $fileName;
                    }
                }
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }




    // ============================================================================================================
    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
        }
    }
}
