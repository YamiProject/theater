//JS
function ticketchoise(theObject)
{
  let pricesum= document.getElementById("showprice");
  let finalsum= document.getElementById("finalprice");
  let sumget= finalsum.innerHTML;
  let buyticketphp= document.getElementById("buy");
  let arr = theObject.value.split(",");
  let final=parseInt(sumget,10);
 
  let button = document.getElementById("buybotton");

  if(theObject.className==="already")
  {
    let pattern = arr[0]+","+arr[1]+";";
    final-=parseInt(arr[2],10);

    buyticketphp.value = buyticketphp.value.replace(pattern,"");

    let pattern2 = "+"+arr[2];
    let pattern3 = arr[2]+"+";

    if(pricesum.innerHTML.indexOf(pattern3)<0 && pricesum.innerHTML.indexOf(pattern2)<0)
    pricesum.innerHTML = pricesum.innerHTML.replace(arr[2],"");
    else if(pricesum.innerHTML.indexOf(pattern2)>=0)
    pricesum.innerHTML = pricesum.innerHTML.replace(pattern2,"");
    else if(pricesum.innerHTML.indexOf(pattern3)>=0)
    pricesum.innerHTML = pricesum.innerHTML.replace(pattern3,"");

    finalsum.innerHTML=final;
    theObject.className = "activeticket";

    if(arr[2]<=1000)
    theObject.style = "background-color:green; font-size:0pt";
    else if(arr[2]>1000 && arr[2]<=4000)
    theObject.style = "background-color:blue; font-size:0pt";
    else
    theObject.style = "background-color:purple; font-size:0pt";
  }
  else if(theObject.className==="activeticket")
  {
  if(pricesum.innerHTML!=""){
  pricesum.innerHTML+= "+"+arr[2];
  final += parseInt(arr[2],10);
  }
  else
  {
  pricesum.innerHTML=arr[2];
  final=parseInt(arr[2],10);
  }

  buyticketphp.value += arr[0]+","+arr[1]+";";
  finalsum.innerHTML=final;
  theObject.className = "already";
  theObject.style = "background-color:gray; font-size:0pt";
  }
  
  

  if(buyticketphp.value!="")
  {
  button.disabled = false;
  button.className = "ticketbuyactive";
  }
  else
  {
  button.disabled = true;
  button.className = "ticketbuynoactive";
  }
}

//profileChange.php
function ckeckname(theObject)
{
  theObject.value=theObject.value.replace(" ","");
  let button = document.getElementById("acs");
  let error = document.getElementById("erroname");
  let string = theObject.value.split("");

  let accsess = true;
  let len = true;

  for(let i=0;i<string.length;i++)
  {
    if(string[i].match(/[А-ЯЁ]/gi)==null)
    accsess = false;
  }

  if(string.length< 2)
  len = false;

  if(accsess==false)
  {
    button.disabled = true;
    button.className = "profilchangebuttonnoactive";
    error.innerHTML = "Присутствуют недопустимые символы"; 
  }
  else if(len==false)
  {
    button.disabled = true;
    button.className = "profilchangebuttonnoactive";
    error.innerHTML = "Мало символов"; 
  }
  else
  {
    button.disabled = false;
    button.className = "profilchangebuttonactive";
    error.innerHTML = ""; 
  }
}

function ckecksecname(theObject)
{
  theObject.value=theObject.value.replace(" ","");
  let button = document.getElementById("acs");
  let error = document.getElementById("errosecname");
  let string = theObject.value.split("");

  let accsess = true;
  let len = true;

  for(let i=0;i<string.length;i++)
  {
    if(string[i].match(/[А-ЯЁ]/gi)==null)
    accsess = false;
  }

  if(string.length< 2)
  len = false;

  if(accsess==false)
  {
    button.disabled = true;
    button.className = "profilchangebuttonnoactive";
    error.innerHTML = "Присутствуют недопустимые символы"; 
  }
  else if(len==false)
  {
    button.disabled = true;
    button.className = "profilchangebuttonnoactive";
    error.innerHTML = "Мало символов"; 
  }
  else
  {
    button.disabled = false;
    button.className = "profilchangebuttonactive";
    error.innerHTML = ""; 
  }
}

