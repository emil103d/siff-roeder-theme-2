<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<style>

.single {
}

.single p {
	margin-bottom: 0;
}

.ast-container {
	margin-left: 10px;
	margin-right: 10px;
}

.billeder {
	display: none;
}

.billeder img {
	height: auto;
}

.knapper .material-icons {
    font-size: 40px;
}

.knap_left {
    position: absolute;
    left: 0; bottom: 50%;
	color: white;
 }

.knap_right {
    position: absolute;
    right: 0; bottom: 50%;
	color: white;
 }


 .stort-billede {
	position: relative;
	text-align: center;
}

.main-billede {
	max-height: 50vh;
}

.maerker {
	display: flex;
	flex-direction: row;
	gap: 5px;
}

.maerker {
	margin-top: 20px;
}

.single .materiale {
	margin-bottom: 20px;
}

.maerker, .pasform, .materiale {
	font-size: 0.8em;
} 
.modellen_er {
	text-decoration: underline;
	font-size: 0.7em;
	margin-top: 0.5em;
	margin-bottom: 1rem;
}

.knapper {
	justify-content: center;
	display: flex;
}

.farve button {
	border: solid 1px;
    padding: 0.3rem;
    margin-left: 1rem;
	font-size: 0.75rem;
}

.storrelse {
	margin-top: 1rem;
}

.storrelse button{
	border: solid 1px;
    padding: 0.3rem;
    margin-left: 1rem;
	font-size: 0.75rem;
	min-width: 30px;
}

img {
	width: 100%;
	object-fit: cover;
	object-position: top;
}

.rela_section {
	padding-left: 20px;
	padding-right: 20px;
}

.harmonika {
	padding-bottom: 4rem;
}

.reserver {
	margin-top: 1rem;
	margin-bottom: 1rem;
	margin-left: 0rem;
	margin-right: 0rem;
}

.wp-image-1583 {
	max-width: 154px;
}


/* ------------harmonika -------------*/

.container {
  /* padding: 4rem;
  width: 48rem; */
  grid-column: 2;
  grid-row: 2 / 3;
}

.harmonika .harmonika-item { /*Linje under knap*/
  border-bottom: 1px solid var(--grey);
}
.harmonika .harmonika-item button[aria-expanded='true'] { /*Linje under tekst når knappen er expanded*/
  border-bottom: 1px solid var(--green);
}
.harmonika button { /*basis layout af knappen*/
  position: relative;
  display: block;
  text-align: left;
  width: 100%;
  padding: 1em 0;
  border: none;
  background: none;
  outline: none;
}
.harmonika button:hover, .harmonika button:focus { /*Pseudo elementer der gør at når man har klikket eller kører musen over skifter den farve */
  cursor: pointer;
  color: var(--green);
}
.harmonika button:hover::after, .harmonika button:focus::after {
  cursor: pointer;
  color: var(--green);
  border: 1px solid #03b5d2;
}
.harmonika button .harmonika-title {
  padding: 1em 1.5em 1em 0;
}
.harmonika button .icon { /*Her bliver ikonet bygget (cirklen)*/
  display: inline-block;
  position: absolute;
  top: 14px;
  right: 0;
  width: 22px;
  height: 22px;
  border: 1px solid;
  border-radius: 22px;
}
.harmonika button .icon::before { /*Vertikal stregen inden i cirklen */
  display: block;
  position: absolute;
  content: '';
  top: 9px;
  left: 5px;
  width: 10px;
  height: 2px;
  background: currentColor; /*parent elementets farve */
}
.harmonika button .icon::after { /*Horizontal stregen inden i cirklen*/
  display: block;
  position: absolute;
  content: '';
  top: 5px;
  left: 9px;
  width: 2px;
  height: 10px;
  background: currentColor;
}
.harmonika button[aria-expanded='true'] { /*Dette virker kun hvis aria-expeneded er true*/
  color: var(--green);
}
.harmonika button[aria-expanded='true'] .icon::after { /*Inden i knappen går man til ikonet og ændre after så hvis man har trykket på knapper forsvinder stregen*/
  width: 0;
}
.harmonika button[aria-expanded='true'] + .harmonika-content { /*Hvis aria expanded er true skal harmonika content kunne ses (teksten)*/
  opacity: 1;
  max-height: 20em;
  transition: all 200ms linear;
} 
.harmonika .harmonika-content { /*Som default (grundlæggende) skal teksten ikke kunne ses*/
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  transition: opacity 200ms linear, max-height 200ms linear;
}
.harmonika .harmonika-content p { /*Layout på teksten*/
  margin: 2em 0;
}

