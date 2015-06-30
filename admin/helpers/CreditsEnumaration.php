<?php
/**
* Hall of Fame in the RSGallery2 project
* Credits: Historical list of people participating in the project
* 
* @version $Id: CreditsEnumaration.php  2012-07-09 18:52:20Z mirjam $
* @package RSGallery2
* @copyright (C) 2003 - 2015 RSGallery2
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* RSGallery is Free Software
*/

defined( '_JEXEC' ) or die();

// ToDo: Should it be a class ?

class CreditsEnumaration 
{

	const CreditsEnumarationText =<<<EOT
	<h3>Core Team - RSGallery2 4.x</h3>
	<h4>(Joomla 3.x)</h4>
	<dl>
		<dt>2015 - </dt>
			<dd><b>Johan Ravenzwaaij</b></dd>
			<dd><b>Mirjam Kaizer</b></dd>
			<dd><b>Thomas Finnern</b></dd>
	</dl>

	<h3>RSGallery2 3.x (Joomla 1.6/1.7/2.5)</h3>
	<dl>
		<dt>2011-2014</dt>
			<dd><b>Johan Ravenzwaaij</b></dd>
			<dd><b>Mirjam Kaizer</b></dd>
	</dl>

	<h3>Translations</h3>
	<dl>
		<dt>Brazilian Portuguese</dt>
			<dd><b>Helio Wakasugui</b></dd>
		<dt>Croatian</dt>
			<dd><b>Tanja</b></dd>
		<dt>Czech</dt>
			<dd><b>David Zirhut</b> <a href='http://www.joomlaportal.cz/'>joomlaportal.za</a></dd>
			<dd><b>Felix 'eFix' Lauda</b></dd>
		<dt>Dutch</dt>
			<dd><b>Tomislav Ribicic</b></dd>
			<dd><b>Dani&#235;l Tulp</b> <a href='http://design.danieltulp.nl' target='_blank'></a></dd>
			<dd><b>Bas</b><a href='http://www.fantasea.nl' target='_blank'>http://www.fantasea.nl</a></dd>
			<dd><b>Mirjam Kaizer</b></dd>
		<dt>Finnish</dt>
			<dd><b>Antti</b></dd>
			<dd><b>Ripley</b></dd>
		<dt>French</dt>
			<dd><b>Fabien de Silvestre</b></dd>
		<dt>German</dt>
			<dd><b>woelzen</b><a href='http://conseil.silvestre.fr' target='_blank'>http://conseil.silvestre.fr</a></dd>
			<dd><b>chfrey</b></dd>
		<dt>Greek</dt>
			<dd><b>Charis Argyropoulos</b><a href='http://www.symenox.gr' target='_blank'>http://www.symenox.gr</a></dd>
			<dd><b>George Fakas</b></dd>
		<dt>Hebrew</dt>
			<dd><b>Kobi</b></dd>
			<dd><b>theNoam</b><a href='http://www.theNoam.com/' target='_blank'>http://www.theNoam.com/</a></dd>
		<dt>Hungarian</dt>
			<dd><b>Jozsef Tamas Herczeg</b> <a href='http://www.soft-trans.hu' target='_blank'>SOFT-TRANS</a></dd>
		<dt>Italian</dt>
			<dd><b>Michele Monaco</b><a href='http://www.mayavoyage.com' target='_blank'>Maya Voyages</a></dd>
			<dd><b>Marco Galimberti</b>
			</dd>
		<dt>Norwegian</dt>
			<dd><b>Ronny Tjelle</b></dd>
			<dd><b>Steinar Vikholt</b></dd>
		<dt>Persian</dt>
			<dd><b>Joomir</b> <a href='http://www.joomir.com/' target='_blank'>http://www.joomir.com</a></dd>
		<dt>Polish</dt>
			<dd><b>Zbyszek Rosiek</b></dd>
		<dt>Russian</dt>
			<dd><b>Ragnaar</b></dd>
		<dt>Slovenian</dt>
			<dd><b>Iztok Osredkar</b></dd>
		<dt>Spanish</dt>
			<dd><b>Eb&auml;vs</b> <a href='http://www.ebavs.net/' target='_blank'>eb&auml;vs.net</a></dd>
		<dt>Traditional Chinese</dt>
			<dd><b>Sun Yu</b><a href='http://www.meto.com.tw' target='_blank'>Meto</a></dd>
			<dd><b>Mike Ho</b> <a href='http://www.dogneighbor.com' target='_blank'>http://www.dogneighbor.com</a></dd>
		<dt>Turkish</dt>
			<dd><b>Pheadrus</b></dd>
	</dl>

	<h3>Logo</h3>
	<dl>
		<dt>Designer</dt> <dd><b>Cory "ccdog" Webb</b> <a href='http://www.corywebb.com/' target='_blank'>CoryWebb.com</a></dd>
	</dl>


	<h3>RSGallery2 2.x (Joomla 1.5.x)</h3>
	<dl>
		<dt>2010 (alphabetically)</dt>
			<dd>Johan Ravenzwaaij</dd>
			<dd>Jonah Braun</dd>
			<dd>Mihir Chhatre <a href="http://www.thoughtfulviewfinder.com">Thoughtfulviewfinder Services </a></dd>
			<dd>Mirjam Kaizer</dd>
		<dt>2008-2009</dt>
		<dt>Project Architect</dt>
			<dd>Jonah Braun <a href='http://whalehosting.ca/' target='_blank'>Whale Hosting Inc.</a></dd>
		<dt>Developers</dt>
			<dd>John Caprez</dd>
		<dt>Community Liaison</dt>
			<dd>Dani&#235;l Tulp <a href='http://design.danieltulp.nl/' target='_blank'>DT^2</a></dd>
	</dl>

	<h3>RSGallery2 1.x (Joomla 1.0.x, legacy)</h3>
	<dl>
		<dt>Creator</dt>
			<dd>Ronald Smit</dd>
		<dt>RSGallery 1.x</dt>
			<dd>Andy "Troozers" Stewart</dd>
			<dd>Richard Foster</dd>
		<dt>RSGallery2 2005</dt>
			<dd>Dani&#235;l Tulp</dd>
			<dd>Jonah Braun</dd>
			<dd>Tomislav Ribicic</dd>
		<dt>RSGallery2 2006</dt>
			<dd>Dani&#235;l Tulp</dd>
			<dd>Jonah Braun</dd>
			<dd>Ronald Smit</dd>
			<dd>Tomislav Ribicic</dd>
		<dt>RSGallery2 2007</dt>
			<dd>Dani&#235;l Tulp</dd>
			<dd>John Caprez</dd>
			<dd>Jonah Braun</dd>
			<dd>Jonathan DeLaigle</dd>
			<dd>Margo Adams</dd>
			<dd>Ronald Smit</dd>
		<dt>RSGallery2 2008</dt>
			<dd>Dan Shaffer 'chefgroovy'</dd>
		<dt>&nbsp;</dt>
	</dl>
EOT;
}
