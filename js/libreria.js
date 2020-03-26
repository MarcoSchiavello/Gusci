function writeln(frase)
{
    document.write(frase+"<br>");
}

function morina(a,b,c)
{
    var delta=b*b-4*(a*c);
    var x1=(b*-1)- Math.sqrt(delta)/2*a;
    var x2=(b*-1)+ Math.sqrt(delta)/2*a;
    return [x1,x2];
}
function reset_nom()
{
    allert.style.display="none";
    allert3.style.display="none";
}

function reset_cogn()
{
    allert2.style.display="none";
    allert3.style.display="none";
}

function contr_lung()
{
    var nome=$("#nome").val();
    var cognome=$("#cognome").val();

    if(nome.length>10)
    {
        allert.style.display="block";

    }
    else
    {
        allert.style.display="none";
    }
    if(cognome.length>10)
    {
        allert2.style.display="block";
    }
    else
    {
        allert2.style.display="none";
    }
    
}

function primLetMaglNome()
{
    let nome=String($("#nome").val());
    var restoFras=nome.substring(1);
    var pirmaLet=nome[0].toUpperCase();
    $("#nome").val(pirmaLet+restoFras);
}
function primLetMaglCogn()
{
    let cognome=String($("#cognome").val());
    var restoFras=cognome.substring(1);
    var pirmaLet=cognome[0].toUpperCase();
    $("#cognome").val(pirmaLet+restoFras);
}
function salutaUtente(nome,cognome)
{
    modal.style.display="none";
    btn.style.display="none";
    hide.innerHTML="Benvenuto,<br>"+nome+" "+cognome;
    hide.style.display="block";
    hide2.style.display="block";
}
function trova_art() 
{
    var input,caps,lista_card,el_lista,nome,cont_nome; 
    input = document.getElementById("lente");
    caps = input.value.toUpperCase();
    lista_card = document.getElementById("lista");
    el_lista = lista_card.getElementsByTagName("li");
    for ( i = 0; i < el_lista.length; i++) 
    {
        nome = el_lista[i].getElementsByTagName("h1")[0];
        cont_nome= nome.textContent || nome.innerText;
        if (cont_nome.toUpperCase().indexOf(caps) > -1) 
        {
            el_lista[i].style.display = "";
        } 
        else 
        {
            el_lista[i].style.display = "none";
        }
    }
}