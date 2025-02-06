// Fonction pour charger tous les exercices
function loadExercises() {
    const exercises = JSON.parse(localStorage.getItem('exercises') || '[]');
    const container = document.getElementById('exercises-container');
    
    container.innerHTML = '';
    
    if (exercises.length === 0) {
        container.innerHTML = '<div class="col-12"><p class="text-center text-muted">Aucun exercice disponible pour le moment.</p></div>';
        return;
    }

    exercises.forEach(exercise => {
        const col = document.createElement('div');
        col.className = 'col-md-6 col-lg-4 mb-4';
        col.innerHTML = `
            <div class="card h-100 exercise-card" data-id="${exercise.id}">
                <div class="card-body">
                    <h5 class="card-title">${exercise.title}</h5>
                    <p class="card-text">${exercise.description}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-${getDifficultyColor(exercise.difficulty)}">${exercise.difficulty}</span>
                        <small class="text-muted">${new Date(exercise.date).toLocaleDateString()}</small>
                    </div>
                </div>
            </div>
        `;
        
        col.querySelector('.card').addEventListener('click', () => {
            showExerciseDetails(exercise);
        });
        
        container.appendChild(col);
    });

    // Vérifier si un exercice spécifique doit être affiché (via le hash dans l'URL)
    const exerciseId = window.location.hash.slice(1);
    if (exerciseId) {
        const exercise = exercises.find(ex => ex.id === exerciseId);
        if (exercise) {
            showExerciseDetails(exercise);
        }
    }
}

// Fonction pour afficher les détails d'un exercice
function showExerciseDetails(exercise) {
    const modal = new bootstrap.Modal(document.getElementById('exerciseModal'));
    const modalTitle = document.querySelector('#exerciseModal .modal-title');
    const modalBody = document.querySelector('#exerciseModal .modal-body');
    
    modalTitle.textContent = exercise.title;
    modalBody.innerHTML = `
        <div class="mb-3">
            <h6>Description :</h6>
            <p>${exercise.description}</p>
        </div>
        <div class="mb-3">
            <h6>Contenu de l'exercice :</h6>
            <div class="border rounded p-3 bg-light">
                ${exercise.content}
            </div>
        </div>
        <div class="mb-3">
            <h6>Votre réponse :</h6>
            <textarea class="form-control" rows="5" id="exercise-response"></textarea>
        </div>
    `;
    
    modal.show();
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

// Écouter les changements dans le localStorage
window.addEventListener('storage', (e) => {
    if (e.key === 'exercises') {
        loadExercises();
    }
});

// Charger les exercices au chargement de la page
document.addEventListener('DOMContentLoaded', loadExercises); 