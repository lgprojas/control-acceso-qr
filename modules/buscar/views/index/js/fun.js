//sólo integer

   function valNum(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2   
    if (tecla==8 && tecla.charAt(0) != 0){
         return true; // 3
         patron = /^[1-9]$/; // Solo acepta números
            te = String.fromCharCode(tecla); // 5
            return patron.test(te); // 6
    }else{
            patron = /^[0-9]$/; // Solo acepta números
            te = String.fromCharCode(tecla); // 5
            return patron.test(te); // 6
        }
    }

$(document).ready(function(){
                $(".test").kalendar({
                    //show_week_number: 'true',
                    open_effect: 'fadeIn',
                    close_effect: 'fadeOut',
                    show_year_control: 'true',
                    format:'%d-%m-%Y'
                });

                //manual http://www.aprender-a-programar.com/jquery-datepicker
            });

function Vrut(rutx)
{
    var count = 0;
    var count2 = 0;
    var factor = 2;
    var suma = 0;
    var sum = 0;
    var digito = 0;
    var arrRut = rutx.split('-');

    if(arrRut.length!=2)
    {
        document.getElementById('Verificacion').innerHTML="&nbsp;";
        document.nuevo_emp.nuevo_emp.disabled='disabled';
        return false;
    }

    var rut = arrRut[0];
    var dvIn = arrRut[1];


    count2 = rut.length - 1;
    while(count < rut.length)
    {

        sum = factor * (parseInt(rut.substr(count2,1)));
        suma = suma + sum;
        sum = 0;

        count = count + 1;
        count2 = count2 - 1;
        factor = factor + 1;

        if(factor > 7){
            factor=2;
        }

    }
    digito = 11 - (suma % 11);

    if (digito == 11){
        digito = 0;
    }
    if (digito == 10) {
        digito = "k";
    }
    //form.dig.value = digito;

    //--------------Valida largo == 10 string---------------
    var myString = "11111111-1";
    var length = myString.length;
    //----------------------------------------------
    if(digito==dvIn && rutx!= "11111111-1" && rutx!= "22222222-2" && rutx!= "33333333-3" && rutx!= "44444444-4" && rutx!= "55555555-5" && rutx!= "66666666-6" && rutx!= "77777777-7" && rutx!= "88888888-8" && rutx!= "99999999-9" && rutx!= "00000000-0" && rutx!= "12345678-9" && rutx!= "00000000-" && rutx.length == length)
    {
        //verificar si el rut existe y si posee contrato
        document.getElementById('Verificacion').innerHTML="Rut OK";
	
        document.form1.newcli.disabled='';
		
    }
    else
    {
        document.getElementById('Verificacion').innerHTML="<span class='TextoChicoDestacado'>Rut Erroneo</span>";
        document.form1.newcli.disabled='disabled';
    }
}
