class DawFileUploader {
    constructor(divid) {

        this.idx = 0;
        this.midaTotal = 0;
        this.validarFitxers = this.validarFitxers.bind(this);

        this.container = document.getElementById(divid);
        this.crearInputFicher = this.crearInputFicher.bind(this);
        this.crearInputFicher();
    }

    crearInputFicher() {
        this.idx = this.idx + 1;
        let colordib = document.createElement("input");
        colordib.type = "file";
        colordib.id = "fitxers" + this.idx;
        colordib.name = "fitxers" + this.idx;

        this.container.appendChild(colordib)
        colordib.addEventListener("change", this.validarFitxers);

        var salt = document.createElement("br");
        this.container.appendChild(salt);
    }


    validarFitxers() {
        var fitxers = document.getElementById('fitxers' + this.idx);
        var fitxer;
        this.midaTotal;

        if (fitxers.files.length >= 0) {



            for (var i = 0; i < fitxers.files.length; i++) {
                fitxer = fitxers.files[i];
                console.log("Fitxer: " + fitxer.name + " te una mida de " + fitxer.size + " bytes");
                this.midaTotal += fitxer.size;
            }
            this.idx + 1;
            this.crearInputFicher();
        }
    };
}