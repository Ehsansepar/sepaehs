// Fonction pour charger les exercices récents
function loadRecentExercises() {
    const exercises = JSON.parse(localStorage.getItem('exercises') || '[]');
    const recentExercises = exercises.slice(-3).reverse(); // Prend les 3 derniers exercices
    const container = document.getElementById('recent-exercises');
    
    container.innerHTML = '';
    
    if (recentExercises.length === 0) {
        container.innerHTML = '<p class="text-muted">Aucun exercice disponible pour le moment.</p>';
        return;
    }

    recentExercises.forEach(exercise => {
        const card = document.createElement('div');
        card.className = 'card mb-3 exercise-card';
        card.innerHTML = `
            <div class="card-body">
                <h5 class="card-title">${exercise.title}</h5>
                <p class="card-text">${exercise.description}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge bg-${getDifficultyColor(exercise.difficulty)}">${exercise.difficulty}</span>
                    <small class="text-muted">${new Date(exercise.date).toLocaleDateString()}</small>
                </div>
            </div>
        `;
        
        card.addEventListener('click', () => {
            window.location.href = `exercices.html#${exercise.id}`;
        });
        
        container.appendChild(card);
    });
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
    const toast = document.getElementById('notification-toast');
    const toastBody = toast.querySelector('.toast-body');
    toastBody.textContent = message;
    
    const bsToast = new bootstrap.Toast(toast);
    bsToast.show();
}

// Écouter les changements dans le localStorage
window.addEventListener('storage', (e) => {
    if (e.key === 'exercises') {
        loadRecentExercises();
        showNotification('Un nouvel exercice a été ajouté !');
    }
});

// Charger les exercices au chargement de la page
document.addEventListener('DOMContentLoaded', loadRecentExercises); 