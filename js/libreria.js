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
        allert.innerHTML="troppo lungha";
        allert.style.display="block";
    }
    else
    {
        allert.style.display="none";
    }
    if(cognome.length>10)
    {
        allert.innerHTML="troppo lungha";
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
    modal.style.display="none";
    btn.style.display="none";
    hide.innerHTML="Benvenuto,<br>"+nome+" "+cognome;
    hide.style.display="block";
    hide2.style.display="block";
}
function after_login(nome,cognome)
{
    salutaUtente(nome,cognome);
    document.getElementById("carrello").style.right="30px";
    hide.style.position="absolute";
    hide.style.right="60px";
    hide.style.top="10px";
    carrello.style.display="block";
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
function servizio()
{
    var carrelo_funz=document.createElement('a');
    carrello.href="carrello.html";
    var car_img=document.createElement('img');
    car_img.setAttribute("src", "img/carrello.png");
    car_img.className="carrello";
    carrelo_funz.appendChild(car_img);
}
function contr_lung_sign()
{
    let nome=$("#sign_nome").val();
    let cognome=$("#sign_cognome").val();

    if(nome.length>10)
    {
        allert.innerHTML="troppo lungha";
        allert.style.display="block";
    }
    else
    {
        allert.style.display="none";
    }
    if(cognome.length>10)
    {
        allert.innerHTML="troppo lungha";
        allert2.style.display="block";
    }
    else
    {
        allert2.style.display="none";
    }
}
function salutaNuovoUtente(sign_nome,sign_cognome)
{
    var sign_nome=String($("#sign_nome").val());
    var sign_cognome=String($("#sign_cognome").val());
    modal.style.display="none";
    modal.style.display="none";
    btn.style.display="none";
    hide.innerHTML="Benvenuto,<br>"+sign_nome+" "+sign_cognome;
    hide.style.display="block";
    hide2.style.display="block";
}
function after_sign_up(sign_nome,sign_cognome)
{
    salutaNuovoUtente(sign_nome,sign_cognome);
    document.getElementById("carrello").style.right="30px";
    hide.style.position="absolute";
    hide.style.right="60px";
    hide.style.top="10px";
    carrello.style.display="block";
}
function pre_img(input) 
{
    
    if (input.files && input.files[0]) 
    {
       
        
        var reader = new FileReader();
      
        reader.onload = function(e) 
        {
          $('#pre_img').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
function contr_cms()
{
    var nome_cms=document.getElementById("nome_cms").value;
    var pass_cms=document.getElementById("pass_cms").value;
    if(nome_cms=="admin" && pass_cms=="admin" )
    {
        document.getElementById("login_cms").style.display="none";
    } 
    else
    {
        if(nome_cms.length<=0 || pass_cms.length<=0)
        {
            document.getElementById("cms_alt").innerHTML="inserire tutti i campi";
            document.getElementById("cms_alt").style.display="block";
        }
        else
        {
            document.getElementById("cms_alt").innerHTML="nome o password sbagliato";
            document.getElementById("cms_alt").style.display="block";
        }
       
    }
}
function primLetCms()
{
    let titolo=String($("#titolo").val());
    var restoFras=titolo.substring(1);
    var pirmaLet=titolo[0].toUpperCase();
    $("#titolo").val(pirmaLet+restoFras);
}
function primLetCmsDesc()
{
    let descrizione=String($("#descrizione").val());
    var restoFrasDescr=descrizione.substring(1);
    var pirmaLetDescr=descrizione[0].toUpperCase();
    $("#descrizione").val(pirmaLetDescr+restoFrasDescr);
}
function crea_contr()
{
    if(document.getElementById("titolo").value.length<=0 || document.getElementById("descrizione").value.length<=0 || document.getElementById("prezzo").value.length<=0|| document.getElementById("file").value.length<=0)
    {
        document.getElementById("cms_alt_con").style.display="block";
    }
    else
    {
        document.getElementById("cms_alt_con").style.display="none";
    }
    
}
function reset_cms_alt()
{
    document.getElementById("cms_alt").style.display="none";
}