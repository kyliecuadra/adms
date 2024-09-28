const parameters = {
    'Area I': ['Parameter A', 'Parameter B'],
    'Area II': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D', 'Parameter E', 'Parameter F', 'Parameter G'],
    'Area III': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D', 'Parameter E', 'Parameter F'],
    'Area IV': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D', 'Parameter E'],
    'Area V': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D'],
    'Area VI': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D'],
    'Area VII': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D', 'Parameter E', 'Parameter F', 'Parameter G'],
    'Area VIII': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D', 'Parameter E', 'Parameter F', 'Parameter G', 'Parameter H', 'Parameter I', 'Parameter J'],
    'Area IX': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D'],
    'Area X': ['Parameter A', 'Parameter B', 'Parameter C', 'Parameter D', 'Parameter E', 'Parameter F', 'Parameter G', 'Parameter H']
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
