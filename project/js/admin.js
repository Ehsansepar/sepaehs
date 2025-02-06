// Fonction pour générer un ID unique
function generateId() {
    return Date.now().toString(36) + Math.random().toString(36).substr(2);
}

// Fonction pour ajouter un nouvel exercice
function addExercise(event) {
    event.preventDefault();
    
    const title = document.getElementById('exercise-title').value;
    const description = document.getElementById('exercise-description').value;
    const difficulty = document.getElementById('exercise-difficulty').value;
    const content = document.getElementById('exercise-content').value;
    
    const exercise = {
        id: generateId(),
        title,
        description,
        difficulty,
        content,
        date: new Date().toISOString()
    };
    
    // Récupérer les exercices existants
    const exercises = JSON.parse(localStorage.getItem('exercises') || '[]');
    exercises.push(exercise);
    
    // Sauvegarder dans le localStorage
    localStorage.setItem('exercises', JSON.stringify(exercises));
    
    // Réinitialiser le formulaire
    event.target.reset();
    
    // Mettre à jour la liste
    loadExerciseList();
    
    // Afficher une notification
    showNotification('Exercice ajouté avec succès !');
}

// Fonction pour charger la liste des exercices
function loadExerciseList() {
    const exercises = JSON.parse(localStorage.getItem('exercises') || '[]');
    const tbody = document.getElementById('exercise-list');
    
    tbody.innerHTML = '';
    
    exercises.forEach(exercise => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${exercise.title}</td>
            <td><span class="badge bg-${getDifficultyColor(exercise.difficulty)}">${exercise.difficulty}</span></td>
            <td>${new Date(exercise.date).toLocaleDateString()}</td>
            <td>
                <button class="btn btn-sm btn-primary btn-action" onclick="editExercise('${exercise.id}')">
                    <i class="bi bi-pencil"></i> Modifier
                </button>
                <button class="btn btn-sm btn-danger btn-action" onclick="deleteExercise('${exercise.id}')">
                    <i class="bi bi-trash"></i> Supprimer
                </button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

// Fonction pour modifier un exercice
function editExercise(id) {
    const exercises = JSON.parse(localStorage.getItem('exercises') || '[]');
    const exercise = exercises.find(ex => ex.id === id);
    
    if (exercise) {
        document.getElementById('exercise-title').value = exercise.title;
        document.getElementById('exercise-description').value = exercise.description;
        document.getElementById('exercise-difficulty').value = exercise.difficulty;
        document.getElementById('exercise-content').value = exercise.content;
        
        // Supprimer l'ancien exercice
        deleteExercise(id, false);
        
        // Faire défiler jusqu'au formulaire
        document.getElementById('exercise-title').scrollIntoView({ behavior: 'smooth' });
    }
}

// Fonction pour supprimer un exercice
function deleteExercise(id, showConfirm = true) {
    if (showConfirm && !confirm('Êtes-vous sûr de vouloir supprimer cet exercice ?')) {
        return;
    }
    
    const exercises = JSON.parse(localStorage.getItem('exercises') || '[]');
    const updatedExercises = exercises.filter(ex => ex.id !== id);
    
    localStorage.setItem('exercises', JSON.stringify(updatedExercises));
    loadExerciseList();
    
    if (showConfirm) {
        showNotification('Exercice supprimé avec succès !');
    }
}

// Fonction pour obtenir la couleur en fonction de la difficulté
function getDifficultyColor(difficulty) {
    switch(difficulty.toLowerCase()) {
        case 'facile':
            return 'success';
        case 'moyen':
            return 'warning';
        case 'difficile':
            return 'danger';
        default:
            return 'primary';
    }
}

// Fonction pour afficher une notification
function showNotification(message) {
    const toast = document.createElement('div');
    toast.className = 'toast show position-fixed bottom-0 end-0 m-3';
    toast.setAttribute('role', 'alert');
    toast.innerHTML = `
        <div class="toast-header">
            <strong class="me-auto">Notification</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            ${message}
        </div>
    `;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.remove();
    }, 3000);
}

// Ajouter les écouteurs d'événements
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('add-exercise-form').addEventListener('submit', addExercise);
    loadExerciseList();
}); 