function ckeckphone(theObject)
{
  theObject.value=theObject.value.replace(" ","");
  let button = document.getElementById("acs");
  let error = document.getElementById("errophone");

 
  if(theObject.value.match(/\D/))
  theObject.value= theObject.value.slice(0,-1);

  let string = theObject.value.split("");
  let len = true;
  if(string.length!=10)
  len = false;
  
  if(len==false)
  {
    button.disabled = true;
    button.className = "profilchangebuttonnoactive";
    error.innerHTML = "Неккоректная длинна"; 
  }
  else
  {
    button.disabled = false;
    button.className = "profilchangebuttonactive";
    error.innerHTML = ""; 
  }
}

function checkimg(theObject)
{
  theObject.value = theObject.value.replace(" ","");
  let button = document.getElementById("acs");
  let error = document.getElementById("erroimage");
  let string = theObject.value;
  let accsess = true;

  if(string.substr(string.length-4,string.length)!=".png" && string.substr(string.length-4,string.length)!=".jpg")
  accsess=false;

  if(theObject.value=="")
  {
    accsess = true;
  }

  if(accsess==false)
  {
    button.className = "profilchangebuttonnoactive";
    button.disabled = true;
    error.innerHTML = "Недопустимый url"; 
  }
  else
  {
    button.disabled = false;
    button.className = "profilchangebuttonactive";
    error.innerHTML = ""; 
  }
  
}








//Registration
function regckeckname(theObject)
{
  theObject.value=theObject.value.replace(" ","");
  let error = document.getElementById("erroname");
  let string = theObject.value.split("");



  let accsess = true;
  let len = true;

 
  for(let i=0;i<string.length;i++)
  {
    if(string[i].match(/[А-ЯЁ]/gi)==null)
    accsess = false;
  }

  if(string.length< 2)
  len = false;

  if(accsess==false)
  {
    error.innerHTML = "Присутствуют недопустимые символы"; 
  }
  else if(len==false)
  {
    error.innerHTML = "Мало символов"; 
  }
  else
  {
    error.innerHTML = ""; 
  }

}

function regckecksecname(theObject)
{
  theObject.value=theObject.value.replace(" ","");
  let error = document.getElementById("erroseconname");
  let string = theObject.value.split("");

  let accsess = true;
  let len = true;

  for(let i=0;i<string.length;i++)
  {

    if(string[i].match(/[А-ЯЁ]/gi)==null)
    accsess = false;
  }

  if(string.length< 2)
  len = false;

  if(accsess==false)
  {
    error.innerHTML = "Присутствуют недопустимые символы"; 
  }
  else if(len==false)
  {
    error.innerHTML = "Мало символов"; 
  }
  else
  {
    error.innerHTML = ""; 
  }
}

function regckeckphone(theObject)
{
  theObject.value=theObject.value.replace(" ","");
  let error = document.getElementById("errophone");

  if(theObject.value.match(/\D/))
  theObject.value= theObject.value.slice(0,-1);
  let string = theObject.value.split("");
  let len = true;

  

  if(string.length!=10)
  len = false;

if(len==false)
  {
    error.innerHTML = "Неккоректная длинна"; 
  }
  else
  {
    error.innerHTML = ""; 
  }
}

function reglogin(theObject)
{
  theObject.value=theObject.value.replace(" ","");
  let error = document.getElementById("errorlg");
  let string = theObject.value.split("");

  let accsess = true;
  let len = true;

  for(let i=0;i<string.length;i++)
  {

    if(string[i].match(/^\w*$/gi)==null)
    accsess = false;
  }

  if(string.length< 4)
  len = false;

  if(accsess==false)
  {
    error.innerHTML = "Присутствуют недопустимые символы"; 
  }
  else if(len==false)
  {
    error.innerHTML = "Мало символов"; 
  }
  else
  {
    error.innerHTML = ""; 
  }
}

function regemail(theObject)
{
  theObject.value=theObject.value.replace(" ","");
  let error = document.getElementById("erorrem");
  let string = theObject.value;

  let accsess = true;

  if(string.match(/^[0-9a-z-\.]+\@[0-9a-z-]{2,}\.[a-z]{2,}$/i)==null)
  accsess=false;

  if(accsess==false)
  {
    error.innerHTML = "Недествительный email"; 
  }
  else
  {
    error.innerHTML = ""; 
  }
}

