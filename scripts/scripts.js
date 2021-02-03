jQuery('document').ready(function($){
	var menuBtn = $('.menu-icon'),
	menu = $('.navigation ul');

	menuBtn.click(function(){

		if(menu.hasClass('show')){
			menu.removeClass('show');
		}else{
			menu.addClass('show');
		}
	});
});

function validacion(id){
	var elem = document.getElementById(id);
	if(elem.checkValidity())
		elem.style.borderColor= "#62c945";
	else
		elem.style.borderColor="red";
}

function enviado()
{
		var usuarioValido= document.getElementById('usuario').checkValidity();
		var passwordValido= document.getElementById('password').checkValidity();

	if(usuarioValido && passwordValido){
		document.getElementById("demo").innerHTML ="Información valida";
		
	}
	else
		document.getElementById("demo").innerHTML ="Complete los campos correctamente....."

}

function sub(name, ha, dh, dd, tr, pl, qt, gn){
	var u = "setvalues.php?name="+name+"&ha="+ha+"&dh="+dh+"&dd="+dd+"&tr="+tr+"&pl="+pl+"&qt="+qt+"&gn="+gn;
	//alert(name)
	window.location=u;
}


function setdata(name, ha, dh, dd, tr, pl, qu, gn){

	document.getElementById('resultados').style.display='block';

	document.getElementById('name').value = name;
	document.getElementById('hectareas').value = ha;
	document.getElementById('horizontal').value = dh;
	document.getElementById('diagonal').value = dd;
	document.getElementById('trancas').value = tr;
	document.getElementById('plantas').value = pl;
	document.getElementById('quintales').value = qu;
	document.getElementById('ganancia').value = gn;

}

function showForms(value){							
	console.log(value);
	if(value === "0"){
		alert("Debe seleccionar un cultivo para empezar.")
	}else{
		setTitle(value);
		document.getElementById('showForm').style.display='block';
	}						
}

function setTitle(value){

	var v= "-- "+value+" --"
	document.getElementById('titlec').innerHTML = v;
}

function calculate(h, d, hec){

	var name = document.getElementById('combo').value;
	var quinxha = parseFloat("70");


	var hectareas = parseFloat(hec);

	var horizontal = (100/parseFloat(h));

	var diagonal = (100/parseFloat(d));

	var trancas = horizontal * diagonal;

	var plantas = trancas * 2;

	var quintales = quinxha * hectareas;

	var gananciaEstimada = quintales*15;

	console.log(hec);
	setdata(name, hec, h, d, trancas, plantas, quintales, gananciaEstimada)
}

function imprimirDIV(contenido) {
	var ficha = document.getElementById(contenido);
	var ventanaImpresion = window.open(' ', 'popUp');
	ventanaImpresion.document.write(ficha.innerHTML);
	ventanaImpresion.document.close();
	ventanaImpresion.print();
	ventanaImpresion.close();
}

function set_table(Dat){
	if (Dat === "0"){
		alert('Debe seleccionar una fecha')
	}else{
		var fecha = new Date(Dat);
	var dias = 3; // Número de días a agregar + 1
	var diasn = -3;
	var f1 = fecha;
	fecha.setDate(fecha.getDate() + dias);
	
	console.log(fecha)//---------------------------imprime la fecha despues de 3 dias
	document.getElementById('fech1_fech').innerHTML = fecha.toISOString().slice(0,10)+"<br>(3 días luego del inicio del cultivo)";
	fecha.setDate(fecha.getDate() + diasn);

	dias = 13; // Número de días a agregar + 1
	diasn = -13
	fecha.setDate(fecha.getDate() + dias);
	document.getElementById('fech2_fech').innerHTML = fecha.toISOString().slice(0,10)+"<br>(13 días luego del inicio del cultivo)";
	console.log(fecha)//---------------------------imprime la fecha despues de 13 dias
	fecha.setDate(fecha.getDate() + diasn);

	dias = 30; // Número de días a agregar + 1
	diasn = -30
	fecha.setDate(fecha.getDate() + dias);
	document.getElementById('fech3_fech').innerHTML = fecha.toISOString().slice(0,10)+"<br>(30 días luego del inicio del cultivo)";
	console.log(fecha)//---------------------------imprime la fecha despues de 30 dias
	fecha.setDate(fecha.getDate() + diasn);


	document.getElementById('fech1_abono').innerHTML = "2 a 3 bolsas de 50Kg de Urea por cada hectarea";
	document.getElementById('fech1_fumi').innerHTML = "fumigación en contra de semillas no deseadas";

	document.getElementById('fech2_abono').innerHTML = "2 a 3 bolsas de 50Kg de Urea por cada hectarea";
	document.getElementById('fech2_fumi').innerHTML = "fumigación en contra de insectos no deseados";

	document.getElementById('fech3_abono').innerHTML = "2 a 3 bolsas de 50Kg de Urea por cada hectarea";
	document.getElementById('fech3_fumi').innerHTML = "fumigación en contra de insectos o plagas no deseadas";
	
	dias = 60; // Número de días a agregar + 1
	diasn = -60
	fecha.setDate(fecha.getDate() + dias);
	document.getElementById('fech3_cos').innerHTML = fecha.toISOString().slice(0,10)+"<br>(60 días luego del inicio del cultivo ya puede cosechar)";
	console.log(fecha)//---------------------------imprime la fecha despues de 30 dias
	fecha.setDate(fecha.getDate() + diasn);
	}
	
	
}
