<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/form.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Edit Project</h1>
        <form action="<?= site_url('Project/updateTask/'.$project['id']) ?>" method="post">
        <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" name="project_name" id="project_name" value="<?= $project['project_name'] ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input name="description" id="description" value="<?= $project['description'] ?>" required></textarea>
            </div>

            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="date" name="deadline" id="deadline" value="<?= $project['deadline'] ?>" required>
            </div>
            <div class="btn">
                <button type="submit" class="submit-btn">Update Project</button>
            </div>
        </form>
    </div>
</body>
</html>