function regpasw(theObject)
{
  theObject.value=theObject.value.replace(" ","");
  let error = document.getElementById("erropas");
  let string = theObject.value;

  let accsess = true;

  if(string.length<8)
  accsess = false;

  if(accsess==false)
  {
    error.innerHTML = "Пароль слишком короткий"; 
  }
  else
  {
    let p2 = document.getElementById("pas2");
    p2.disabled = false;
    error.innerHTML = ""; 
  }
}

function regsecpasw()
{
  let p1 = document.getElementById("pas1");
  let p2 = document.getElementById("pas2");
  let error = document.getElementById("erropas2");
  let accsess = true;

  if(p1.value !== p2.value) {
    accsess = false;
  }

  if(accsess==false)
  {
    error.innerHTML = "Пароли не совпадают"; 
  }
  else if(accsess==true)
  error.innerHTML = "";  
}

function regcheck()
{
  let reg = document.getElementById("reg");

  let check1 = document.getElementById("errorlg");
  let check2 = document.getElementById("erorrem");
  let check3 = document.getElementById("erropas");
  let check4 = document.getElementById("erropas2");
  let check5 = document.getElementById("erroname");
  let check6 = document.getElementById("erroseconname");
  let check7 = document.getElementById("errophone");
  
  let check11 = document.getElementById("log");
  let check12 = document.getElementById("em");
  let check13 = document.getElementById("pas1");
  let check14 = document.getElementById("pas2");
  let check15 = document.getElementById("namer");
  let check16 = document.getElementById("secnamer");
  let check17 = document.getElementById("numr");

  if(check1.innerHTML=="" && check2.innerHTML=="" && check3.innerHTML=="" && 
  check4.innerHTML=="" && check5.innerHTML=="" && check6.innerHTML=="" && 
  check7.innerHTML=="" && check11.value!="" && 
  check12.value!="" && check13.value!=""
  && check14.value!="" && check15.value!="" && check16.value!="" && check17.value!="")
  {
   
   reg.disabled=false;
   reg.className="rebuttonactive";
  }
  else
  {
   reg.disabled=true;
   reg.className="rebuttonnoactive";
  }
}

//JQ

