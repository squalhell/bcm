function validarnl(e) { 
	tecla = (document.all) ? e.keyCode : e.which; 
	if (tecla==8) return true; 
	patron =/[A-Za-z0-9Ññ\s]/;
	patron =/[ÑñA-Za-z,.0-9\s]/;
	te = String.fromCharCode(tecla);
	return patron.test(te);
}

function validarn(e) { 
	tecla = (document.all) ? e.keyCode : e.which; 
	if (tecla==8) return true; 
	patron =/\d/;
	te = String.fromCharCode(tecla);
	return patron.test(te);
}

function validaro(e) {
	tecla = (document.all) ? e.keyCode : e.which;
	if(tecla==13){
		verin()
	};
}

 function validarHora(valor) {
        var isValid = /^(2[0-3]|[01]?[0-9]):([0-5]?[0-9])$/.test(valor);

        // if (isValid) {
        //     inputField.style.backgroundColor = '#bfa';
        // } else {
        //     inputField.style.backgroundColor = '#fba';
        // }

        return isValid;
    }

function deve(rut, dv_ctrl){
	//a= "core";
	//b= "rut";
	//c= "dv";

	var Til=0;
	ruti= rut;
	pa= ruti.split("");
	lar= ruti.length;
	switch(lar){
		case 8:
			lo1=pa[7]*2;
			lo2=pa[6]*3;
			lo3=pa[5]*4;
			lo4=pa[4]*5;
			lo5=pa[3]*6;
			lo6=pa[2]*7;
			lo7=pa[1]*2;
			lo8=pa[0]*3;
			Tol =lo1+lo2+lo3+lo4+lo5+lo6+lo7+lo8;
			Tul =Tol%11;
			Til =11-Tul;
			break;
		case 7:
			lo2=pa[6]*2;
			lo3=pa[5]*3;
			lo4=pa[4]*4;
			lo5=pa[3]*5;
			lo6=pa[2]*6;
			lo7=pa[1]*7;
			lo8=pa[0]*2;
			Tol =lo2+lo3+lo4+lo5+lo6+lo7+lo8;
			Tul =Tol%11;
			Til =11-Tul;
			break;
		case 6:
			lo3=pa[5]*2;
			lo4=pa[4]*3;
			lo5=pa[3]*4;
			lo6=pa[2]*5;
			lo7=pa[1]*6;
			lo8=pa[0]*7;
			Tol =lo3+lo4+lo5+lo6+lo7+lo8;
			Tul =Tol%11;
			Til =11-Tul;
			break;
	}
	if(Til==10){ Til="K"; };
	if(Til==11){ Til=0; };
	dv_ctrl.val(Til);
}