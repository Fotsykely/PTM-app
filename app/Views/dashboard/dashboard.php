<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/form.css') ?>">
    <style>
        
    </style>
</head>
<body>
    <div class="container" style="min-height: 60vh;">
        <h1>User Dashboard</h1>

        <!-- Add Task and Add Project buttons -->
        <!-- <a href="<?= site_url('/Project/add') ?>" class="add-task-button float-right">Add Project</a> -->

        <button id="addProject" class="add-task-button float-right">Add Project</button>
        <div id="backdrop" class="backdrop"></div>

        <div id="addForm" class="containerForm">
            <span class="close" id="closeCreateModal">&times;</span>
            <h2>Create a Project</h2>  
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
                </div>    
            </form>
        </div>

        <!--  -->

        <!-- Task Table -->
        <table>
            <tr>
                <th>Project Name</th>
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
                    <!-- <a href="<?= site_url('Project/edit/'.$task['id']) ?>" id="editBtn">Edit</a> -->
                    <button onclick="openEditModal(<?= $task['id'] ?>, '<?= esc($task['task_name']) ?>', '<?= esc($task['description']) ?>', '<?= esc($task['deadline']) ?>')">Edit</button>
                    <a href="<?= site_url('Project/delete/'.$task['id']) ?>" class="del-btn" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Edit Task Modal -->
    <div id="editTaskModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeEditModal">&times;</span>
            <h2>Edit Project details</h2>
            <form id="editTaskForm" action="" method="post">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="task_name">Project Name:</label>
                    <input type="text" name="task_name" id="edit_task_name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="edit_description" required>
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline:</label>
                    <input type="date" name="deadline" id="edit_deadline" required>
                </div>
                <div class="btn">
                    <button type="submit" class="submit-btn">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // edit script
        // Open the edit modal
        function openEditModal(id, name, description, deadline) {
        document.getElementById('edit_task_name').value = name;
        document.getElementById('edit_description').value = description;
        document.getElementById('edit_deadline').value = deadline;
        document.getElementById('editTaskForm').action = "<?= site_url('Project/updateTask') ?>/" + id;

        const modal = document.getElementById('editTaskModal');
        modal.style.display = "block";
        }

        // Close the modal when the user clicks on <span> (x)
        document.getElementById('closeEditModal').onclick = function() {
        document.getElementById('editTaskModal').style.display = "none";
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            const modal = document.getElementById('editTaskModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script src="<?= base_url("scripts/project_create.js") ?>"></script>
</body>
</html>
 