$(document).ready(function(){

  //Картинки
  $('.mainpic1').click(function()
  {
    $('.mainpic1').animate({opacity: 0}, 0);
    $('.mainpic1').width("0");
    $('.mainpic2').width("100%");
    $('.mainpic2').animate({opacity: 1}, 600);

    $("#point1").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point2").removeClass('pointsnoactive').addClass('pointsactive');
    $("#point3").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point4").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point5").removeClass('pointsactive').addClass('pointsnoactive');
  });

  $('.mainpic2').click(function()
  {
    $('.mainpic2').animate({opacity: 0}, 0);
    $('.mainpic2').width("0");
    $('.mainpic3').width("100%");
    $('.mainpic3').animate({opacity: 1}, 600);

    $("#point1").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point3").removeClass('pointsnoactive').addClass('pointsactive');
    $("#point2").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point4").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point5").removeClass('pointsactive').addClass('pointsnoactive');
  });

  $('.mainpic3').click(function()
  {
    $('.mainpic3').animate({opacity: 0}, 0);
    $('.mainpic3').width("0");
    $('.mainpic4').width("100%");
    $('.mainpic4').animate({opacity: 1}, 600);

    $("#point1").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point4").removeClass('pointsnoactive').addClass('pointsactive');
    $("#point3").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point2").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point5").removeClass('pointsactive').addClass('pointsnoactive');
  });

  $('.mainpic4').click(function()
  {
    $('.mainpic4').animate({opacity: 0}, 0);
    $('.mainpic4').width("0");
    $('.mainpic5').width("100%");
    $('.mainpic5').animate({opacity: 1}, 600);

    $("#point1").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point5").removeClass('pointsnoactive').addClass('pointsactive');
    $("#point3").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point4").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point2").removeClass('pointsactive').addClass('pointsnoactive');
  });

  $('.mainpic5').click(function()
  {
    $('.mainpic5').animate({opacity: 0}, 0);
    $('.mainpic5').width("0");
    $('.mainpic1').width("100%");
    $('.mainpic1').animate({opacity: 1}, 600);

    $("#point2").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point1").removeClass('pointsnoactive').addClass('pointsactive');
    $("#point3").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point4").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point5").removeClass('pointsactive').addClass('pointsnoactive');
  });

  //Кнопки для картинки
  $('#point2').click(function()
  {
    $('.mainpic1').animate({opacity: 0}, 0);
    $('.mainpic1').width("0");
    $('.mainpic3').animate({opacity: 0}, 0);
    $('.mainpic3').width("0");
    $('.mainpic4').animate({opacity: 0}, 0);
    $('.mainpic4').width("0");
    $('.mainpic5').animate({opacity: 0}, 0);
    $('.mainpic5').width("0");

    $('.mainpic2').width("100%");
    $('.mainpic2').animate({opacity: 1}, 600);

    $("#point1").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point2").removeClass('pointsnoactive').addClass('pointsactive');
    $("#point3").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point4").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point5").removeClass('pointsactive').addClass('pointsnoactive');

  });

  $('#point3').click(function()
  {
    $('.mainpic1').animate({opacity: 0}, 0);
    $('.mainpic1').width("0");
    $('.mainpic2').animate({opacity: 0}, 0);
    $('.mainpic2').width("0");
    $('.mainpic4').animate({opacity: 0}, 0);
    $('.mainpic4').width("0");
    $('.mainpic5').animate({opacity: 0}, 0);
    $('.mainpic5').width("0");

    $('.mainpic3').width("100%");
    $('.mainpic3').animate({opacity: 1}, 600);

    $("#point1").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point3").removeClass('pointsnoactive').addClass('pointsactive');
    $("#point2").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point4").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point5").removeClass('pointsactive').addClass('pointsnoactive');
  });

  $('#point4').click(function()
  {
    $('.mainpic1').animate({opacity: 0}, 0);
    $('.mainpic1').width("0");
    $('.mainpic2').animate({opacity: 0}, 0);
    $('.mainpic2').width("0");
    $('.mainpic3').animate({opacity: 0}, 0);
    $('.mainpic3').width("0");
    $('.mainpic5').animate({opacity: 0}, 0);
    $('.mainpic5').width("0");

    $('.mainpic4').width("100%");
    $('.mainpic4').animate({opacity: 1}, 600);

    $("#point1").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point4").removeClass('pointsnoactive').addClass('pointsactive');
    $("#point3").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point2").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point5").removeClass('pointsactive').addClass('pointsnoactive');
  });

  $('#point5').click(function()
  {
    $('.mainpic1').animate({opacity: 0}, 0);
    $('.mainpic1').width("0");
    $('.mainpic2').animate({opacity: 0}, 0);
    $('.mainpic2').width("0");
    $('.mainpic3').animate({opacity: 0}, 0);
    $('.mainpic3').width("0");
    $('.mainpic4').animate({opacity: 0}, 0);
    $('.mainpic4').width("0");

    $('.mainpic5').width("100%");
    $('.mainpic5').animate({opacity: 1}, 600);

    $("#point1").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point5").removeClass('pointsnoactive').addClass('pointsactive');
    $("#point3").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point4").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point2").removeClass('pointsactive').addClass('pointsnoactive');
  });

  $('#point1').click(function()
  {
    $('.mainpic2').animate({opacity: 0}, 0);
    $('.mainpic2').width("0");
    $('.mainpic3').animate({opacity: 0}, 0);
    $('.mainpic3').width("0");
    $('.mainpic4').animate({opacity: 0}, 0);
    $('.mainpic4').width("0");
    $('.mainpic5').animate({opacity: 0}, 0);
    $('.mainpic5').width("0");

    $('.mainpic1').width("100%");
    $('.mainpic1').animate({opacity: 1}, 600);

    $("#point2").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point1").removeClass('pointsnoactive').addClass('pointsactive');
    $("#point3").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point4").removeClass('pointsactive').addClass('pointsnoactive');
    $("#point5").removeClass('pointsactive').addClass('pointsnoactive');
  });

  //Спектакли
    $('.mainspectsection').mouseenter(function()
    {
      $('.mainspectblock', this).animate({height: "+=150", marginTop: "-=150px"}, 600);
    });
    $('.mainspectsection').mouseleave(function()
    {
      $('.mainspectblock', this).animate({height: "-=150", marginTop: "+=150px"}, 600);
    });
});