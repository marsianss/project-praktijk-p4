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
        console.error(`Scenario with ID ${currentScenarioId} not found`);
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
    scenario.choices.forEach((choice, index) => {
        const button = document.createElement('button');
        button.innerText = choice.text;
        button.classList.add('choice');
        button.onclick = () => makeChoice(choice);
        choicesDiv.appendChild(button);
    });
    document.getElementById('reputation').innerText = `Reputatie: ${reputation}`;
}

function endGame() {
    // Toon een bericht dat de game is beëindigd
    const scenarioText = document.getElementById('scenario-text');
    scenarioText.innerText = "Gefeliciteerd! Je hebt het einde van de game bereikt.";

    // Voeg een knop toe om opnieuw te spelen
    const replayButton = document.createElement('button');
    replayButton.innerText = "Opnieuw spelen";
    replayButton.classList.add('replay-button');
    replayButton.onclick = () => {
        // Reset de variabelen en begin opnieuw
        currentScenarioId = 1;
        reputation = 0;
        fetchScenarios();
    };

    // Voeg de knop toe aan de keuzescontainer
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
