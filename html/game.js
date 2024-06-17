let scenarios;
let currentScenarioId = 1;
let reputation = 0;

async function fetchScenarios() {
    try {
        const response = await fetch('game_scenarios.json');
        scenarios = await response.json();
        updateScenario();
    } catch (error) {
        console.error('Error fetching scenarios:', error);
    }
}

function updateScenario() {
    const scenario = scenarios.scenarios.find(s => s.id === currentScenarioId);
    if (!scenario) {
        console.error(`Scenario met ID ${currentScenarioId} niet gevonden`);
        return;
    }

    // Controleer of het huidige scenario het eindscenario is (id 60)
    if (currentScenarioId === 60) {
        endGame();
        return;
    }

    document.getElementById('scenario-text').innerText = scenario.text;
    const choicesDiv = document.getElementById('choices');
    choicesDiv.innerHTML = '';
    scenario.choices.forEach((choice) => {
        const button = document.createElement('button');
        button.innerText = choice.text;
        button.classList.add('choice');
        button.onclick = () => makeChoice(choice);
        choicesDiv.appendChild(button);
    });

    document.getElementById('reputation').innerText = `Reputatie: ${reputation}`;
    const messageDiv = document.getElementById('message');
    messageDiv.classList.add('hidden');
    messageDiv.innerText = '';
    messageDiv.classList.remove('positive');
    messageDiv.classList.remove('negative');
}

function endGame() {
    const scenarioText = document.getElementById('scenario-text');
    const messageDiv = document.getElementById('message');

    scenarioText.innerText = "Gefeliciteerd! Je hebt het einde van de game bereikt.";
    
    const skullAndCrossbones = String.fromCodePoint(0x2620); // Skull and Crossbones emoji

    if (reputation > 0) {
        messageDiv.innerText = "Je hebt een positieve reputatie behaald! Goed gedaan!";
        messageDiv.classList.add('positive');
        messageDiv.classList.remove('negative');
    } else if (reputation < -30) {
        messageDiv.innerText = `Je hebt een HELE negatieve reputatie behaald. Hoe heb jij dit voor elkaar gekregen.. Probeer het opnieuw! ${skullAndCrossbones}`;
        messageDiv.classList.add('negative');
        messageDiv.classList.remove('positive');
    } else if (reputation < 0) {
        messageDiv.innerText = "Je hebt een negatieve reputatie behaald. Probeer het opnieuw!";
        messageDiv.classList.add('negative');
        messageDiv.classList.remove('positive');
    } else {
        messageDiv.innerText = "Je reputatie is neutraal. Probeer een betere score te behalen!";
        messageDiv.classList.remove('positive');
        messageDiv.classList.remove('negative');
    }
    
    messageDiv.classList.remove('hidden'); // Show the message

    const replayButton = document.createElement('button');
    replayButton.innerText = "Opnieuw spelen";
    replayButton.classList.add('replay-button');
    replayButton.onclick = () => {
        currentScenarioId = 1;
        reputation = 0;
        fetchScenarios();
    };

    const choicesDiv = document.getElementById('choices');
    choicesDiv.innerHTML = '';
    choicesDiv.appendChild(replayButton);
}

function makeChoice(choice) {
    reputation += choice.reputationChange;
    currentScenarioId = choice.nextScenarioId;
    updateScenario();
}

fetchScenarios();