/* ------------Popup  -------------*/

.pop_up {
        position: fixed;
      }

        #pop_up {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(180, 168, 143, 0.88);
        overflow: scroll;
		z-index: 100;
      }

 	    #pop_up .pop_up_article {
        width: 90vw;
        margin: 4rem auto;
        padding: 12px;
        background-color: #ffffffc7;
        left: 14vw;
		display: grid;
		grid-template-columns: 1fr 1fr 1fr; 
      }

      #pop_up .tekst {
        margin: 20px;
      }


	  #pop_up h2 {
		grid-column: 2/4;
		font-size: 1.6rem;
		margin-top: 10px;
		margin-bottom: 10px;
	  }

		.pop_up_article p { 
		grid-column: 1/3;
		font-size: 0.8rem;

	  }

	  .img {
		  grid-column: 1;
	  }

	.information {
		grid-column: 2/4;
		Margin-left: 0.5rem;
	}

		.information h4 {
		font-size: 1rem;
	}

	.koster {
	margin-bottom: 30px;
	}

	.popup_knapper {
		grid-column: 1/4;
		display: grid;
		grid-template-columns; 1fr 1fr;
		gap: 20px;
		margin: 20px;
	}

	.btn11 {
grid-column: 1;
	}

		.btn21 {
grid-column: 2;
	}

		.popup_knapper button{
		border: 0.5px solid;
			font-size: 0.8rem;
	}

#luk {
        grid-column: 3;
		justify-content: left; 
        padding: 1rem;
        font-size: 1.7rem;
        font-weight: l;
        color: black;
        cursor: pointer;
		margin-left: 3rem;
      }

 .knapper .hjerteValgt{
	display: none;
}

.knapper .reserver {
	    background-color: #647658;
		color: white;
		padding: 1rem;
}

.knapper .reserver:hover {
	    background-color: #A5B19EF7;
 		 text-decoration: none;		
		  color: white;
		/* color: white;
		padding: 1rem;
    margin: 14px; */
}

button:focus, .menu-toggle:hover, button:hover, .ast-button:hover, .ast-custom-button:hover .button:hover, .ast-custom-button:hover, input[type="reset"]:hover, input[type="reset"]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus {
    background-color: #A5B19EF7;
	border: none;
}

.hjerte:hover {
	background-color: transparent;
	color: black !important;
}

.hjerteValgt:hover {
	background-color: transparent;
	color: black;
}

.harmonika-item button:hover {
	background-color: transparent;
}

.harmonika-item button:focus {
	background-color: transparent !important;
}
/* .knapper .reserver button:hover {
	background-color: white;
	transform: scale(1.1);
}  */

.h3 {
	margin-top: 4rem;
	text-align: center 
}

	 /* ------------------ Relaterede produkt------------ */

#kasse {
padding-top: 1rem;
}

.rela h4 {

}

.mere {
	display: block; 
	border: solid 0.5px #26222f;
	background-color: #647658;
	color: white;
} 

.rela_article {
	display: grid;
	grid-template-columns: 1fr 1fr 1fr 1fr;
	grid-template-rows: 1fr 1fr 1fr;
}

.main_billede {
	max-height: 50vh;
	grid-column: 1/5;
	grid-row: 1/4;
}

.rela {
	grid-column: 1/4;
	grid-row: 4/5;
	padding-top: 10px;
	padding-bottom: 10px;
}

