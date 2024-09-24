<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container" style="min-height: 50vh;">
        <h1>User Dashboard</h1>

        <!-- Add Task and Add Project buttons -->
        <a href="<?= site_url('/Project/add') ?>" class="add-task-button float-right">Add Project</a>

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
                    <a href="<?= site_url('Project/edit/'.$task['id']) ?>">Edit</a>
                    <a href="<?= site_url('Project/delete/'.$task['id']) ?>" class="del-btn" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

    </div>
</body>
</html>
 