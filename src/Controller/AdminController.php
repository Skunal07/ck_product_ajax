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
class AdminController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function initialize(): void
    {
        $this->viewBuilder()->setLayout('userlayout');
        $this->Model = $this->loadModel('Users');
        $this->Model = $this->loadModel('ProductComments');
        $this->Model = $this->loadModel('ProductCategories');
        $this->Model = $this->loadModel('Products');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        if ($this->Authentication->getIdentity()) {
            $auth = true;
                $user = $this->Authentication->getIdentity();
            if ($user->user_type == 0) {
                $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
            } else {
                $this->set(compact('user', 'auth'));
            }
        } else {
            $auth = false;
        }
    }






    // ================product-category ,Users ,Product table ===================
    public function tables()
    {
        $users = $this->paginate($this->Users->find('all')->where(['user_type' => 0, 'user_delete' => '1'])->order(['id' => 'DESC']));
        $categories = $this->paginate($this->ProductCategories->find('all')->contain('Products')->where(['category_delete' => '1'])->order(['ProductCategories.id' => 'DESC']));
        $products = $this->paginate($this->Products->find('all')->contain('ProductCategories')->where(['product_delete' => '1'])->order(['Products.id' => 'DESC']));
        $this->set(compact('users', 'products', 'categories'));
    }


    // =========================logout===========================================
    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'signin']);
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
            $products = $this->Products->find('all')->contain('ProductCategories')->where(['Products.status' => '0', 'product_delete' => '1'])->order(['Products.id' => 'DESC']);
        }
        $productc = $this->ProductCategories->find()->where(['status' => '0', 'category_delete' => '1'])->all();
        $countall = array();
        $countall['user'] = $this->Users->find()->count('id');
        $countall['product'] = $this->Products->find()->count('id');
        $countall['productc'] = $this->ProductCategories->find()->count('id');

        $this->set(compact('products', 'productc', 'id', 'countall'));

        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            //$this->layout = false;
            // $this->viewBuilder()->setLayout(null);
            $this->render('/element/flash/product');
        }
    }


    // ===============================user-profile===============================
    public function profile()
    {
        $user = $this->Authentication->getIdentity();
        $this->set(compact('user'));
    }
    public function cart()
    {
        $user = $this->Authentication->getIdentity();
        $this->set(compact('user'));
    }


    // ======================================viewprofile==========================
    public function viewuser($id = null)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }


    // ======================Edit user ==========================================
    public function updateuser($id = null)
    {
        $id = $_REQUEST['id'];
        $user = $this->Users->get($id);
        echo json_encode($user);
        exit;
    }
    public function editProfile($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            // print_r($data);
            // die;
            $fileName2 = $this->request->getData("imagedd");
            $id = $this->request->getData("iddd");
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);
            $productImage = $this->request->getData('profile_image');
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }
            $fileSize = $productImage->getSize();
            $data["profile_image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    $data["image"] = "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["profile_image"] = $fileName;
                    }
                }
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The User has been saved.",
                ));
                exit;
            }
            echo json_encode(array(
                "status" => 0,
                "message" => "The User  could not be saved. Please, try again.",
            ));
            exit;
        }
        $this->set(compact('user'));
    }



    // ================product category-status===================================
    public function productcatstatus($id = null, $status = null)
    {
        $this->request->allowMethod(['post']);
        $id = $_POST['id'];
        $status = $_POST['status'];
        $productcstatus = $this->ProductCategories->get($id);
        if ($status == 1) {
            $productcstatus->status = 0;
        } else {
            $productcstatus->status = 1;
        }

        if ($this->ProductCategories->save($productcstatus)) {
            
            echo json_encode(array(
                "status" => $status,
                "id" => $id,
            ));
            exit;
        }
    }


    // ================product -status==========================================
    public function productstatus($id = null, $status = null)
    {
        $this->request->allowMethod(['post']);
        $id = $_POST['id'];
        $status = $_POST['status'];
        $productstatus = $this->Products->get($id);
        //  echo $status;die;
        if ($status == 1) {
            $productstatus->status = 0;
        } else {
            $productstatus->status = 1;
        }
        if ($this->Products->save($productstatus)) {
            echo json_encode(array(
                "status" => $status,
                "id" => $id,
            ));
            exit;
        }
    }


    // ================user-status==============================================
    public function userstatus($id = null, $status = null)
    {
        $this->request->allowMethod(['post']);
        $id = $_POST['id'];
        $status = $_POST['status'];

        $userstatus = $this->Users->get($id);
        if ($status == 1) {
            $userstatus->status = 2;
        } else {
            $userstatus->status = 1;
        }
        if ($this->Users->save($userstatus)) {
            echo json_encode(array(
                "status" => $status,
                "id" => $id,
            ));
            exit;
        }
    }

    // =========================================================================
    // =========================================================================        
    // ============================add product =================================


    public function addproduct()
    {
        $productcategory = $this->paginate($this->ProductCategories);
        // echo '<pre>';
        // print_r($productcategory);die;
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            // ==========add image ===============
            $data = $this->request->getData();
            $productImage = $this->request->getData("product_image");
            $fileName = $productImage->getClientFilename();
            $data["product_image"] = $fileName;
            $product = $this->Products->patchEntity($product, $data);

            if ($this->Products->save($product)) {

                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    // no file uploaded
                    $data["product_image"] = "";
                } else {
                    // file uploaded
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["product_image"] = $fileName;
                    }
                }
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'tables']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('productcategory', 'product'));
    }


    // ==================================product edit===============================
    public function editproduct($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        $productcategory = $this->paginate($this->ProductCategories);
        $fileName2 = $product['product_image'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $productImage = $this->request->getData("product_image");
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }
            $data["product_image"] = $fileName;
            $product = $this->Products->patchEntity($product, $data);
            if ($this->Products->save($product)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    // no file uploaded
                    $data["product_image"] = "";
                } else {
                    // file uploaded
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["product_image"] = $fileName;
                    }
                }
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'tables']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $productCategories = $this->Products->ProductCategories->find('list', ['limit' => 200])->all();
        $this->set(compact('product', 'productCategories', 'productcategory'));
    }


    // ================================viewproduct===================================
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
                return $this->redirect(['action' => 'tables']);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }

        $this->set(compact('product', 'comments', 'comment', 'user'));
    }

    // ================================deleteproduct=================================
    public function deleteproduct($id = null)
    {
        $id = $_REQUEST['id'];
        $product = $this->Products->get($id);
        $product->product_delete = 0;
        if ($this->Products->save($product)) {
            echo json_encode(array(
                "status" => 1,
            ));
            exit;
        } else {
            echo json_encode(array(
                "status" => 0,
            ));
            exit;
        }
    }
    // ================================deleteproduct=================================
    public function deleteuser($id = null)
    {
        $id = $_REQUEST['id'];
        $user = $this->Users->get($id);
        $user->user_delete = 0;
        if ($this->Users->save($user)) {
            echo json_encode(array(
                "status" => 1,
            ));
            exit;
        } else {
            echo json_encode(array(
                "status" => 0,
            ));
            exit;
        }
    }
    public function deletecategory($id = null)
    {
        $id = $_REQUEST['id'];
        $productc = $this->ProductCategories->get($id);
        $productc->category_delete = 0;
        if ($this->ProductCategories->save($productc)) {
            echo json_encode(array(
                "status" => 1,
            ));
            exit;
        } else {
            echo json_encode(array(
                "status" => 0,
            ));
            exit;
        }
    }

    // public $paginate = [
    //     'limit' => 5
    // ];


}
