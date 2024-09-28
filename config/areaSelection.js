const areaOptions = ['Select Area', 'Area I', 'Area II', 'Area III', 'Area IV', 'Area V', 'Area VI', 'Area VII', 'Area VIII', 'Area IX', 'Area X'];

class AreaSelect {
    constructor(selectId, parameterSelect) {
        this.selectId = selectId;
        this.parameterSelect = parameterSelect;
        this.areaSelect = document.getElementById(selectId);
        this.createAreaSelect();
    }

    createAreaSelect() {
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
