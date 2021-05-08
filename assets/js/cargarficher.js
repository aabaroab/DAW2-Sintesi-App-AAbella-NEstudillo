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
        colordib.name = "fitxer[]";

        this.container.appendChild(colordib)
        colordib.addEventListener("change", this.validarFitxers);

        var salt = document.createElement("br");
        this.container.appendChild(salt);
    }


    validarFitxers() {
        var fitxers = document.getElementById('fitxers' + this.idx);
        var MAX_MIDA_FITXERS = 25000; // Mida màxima en bytes
        var fitxer;
        this.midaTotal;

        if (fitxers.files.length >= 0) {



            for (var i = 0; i < fitxers.files.length; i++) {
                fitxer = fitxers.files[i];
                console.log("Fitxer: " + fitxer.name + " te una mida de " + fitxer.size + " bytes");
                this.midaTotal += fitxer.size;
            }

            console.log("Mida total dels fitxers: ", this.midaTotal);

            if (this.midaTotal < MAX_MIDA_FITXERS) {
                this.idx + 1;
                this.crearInputFicher();
            } else if (this.midaTotal > MAX_MIDA_FITXERS) {
                fitxers.value = [];
                alert("La mida màxima dels fitxers és " + MAX_MIDA_FITXERS + " bytes, però els fitxers seleccionats tenen una mida de " + this.midaTotal + " bytes.");
            }
        }
    };
}