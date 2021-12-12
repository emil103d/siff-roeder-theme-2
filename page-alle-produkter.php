<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<style>

img {
  max-width: 100%;
  height: auto;
}

#produkter-oversigt {
	display: grid;
	justify-content: center;
	gap: 25px;
	margin: auto;
	grid-template-columns: 1fr 1fr 1fr;
} 

.enkelt_produkt{
	max-width: 1200px;
	display: grid;
	text-align: center;
	margin: auto;
}
</style>


<main>

<section id="produkter-oversigt"></section>
<template>
<article class="enkelt_produkt">
<img src="" alt="">
<div class="beskriv">
<h3 class="navn"></h3>
<p class="koster"></p>
</div>

<div class="knapper">
<button class="reserver">Reserver </button>
<button class="mere">Læs mere</button>
</div>
</article>
</template>

</main>


<script>

let temp = document.querySelector("template");
const liste = document.querySelector("#produkter-oversigt");
let produkter = [];

start();

	function start() {
		 getJson();
		
      }

	  async function getJson() {
	const url = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/produkt/?per_page=100"; // indsæt url for at hente alle produkter 
	let data = await fetch(url);
	produkter = await data.json();
	visProdukter();
	  }

	
function visProdukter() { 
	console.log("hej");
	liste.textContent= "";
	produkter.forEach(produkt => {
		// if ((filterCat == "alle" || kursus.categories.includes(parseInt(filterCat))) && (filterTemaer == "alle" || kursus.temaer.includes(parseInt(filterTemaer)))) { //parseInt= laver datatypen om
		// const klon = temp.cloneNode(true).content;
		const klon = temp.cloneNode(true).content;
		klon.querySelector("img").src = produkt.main_billede.guid;
		klon.querySelector(".navn").textContent = produkt.title.rendered;
		klon.querySelector(".koster").textContent = produkt.koster + " kr. ";
		klon.querySelector("article").addEventListener("click", () => 
			{location.href = produkt.link;
			});
		liste.appendChild(klon);
	});
}

</script>




<?php get_footer(); ?>
