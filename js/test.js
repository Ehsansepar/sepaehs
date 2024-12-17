// function submit() {
//     let userName = document.getElementById("name").value;
//     document.getElementById("result").innerText = userName;
//     document.getElementById("h1").textContent = `Welcome Dear, ${userName}`; 
//     console.log(userName);
// }

// function white() {
//     document.getElementById('btnBlanc').onclick = function() {
//         document.getElementById('name').style.color = 'white';
//         document.getElementById('result').style.color = 'white';
//         // document.getElementById('h1').style.color = 'white';
//     }
// }

// function green() {
//     document.getElementById('btnVert').onclick = function() {
//         document.getElementById('name').style.color = 'green';
//         document.getElementById('result').style.color = 'green';
//         // document.getElementById('h1').style.color = 'green';
//     }
// }

// function red() {
//     document.getElementById('btnRouge').onclick = function() {
//         document.getElementById('name').style.color = 'red';
//         document.getElementById('result').style.color = 'red';
//         // document.getElementById('h1').style.color = 'red';
//     }
// }

// function yellow() {
//     document.getElementById('btnJaune').onclick = function() {
//         document.getElementById('name').style.color = 'yellow';
//         document.getElementById('result').style.color = 'yellow';
//         // document.getElementById('h1').style.color = 'yellow';
//     }
// }

// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get all elements that need to be updated
    const nameInput = document.getElementById('name');
    const result = document.getElementById('result');
    const heading = document.getElementById('h1');
    const submitBtn = document.getElementById('submit');
    
    // Handle submit button click
    submitBtn.addEventListener('click', function() {
        const userName = nameInput.value;
        result.innerText = userName;
        heading.textContent = `Welcome Dear, ${userName}`;
        console.log(userName);
    });

    // Handle color buttons
    const colorButtons = document.querySelectorAll('button[data-color]');
    const elementsToColor = [nameInput, result, heading];

    colorButtons.forEach(button => {
        button.addEventListener('click', function() {
            const color = this.dataset.color;
            
            // Remove all color classes from elements
            elementsToColor.forEach(element => {
                element.classList.remove('text-white', 'text-green', 'text-red', 'text-yellow');
                // Add new color class
                element.classList.add(`text-${color}`);
            });
        });
    });
});