<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/form.css') ?>">
</head>
<body>
    <div class="container" style="min-height: 50vh;">
        <h1>User Dashboard</h1>

        <!-- Add Task and Add Project buttons -->

        <button id="addProject" class="float-right">Add Project</button>
        
        <div id="backdrop" class="backdrop"></div>

        <div id="addForm" class="containerForm">
            <form action="<?= site_url('Project/save') ?>" method="post">
                <div class="form-group">
                    <label for="task_name">Project Name:</label>
                    <input type="text" name="task_name" id="task_name" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="deadline">Deadline:</label>
                    <input type="date" name="deadline" id="deadline" required>
                </div>
                <div class="btn">
                    <button type="submit" class="submit-btn">Save Project</button>
                    <button id="cancelBtn" class="cl-btn">Cancel</button>
                </div>    
            </form>
        </div>

        <!-- Task Table -->
        
        <table>
            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['task_name']) ?></td>
                <td><?= esc($task['description']) ?></td>
                <td><?= esc($task['deadline']) ?></td>
                <td>
                    <a id="Edit" href="<?= site_url('Project/edit/'.$task['id']) ?>">Edit</a>
                    <a href="<?= site_url('Project/delete/'.$task['id']) ?>" class="del-btn" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

<script src="<?= base_url("scripts/project_create.js") ?>"></script>
<script src="<?= base_url("scripts/add_task.js") ?>"></script>

</body>
</html>
 