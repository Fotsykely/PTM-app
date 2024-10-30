<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $session = session();
        $userId = $session->get('id');
        $search = $this->request->getGet('search');
        $pModel = new ProjectModel();
        $userModel = new UserModel();
        if($search) {
            $pModel = $pModel->like('name',$search)
                             ->orLike('description',$search);   
        }
        $data1['Project'] = $pModel->where('user_id',$userId)->findAll();
        $data2['usr'] = $session->get('username');
        $data = array_merge($data1, $data2);

        return view('dashboard/dashboard', $data);
    }

    public function saveProject()
    {
        $session = session();
        $pModel = new ProjectModel();
        $pModel->save([
            'user_id' => $session->get('id'),
            'name' => $this->request->getPost('p_name'),
            'description' => $this->request->getPost('description'),
            'deadline' => $this->request->getPost('deadline'),
        ]);

        return redirect()->to('/dashboard/dashboard');
    }

    public function editProject($id)
    {
        $pModel = new ProjectModel();
        $data['Project'] = $pModel->find($id);

        return view('dashboard/edit_Project', $data);
    }

    public function updateProject($id)
    {
        $pModel = new ProjectModel();
        $pModel->update($id, [
            'name' => $this->request->getPost('p_name'),
            'description' => $this->request->getPost('description'),
            'deadline' => $this->request->getPost('deadline'),
        ]);

        return redirect()->to('/dashboard/dashboard');
    }

    public function deleteProject($id)
    {
        $pModel = new ProjectModel();
        $pModel->delete($id);

        return redirect()->to('/dashboard/dashboard');
    }
}