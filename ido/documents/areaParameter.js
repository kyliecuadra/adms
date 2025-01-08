// Combined Script

document.addEventListener('DOMContentLoaded', () => {
    const instances = [
        { areaId: 'currentArea', parameterId: 'currentParameter' }
        // Add more instances as needed
    ];

    instances.forEach(({ areaId, parameterId }) => {
        new AreaSelect(areaId, parameterId);
    });
});

const areaOptions = ['Select Area', 'Area 1', 'Area 2', 'Area 3', 'Area 4', 'Area 5', 'Area 6', 'Area 7', 'Area 8', 'Area 9', 'Area 10'];

class AreaSelect {
    constructor(selectId, parameterSelectId) {
        this.selectId = selectId;
        this.areaSelect = document.getElementById(selectId);
        
        if (!this.areaSelect) {
            console.error(`Element with id "${selectId}" not found.`);
            return;
        }

        this.parameterSelect = new ParameterSelect(parameterSelectId);
        this.createAreaSelect();
    }

    createAreaSelect() {
        if (!this.areaSelect) return;  // Prevent further execution if element is not found

        // Populate existing select element
        areaOptions.forEach(area => {
            const option = document.createElement('option');
            option.value = area;
            option.textContent = area;
            this.areaSelect.appendChild(option);
        });

        this.areaSelect.onchange = () => this.updateParameters();
    }

    updateParameters() {
        const selectedArea = this.areaSelect.value;
        this.parameterSelect.updateParameters(selectedArea);
    }
}

const parameters = {
    'Area 1': ['Parameter A', 'Parameter B'],
    'Area 2': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D', 'Parameter E', 'Parameter F', 'Parameter G'],
    'Area 3': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D', 'Parameter E', 'Parameter F'],
    'Area 4': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D', 'Parameter E'],
    'Area 5': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D'],
    'Area 6': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D'],
    'Area 7': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D', 'Parameter E', 'Parameter F', 'Parameter G'],
    'Area 8': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D', 'Parameter E', 'Parameter F', 'Parameter G', 'Parameter H', 'Parameter I', 'Parameter J'],
    'Area 9': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D'],
    'Area 10': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D', 'Parameter E', 'Parameter F', 'Parameter G', 'Parameter H']
};

class ParameterSelect {
    constructor(selectId) {
        this.selectId = selectId;
        this.parameterSelect = document.getElementById(selectId);
        this.parameterSelect.innerHTML = '<option value="Select Parameter">Select Parameter</option>'; // Initialize with default option
    }

    updateParameters(selectedArea) {
        // Clear existing options
        this.parameterSelect.innerHTML = '<option value="Select Parameter">Select Parameter</option>';

        if (selectedArea && parameters[selectedArea]) {
            parameters[selectedArea].forEach(param => {
                const option = document.createElement('option');
                option.value = param;
                option.textContent = param;
                this.parameterSelect.appendChild(option);
            });
        }
    }
}
