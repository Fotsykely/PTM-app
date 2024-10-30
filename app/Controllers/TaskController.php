<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\ProjectModel;
use CodeIgniter\Controller;

class TaskController extends Controller
{
    public function index($id)
    {
        $taskModel = new TaskModel();
        $pModel = new ProjectModel();
        $data1['Task'] = $taskModel->where('project_id',$id)->findAll();
        $data2['Prj'] = $pModel->find($id);
        $data = array_merge($data1, $data2);
        
        return view('dashboard/task', $data);
    }

    public function saveTask($id)
    {
        $taskModel = new TaskModel();
        $session = session();
        $taskModel->save([
            'project_id' => $id,
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/Project/openP/'.$session->get('id'));
    }

    public function editTask($id)
    {
        $taskModel = new TaskModel();
        $data['task'] = $taskModel->find($id);

        return view('dashboard/edit_task', $data);
    }

    public function updateTask($id)
    {
        $taskModel = new TaskModel();
        $taskModel->update($id, [
            'name' => $this->request->getPost('description'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/Project/openP/'.$id);
    }

    public function deleteTask($id)
    {
        $taskModel = new TaskModel();
        $taskModel->delete($id);

        return redirect()->to('/Project/openP/'.$id);
    }
}