.mere {
	grid-column: 4/5;
	grid-row: 4/5;
	margin-top: 15px;
	margin-bottom: 15px;
	padding: 10px;
}

.knapper {
	display: grid;
	grid-template-columns: 75% 25%;
}

.reserver {
	grid-column: 1;
}

.koster  {
	margin: 0px;
}

.navn {
	margin: 0px;
}






	 /* ------------------ MOBILE ABOWE - WEB BELOW ------------ */
@media (min-width:600px)  { 

	.ast-container  {
		margin: auto;
	}

	.single {
		padding-bottom: 100px;
	}

	.main-billede {
	max-height: 80vh;
}

.single_produkt {
	display: grid;
	grid-template-columns: 0.3fr 2fr 2fr;
	margin: 1rem auto;
	gap: 25px;
	padding-top: 100px;
}

.billeder {
	display: grid;
	grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
	grid-column: 1;
	gap: 20px;
}

.forfra_billede {
	grid-column: 1;
	grid-row: 1 / 2;
}

.bagfra_billede {
	grid-column: 1;
	grid-row: 2 / 3;
}

.ekstra_billede {
	grid-column: 1;
	grid-row: 3 / 4;
}

.stort-billede {
	grid-column: 2;

}

.info {
	grid-column: 3;
}

/* --------popup-------- */
		

	 #pop_up .pop_up_article {
        width: 600px;
        margin: 4rem auto;
        background-color: #ffffffc7;
        left: 14vw;
		display: grid;
		grid-template-columns:  1fr 1fr; 
		padding: 0rem 3rem;
      }

	  	.pop_up_article h2 { 
		font-size: 2.2rem; 
	  }

	  	.information {
		margin-left: 2rem;
	}




/* ------------Relaterede produkter -------------*/

.rela_section {
		grid-column: 1 / 3;
		max-width: 1200px;
		margin: auto;
		padding: 0px;
}

.main_billede {
	max-height: 100vh;
}

#kasse {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	margin: 1rem auto;
	gap: 25px;
}

.rela_article {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	grid-template-rows: auto;
	
}

.rela .navn {
	grid-column: 1 / 2;
}

	
.rela {
	margin-top: 1rem;
	margin-bottom: 1rem;
	padding: 0px;
}

.rela .koster  {
	grid-column: 2 / 3;
}

.valgt  {
 	border-color: black;
    border-style: solid;
	background-color: #C3C8BE;
	color: white;
}

.mere {
	margin-top: 1.6rem;
	margin-bottom: 1.6rem;
	padding-right: 20px;
	padding-left: 20px;
}

}

</style>


<main class="single">

<section id="produkt"></section>
<article class="single_produkt" >

<div class="billeder">
<img class="forfra_billede" id="img" src="" alt="">
<img class="bagfra_billede" id="img" src="" alt="">
<img class="ekstra_billede" id="img" src="" alt="">
</div>

<div class="stort-billede">
	<button class="knap_left"> <span class="material-icons">
navigate_before
</span></button>
	<img class="main-billede" id="img" src="" alt="">
	 <button class="knap_right"><span class="material-icons">
navigate_next
</span></button> 
</div>

<div class="info">
	<h2 class="navn"></h2>
	<h3 class="koster"></h3>
	<div class="maerker">
		<p>Mærke: </p> 
		<p class="maerke"></p>
	</div>
	<p class="pasform"></p>
	<p class="materiale"></p>
	<p class="farve">Farver:</p>
	<p class="storrelse">Størrelse:</p>
	<p class="modellen_er"></p>
	<div class="knapper">
	<button class="reserver">Reserver </button>
	  <button class="hjerte">
       <span class="material-icons">favorite_border</span>
      </button>
	  <button class="hjerteValgt">
       <span class="material-icons">favorite</span>
      </button>
	</div>

<!----------------- Harmonika  ----------------------->

