<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use CodeIgniter\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projectModel = new ProjectModel();
        $data['projects'] = $projectModel->findAll();

        return view('dashboard/dashboard', $data); // Load the dashboard view
    }

    public function viewProject()
    {
        $projectModel = new ProjectModel();
        $data['projects'] = $projectModel->findAll();

        return view('dashboard/manager_dashboard', $data); // Load the dashboard view
    }

    public function saveProject()
    {
        $projectModel = new ProjectModel();
        $projectModel->save([
            'project_name' => $this->request->getPost('project_name'),
            'description' => $this->request->getPost('description'),
            'deadline' => $this->request->getPost('deadline'),
        ]);

        return redirect()->to('/'); // Redirect to the task list (dashboard)
    }

    public function editProject($id)
    {
        $projectModel = new ProjectModel();
        $data['project'] = $projectModel->find($id);

        return view('dashboard/edit_task', $data);
    }

    public function updateProject($id)
    {
        $projectModel = new ProjectModel();
        $projectModel->update($id, [
            'project_name' => $this->request->getPost('project_name'),
            'description' => $this->request->getPost('description'),
            'deadline' => $this->request->getPost('deadline'),
        ]);

        return redirect()->to('/Project');
    }

    public function deleteProject($id)
    {
        $projectModel = new ProjectModel();
        $projectModel->delete($id);

        return redirect()->to('/Project');
    }
}
