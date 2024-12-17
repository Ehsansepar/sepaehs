function submit() {
    let userName = document.getElementById("name").value;
    document.getElementById("result").innerText = userName;
    document.getElementById("h1").textContent = `Welcome Dear, ${userName}`; 
    console.log(userName);
}

function white() {
    document.getElementById('btnBlanc').onclick = function() {
        document.getElementById('name').style.color = 'white';
        document.getElementById('result').style.color = 'white';
        document.getElementById('h1').style.color = 'white';
    }
}

function green() {
    document.getElementById('btnVert').onclick = function() {
        document.getElementById('name').style.color = 'green';
        document.getElementById('result').style.color = 'green';
        document.getElementById('h1').style.color = 'green';
    }
}

function red() {
    document.getElementById('btnRouge').onclick = function() {
        document.getElementById('name').style.color = 'red';
        document.getElementById('result').style.color = 'red';
        document.getElementById('h1').style.color = 'red';
    }
}

function yellow() {
    document.getElementById('btnJaune').onclick = function() {
        document.getElementById('name').style.color = 'yellow';
        document.getElementById('result').style.color = 'yellow';
        document.getElementById('h1').style.color = 'yellow';
    }
}