<div class="container">
<div class="harmonika">
	<div class="harmonika-item">
		<button id="harmonika-button-1" aria-expanded="false">
		<span class="harmonika-title>">Hvordan fungerer en reservation?</span>
		<span class="icon" aria-hidden="true"></span>
		</button>
	<div class="harmonika-content">
	<p>Du kan reservere tøjet gratis, så gør vi det klar til at du kan prøve det i butikken og herefter kan du udvælge det du gerne vil købe.
		Bare rolig der er ingen bindning, vi ønsker at du kun kommer hjem med det du virkelig elsker. 
		Der er altid 30 dages gratis retur, hvis du ønsker at returnere dine varer.</p>
 </div>
</div>

<div class="harmonika-item">
	<button id="harmonika-button-2" aria-expanded="false">
	<span class="harmonika-title">Beskrivelse</span>
	<span class="icon" aria-hidden="true"></span>
 </button>
      <div class="harmonika-content">
        <p class="beskrivelse"></p>
</div>
</div>
<div class="harmonika-item">
	<button id="harmonika-button-2" aria-expanded="false">
	<span class="harmonika-title">Vaskeanvisning</span>
	<span class="icon" aria-hidden="true"></span>
	</button>
      <div class="harmonika-content">
        <p class="vaskeanvisning"></p>
</div>
</div>
</div>
</div>
</div>
</div>

<!----------------- Popup   ----------------------->

<section id="pop_up">
      <article class="pop_up_article">
		   <div id="luk">&#x2715</div>
       	<img class="img" src="" alt="">
		<div class= "information">
			  <h2>Produktet er valgt</h2>
			<h4 class="navn"></h4>
			<h4 class="koster"></h4>
			<h4>Bemærk:</h4>
			<p>Når du har bekræftet din reservation vil produkterne være reserveret i 24 timer, og kan afhentes i butikken </p>
			</div>
			
        
		<div class="popup_knapper">
			<button class="btn11">Vælg flere produkter</button>
			<button class="btn21">Bekræft din reservation</button>
		</div>
		</div>
      </article>
      </section>

<!----------------- Rela produkter  ----------------------->


<section class="rela_section">
	<h3>Relaterede Produkter</h3>	
	<section id="kasse"></section>
	<template>	
<article class="rela_article">
	<img class="main_billede" src="" alt="">
	<div class="rela">
	<h4 class="navn"></h4>
	<h4 class="koster"></h4>
	</div>
	<button class="mere">Se mere </button>
</template>


</main>


<script> 
let temp = document.querySelector("template");
const liste = document.querySelector("#produkt-oversigt");
let produkter = [];
let kategorier = [];
let farver;
let relaProdukter;
let storrelser;
let maerker;
let filter= "alle";
let filterCat = "alle";
start();
	
function start() {
		getJson();
}
	
async function getJson() {
	// hent single produkt 
	const dbUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/produkt/"+<?php echo get_the_ID() ?>;
	const data = await fetch(dbUrl);
	produkt = await data.json();		

	// hent rela produkt 
	const relaUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/produkt";
	const relaData = await fetch(relaUrl);
	relaProdukter = await relaData.json();

	// hent farve produkt 
	const farveUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/farve";
	const farveData = await fetch(farveUrl);
	farver = await farveData.json();

	// hent størrelser produkt 
	const strUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/strrelse";
	const strData = await fetch(strUrl);
	storrelser = await strData.json();	

	// hent brand produkt 
	const brandUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/mrke";
	const brandData = await fetch(brandUrl);
	maerker = await brandData.json();	

	visProdukt();
	visFarve();
	visBrand();
	visRelaProdukter();	
	funcStr()

}

//--------------------- Hvis single produkt ---------------

	let img1 ;
	let img2 ;
	let img3 ;
	let img4 ;

