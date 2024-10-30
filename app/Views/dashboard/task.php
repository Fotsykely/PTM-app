<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Task</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/form.css') ?>">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Task</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/form.css') ?>">
    
    <style>
        .sidebar {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
            background-color: #f4f4f4;
            height: 100vh;
        }

        .sidebar h2, .sidebar h4 {
            text-align: center;
        }

        .sidebar table {
            margin: 20px auto;
            width: 100%;
            text-align: center;
        }

        .sidebar a {
            color: #333;
            text-decoration: none;
        }

        .logout {
            text-align: center;
            margin-top: auto;
            padding: 10px;
        }

        .logout a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div>
            <h2>Dashboard</h2>
            <h4>Hello <?= esc($usr) ?>!</h4>
            <table>
                <tr>
                    <th>Project Name</th>
                </tr>
                <?php foreach ($Project as $p): ?>
                <tr>
                    <td><a href="<?= site_url('Project/openP/'.$p['id']) ?>"><?= esc($p['name']) ?></a></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        
        <div class="logout">
            <a href="<?= site_url('logout') ?>">Logout</a>
        </div>
    </div>

    <div class="container" style="min-height: 60vh;">
        <form action="<?= site_url('/dashboard/task/'.$prj['id']) ?>" method="get">
            <div class="search-bar">
                <input type="text" name="search" placeholder="Search..." value="<?= esc($search ?? '') ?>">
                <button type="submit" >Search</button>
            </div>
        </form>

        <h1>User Tasks</h1>

        <!-- Add Project buttons -->
        <!-- <a href="<?= site_url('/Task/add') ?>" class="add-p-button float-right">Add Project</a> -->

        <button id="addProject" class="add-p-button float-right">Add Task</button>
        <div id="backdrop" class="backdrop"></div>

        <div id="addForm" class="containerForm">
            <span class="close" id="closeCreateModal">&times;</span>
            <h2>Create a Task</h2>  
            <form action="<?= site_url('Task/save/'.$prj['id']) ?>" method="post">
                <div class="form-group">
                    <label for="name">Task Name:</label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="status">status:</label>
                    <input type="text" name="status" id="status" required>
                </div>
                <div class="btn">
                    <button type="submit" class="submit-btn">Save Task</button>
                </div>    
            </form>
        </div>

        <!--  -->

        <!-- p Table -->
        <table>
            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($Task as $p): ?>
            <tr>
                <td><?= esc($p['name']) ?></td>
                <td><?= esc($p['description']) ?></td>
                <td><?= esc($p['status']) ?></td>
                <td>
                    <!-- <a href="<?= site_url('Task/edit/'.$p['id']) ?>" id="editBtn">Edit</a> -->
                    <button onclick="openEditModal(<?= $p['id'] ?>, '<?= esc($p['name']) ?>', '<?= esc($p['description']) ?>', '<?= esc($p['status']) ?>')">Edit</button>
                    <a href="<?= site_url('Task/delete/'.$p['id']) ?>" class="del-btn" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Edit p Modal -->
    <div id="editpModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeEditModal">&times;</span>
            <h2>Edit Project details</h2>
            <form id="editpForm" action="" method="post">
                <input type="hidden" name="t_method" value="PUT">
                <div class="form-group">
                    <label for="t_name">Task Name:</label>
                    <input type="text" name="name" id="edit_name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="edit_description" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" name="status" id="edit_status" required>
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
        function openEditModal(id, name, description, status) {
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_description').value = description;
        document.getElementById('edit_status').value = status;
        document.getElementById('editpForm').action = "<?= site_url('/Task/update') ?>/" + id;

        const modal = document.getElementById('editpModal');
        modal.style.display = "block";
        }

        // Close the modal when the user clicks on <span> (x)
        document.getElementById('closeEditModal').onclick = function() {
        document.getElementById('editpModal').style.display = "none";
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            const modal = document.getElementById('editpModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script src="<?= base_url("scripts/project_create.js") ?>"></script>
</body>
</html>