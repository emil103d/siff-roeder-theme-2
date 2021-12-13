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


:root {
	--text: #7F7F7F;
	--green: #7F7F7F;
	--grey: #56605F;
}


.single_produkt {
	display: grid;
	gap: 25px;
	grid-template-columns: 1fr repeat(2, 2fr);
	margin: 1rem auto;
}

.billeder {
	grid-column: 1;
	display: grid;
	gap: 25px;
}

.stort-billede {
	grid-column: 2;
	position: relative;
}

.knap_left {
    position: absolute;
    left: 0; bottom: 65%;
 }
  .knap_right {
    position: absolute;
    right: 0; bottom: 65%;
 }

.info {
	grid-column: 3;
	grid-row: 1 / 2;
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
  max-height: 10em;
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

/* ------------Relaterede produkter -------------*/

.rela_section {
	margin: 1rem auto;
		grid-column: 1 / 3;
}

#kasse {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	margin: 1rem auto;
	gap: 1rem;
}

.rela_article {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	grid-template-rows: auto;
	
}

.rela .navn {
	grid-column: 1 / 2;

}

.rela .koster  {
	grid-column: 2 / 3;
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
	<button class="knap_left">&lt;</button>
	<img class="main-billede" id="img" src="" alt="">
	 <button class="knap_right">&gt;</button> 
</div>

<div class="info">
<h2 class="navn"></h2>
<h3 class="koster"></h3>
<p class="maerke"></p>
<p class="pasform"></p>
<p class="materiale"></p>
<p class="farve"></p>
<p class="storrelse"></p>
<p class="modellen_er"></p>
<div class="knapper">
<button class="reserver">Reserver </button>
<button class="hjerte">Love</button>
</div>

<!----------------- Harmonika  ----------------------->

<div class="container">
<div class="harmonika">
	<div class="harmonika-item">
		<button id="harmonika-button-1" aria-expanded="false">
		<span class="harmonika-title>">Reservér</span>
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

<!----------------- Rela produkter  ----------------------->

<section class="rela_section">
	<h3>Relaterede Produkter</h3>	
	<section id="kasse"></section>
	<template>	
<article rela_article>
	<img class="main_billede" src="" alt="">
	<div class="rela">
	<h4 class="navn"></h4>
	<h4 class="koster"></h4>
	</div>
	<button class="mere">Se mere </button>
</section>
</template>

</main>


<script> 

let temp = document.querySelector("template");
const liste = document.querySelector("#produkt-oversigt");
let produkter;
let filter= "alle";
start();
	
function start() {
		getJson();
}
	
async function getJson() {
	// hent single produkt 
	const dbUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/produkt/"+<?php echo get_the_ID() ?>;
	const data = await fetch(dbUrl);
	produkt = await data.json();		
	visProdukt();
	showimage();

	// hent relaterede produkter
	const relaUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/produkt?per_page=100";
	const relaData = await fetch(relaUrl);
	relaProdukter = await relaData.json();
	visRelaProdukter();

}

//--------------------- Hvis single produkt ---------------


function visProdukt() { 
	document.querySelector(".navn").textContent = produkt.title.rendered;
	document.querySelector(".koster").textContent = produkt.koster + " kr. ";

	document.querySelector(".maerke").textContent ="Mærke: " + produkt.mrke;
	document.querySelector(".pasform").textContent ="Pasform: " + produkt.pasform;
	document.querySelector(".materiale").textContent ="Materiale: " + produkt.materiale;
	document.querySelector(".farve").textContent ="Farve: " + produkt.farve;
	document.querySelector(".storrelse").textContent ="Størrelse: " + produkt.strrelse;
	document.querySelector(".modellen_er").textContent = produkt.modellen_er;

	document.querySelector(".beskrivelse").textContent = produkt.kort_beskrivelse_;
	document.querySelector(".vaskeanvisning").textContent = produkt.vaskeanvisning;
}



// let index = 0;
// let the_image = document.getElementById("main-image");

//  document.querySelector(".knap_left").addEventListener("click", prevImage);
// document.querySelector(".knap_right").addEventListener("click", nextImage);

// let images = [img1, img2, img3, img4];
// the_image = images[0];


function showimage(){
const img1 = document.querySelector(".main-billede").src = produkt.main_billede.guid;
const img2 = document.querySelector(".ekstra_billede").src = produkt.ekstra_billede.guid;
const img3 = document.querySelector(".bagfra_billede").src = produkt.bagfra_.guid;
const img4 = document.querySelector(".forfra_billede").src = produkt.forfra_billede.guid;
}

let count = 0;
let slides = [ "img1", "img2", "img3", "img4"]


const billede = document.createElement("img");
      billede.src = slides[count];
      document.body.appendChild(billede);

      const btn = document.querySelector(".knap_left").addEventListener("click", nextbillede);

      function nextbillede() {
        if (count == slides.length - 1) {
          count = 0;
          billede.src = slides[count];
          return;
        } else {
          count++;
          billede.src = slides[count];
        }
	}

	

		// function nextbillede() {
        // if (count == slides.length - 1) {
        //   count = 0;
        //   billede.src = slides[count];
        //   return;
        // } else {
        //   count++;
        //   billede.src = slides[count];
        // }


//  let images = [], x = -1;
//       images[0] = "img1";
//       images[1] = "img2";
// 	  images[3] = "img3";
// 	  images[4] = "img4";

//  document.querySelector(".knap_left").addEventListener("click", displayNextImage);
// document.querySelector(".knap_right").addEventListener("click", displayPreviousImage);

// function displayNextImage() {
//           x = (x === images.length - 1) ? 0 : x + 1;
//           document.getElementById("img").src = images[x];
//       }

// function displayPreviousImage() {
//           x = (x <= 0) ? images.length - 1 : x - 1;
//           document.getElementById("img").src = images[x];
//       }




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
	relaProdukter.forEach(relaProdukt => {
		if (produkt.kategori.includes(73)) {
		const klon = temp.cloneNode(true).content;
    	klon.querySelector(".main_billede").src = produkt.main_billede.guid;
		klon.querySelector(".navn").textContent = produkt.title.rendered;
		klon.querySelector(".koster").textContent = produkt.koster + " kr. ";
		klon.querySelector(".mere").addEventListener("click", () => 
			{location.href = produkt.link;
			});
      	kasse.appendChild(klon);
    }
	})
}


</script>



<?php get_footer(); ?>
