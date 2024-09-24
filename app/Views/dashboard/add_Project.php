<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/form.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Add Project</h1>
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

            <div class="submit-btn">
                <button type="submit">Save Project</button>
            </div>
        </form>
    </div>
</body>
</html>