function visProdukt() { 
	console.log(produkt);
	img1 = produkt.main_billede.guid;
	img2 = produkt.ekstra_billede.guid;
	img3 = produkt.bagfra_.guid;
	img4 = produkt.forfra_billede.guid;

	document.querySelector(".main-billede").src = img1;
	document.querySelector(".ekstra_billede").src = img2;
	document.querySelector(".bagfra_billede").src = img3;
	document.querySelector(".forfra_billede").src = img4;

	document.querySelector(".navn").textContent = produkt.title.rendered;
	document.querySelector(".koster").textContent = produkt.koster + " kr. ";

	// document.querySelector(".maerke").textContent ="Mærke: " + produkt.mrke;
	document.querySelector(".pasform").textContent ="Pasform: " + produkt.pasform;
	document.querySelector(".materiale").textContent ="Materiale: " + produkt.materiale;
	// document.querySelector(".farve").textContent ="Farve: " + produkt.farve.name;
	// document.querySelector(".storrelse").textContent ="Størrelse: " + produkt.strrelse;
	document.querySelector(".modellen_er").textContent = produkt.modellen_er;

	document.querySelector(".beskrivelse").textContent = produkt.kort_beskrivelse_;
	document.querySelector(".vaskeanvisning").textContent = produkt.vaskeanvisning;

}

//--------------------- popup -----------------
 const produktside = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/alle-produkter/";
document.querySelector(".reserver").addEventListener("click", () => visDetaljer(produkt));

  function visDetaljer(produkt) {
        const popup = document.querySelector("#pop_up");
        popup.style.display = "block";
       	popup.querySelector(".img").src = img1;
		popup.querySelector(".navn").textContent = " Navn: " + produkt.title.rendered;
		popup.querySelector(".koster").textContent = " Pris: " + produkt.koster + " kr. ";
        document.querySelector("#luk").addEventListener("click", () => popup.style.display = "none");
         document.querySelector(".btn11").addEventListener("click", () => {
             location.href = produktside;
             });
      }




//--------------------- Vis farve-----------------

let faverKnapper; // tomt array

function visFarve(){
	farver.forEach(color=>{
		if (produkt.farve.includes(parseInt(color.id)))
		document.querySelector(".farve").innerHTML += `<button data-farve="${color.id}">${color.name}</button>`
		faverKnapper = document.querySelectorAll(".farve button");
		faverKnapper.forEach(faverKnap => { // for hver knap lav en eventlistener
		faverKnap.addEventListener("click", funcValgtF);
            })
	})
}

function funcValgtF() {
	faverKnapper.forEach(knap => { // for hver knap fjern knap
		knap.classList.remove("valgt")
		
	})
	
	 this.classList.add("valgt"); // for hver knap add valgt 
	 
}

//--------------------- Vis str-----------------

function funcStr(){
	storrelser.sort((a,b) => {
	return a.id - b.id;
	});
		visStr()
}

let strKnapper; // tomt array

function visStr(){	
	storrelser.forEach(storrelse=>{
		if (produkt.strrelse.includes(parseInt(storrelse.id)))
		document.querySelector(".storrelse").innerHTML += `<button data-strrelse="${storrelse.id}">${storrelse.name}</button>` // Få knapper
	
		strKnapper = document.querySelectorAll(".storrelse button");
		strKnapper.forEach(strKnap => { // for hver knap lav en eventlistener
		strKnap.addEventListener("click", funcValgt);
		
	})

	})
	}

function funcValgt() {
	strKnapper.forEach(knap => { // for hver knap fjern knap
		knap.classList.remove("valgt")
		
	})
	
	 this.classList.add("valgt"); // for hver knap add valgt 
	 
}
 
// lav eventlisterner inden i størrelse funktionen der lytter til alle buttons  fjerne alle classes og  tilføj en classs

//--------------------- Vis mærker-----------------

function visBrand(){
	maerker.forEach(maerke=>{
		if (produkt.mrke.includes(parseInt(maerke.id)))
		document.querySelector(".maerke").innerHTML += `<p data-strrelse="${maerke.id}">${maerke.name}</p>`
	})
}

//--------------------- Billede Galleri-----------------

