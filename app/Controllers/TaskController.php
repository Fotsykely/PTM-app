<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->findAll();

        return view('dashboard/dashboard', $data); // Load the dashboard view
    }

    public function saveTask()
    {
        $taskModel = new TaskModel();
        $taskModel->save([
            'task_name' => $this->request->getPost('task_name'),
            'description' => $this->request->getPost('description'),
            'deadline' => $this->request->getPost('deadline'),
        ]);

        return redirect()->to('/Project'); // Redirect to the task list (dashboard)
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
            'task_name' => $this->request->getPost('task_name'),
            'description' => $this->request->getPost('description'),
            'deadline' => $this->request->getPost('deadline'),
        ]);

        return redirect()->to('/Project');
    }

    public function deleteTask($id)
    {
        $taskModel = new TaskModel();
        $taskModel->delete($id);

        return redirect()->to('/Project');
    }
}
