const addProject = document.getElementById('addProject');
const addForm = document.getElementById('addForm');
const backdrop = document.getElementById('backdrop');
const cancelBtn = document.getElementById('cancelBtn');

addProject.addEventListener('click', () => {
  addForm.style.display = 'block';
  backdrop.style.display = 'block';
});

cancelBtn.addEventListener('click', () => {
  addForm.style.display = 'none';
  backdrop.style.display = 'none';
});

backdrop.addEventListener('click', () => {
  addForm.style.display = 'none';
  backdrop.style.display = 'none';
});