let count= 0;
let billede = document.querySelector(".main-billede");
const btn1 = document.querySelector(".knap_left").addEventListener("click", prevbillede);
const btn2 = document.querySelector(".knap_right").addEventListener("click", nextbillede);

      function prevbillede() {
		
		let slides = [img1, img2, img3, img4]
		console.log(slides);

		if (count >= 1) {
        if (count == slides.length -1) {
          count = 0;
          billede.src = slides[count];
          return;
        } else {
          count--;
          billede.src = slides[count];
        }
		}else if (count == 0) {
			count=3;
			billede.src = slides[count];
		}

		console.log(count);
	}


	function nextbillede() {
		
		let slides = [img1, img2, img3, img4]
		console.log(slides);

        if (count == slides.length -1) {
          count = 0;
          billede.src = slides[count];
          return;
        } else {
          count++;
          billede.src = slides[count];
        }

		console.log(count);
	}



//--------------------- Harmonika knapper-----------------


const items = document.querySelectorAll(".harmonika button"); //Få fat i alle knapper 

items.forEach((item) => item.addEventListener("click", toggleHarmonika)); //  For hvery item skal den "lytte" efter et klik som starter en funktion 

function toggleHarmonika() {
  const itemToggle = this.getAttribute("aria-expanded"); // Opretter en variabel,  Når klik er aktiveret skal have attributen aria-expanded (enten er den sand eller falsk ) 
  
  // Der skal laves en "for" loop, så der bliver kigget igennem hele loppet og kun den der er klikket på bliver aktiveret f.eks. hvis en anden er åben bliver denne lukket  
  for (let item of items) { 
    item.setAttribute("aria-expanded", false); // kun den der bliver klikket på skal være åben alle andre skal være lukket (false)
  }

  if (itemToggle === "false") {   // Derudover skal den KUN åbne hvis knappen er false  
    this.setAttribute("aria-expanded", true); // åbner harmonikaen op og man kan se content
  }
}

//---------------------Hvis relaterede produkter -----------------

function visRelaProdukter() {
	const kasse = document.querySelector("#kasse")
	kasse.textContent= "";
	relaProdukter.forEach(produkt => {
		if (produkt.kategori.includes(75) && count <=2) {
			const klon = temp.cloneNode(true).content;
			klon.querySelector(".main_billede").src = produkt.main_billede.guid;
			klon.querySelector(".navn").textContent = produkt.title.rendered;
			klon.querySelector(".koster").textContent = produkt.koster + " kr. ";
			klon.querySelector(".mere").addEventListener("click", () => 
				{location.href = produkt.link;
				});
				kasse.appendChild(klon);
				count ++; 

		} else if(produkt.kategori.includes(74) && count <=2) {
			const klon = temp.cloneNode(true).content;
			klon.querySelector(".main_billede").src = produkt.main_billede.guid;
			klon.querySelector(".navn").textContent = produkt.title.rendered;
			klon.querySelector(".koster").textContent = produkt.koster + " kr. ";
			klon.querySelector(".mere").addEventListener("click", () => 
				{location.href = produkt.link;
				});
				kasse.appendChild(klon);
				count ++; 

	} else if(produkt.kategori.includes(73) && count <=2) {
			const klon = temp.cloneNode(true).content;
			klon.querySelector(".main_billede").src = produkt.main_billede.guid;
			klon.querySelector(".navn").textContent = produkt.title.rendered;
			klon.querySelector(".koster").textContent = produkt.koster + " kr. ";
			klon.querySelector(".mere").addEventListener("click", () => 
				{location.href = produkt.link;
				});
				kasse.appendChild(klon);
				count ++; 
			}
		})
}

//-- ----------Hjerte ------------->

const love = document.querySelector(".hjerte");
const loveValg = document.querySelector(".hjerteValgt");

love.addEventListener("click", () => {
	love.style.display = "none";
	loveValg.style.display = "block";
  });

loveValg.addEventListener("click", () => {
	loveValg.style.display = "none";
	love.style.display = "block";
  });



</script>



<?php get_footer(); ?>
